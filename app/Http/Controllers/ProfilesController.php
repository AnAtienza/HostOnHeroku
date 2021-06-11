<?php

namespace App\Http\Controllers;

// Diwa added
use App\Models\User;
use App\Models\Post;
use DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //New controller file by Diwa
    public function index_with_input($user)
    {
    	$user = User::findOrFail($user);

        // Added follows for sprint 4

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
    	// added new parameter
        // added follows Sprint 4
        return view('profile', [
        	'user' => $user,
            'follows' => $follows,
        ]);
    }

    // Got this from https://stackoverflow.com/questions/44500363/redirect-users-to-their-profile-after-login
    // Diwa just made two functions with and without input
    public function index(){ 
    	$user = User::findOrFail(auth()->user()->id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
    	return view('profile', ['user'=>$user,'follows' => $follows,]);

        // return view('profiles.index', compact )
  
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));

    }

    // Sprint 5 added a new function to ban user
    public function ban(User $user){

        $this->authorize('delete', $user->profile);

        \DB::transaction(function () use ($user) {
            \DB::select('select * from users where id = ?',[$user->id]);
            \DB::update("update users set blocked_at = date('now') where id = ?",[$user->id]);
        });

        return view('profiles.ban');

    }

    // Sprint 5 added a new function to suspend and delete user
    public function suspend(User $user){

        $this->authorize('delete', $user->profile);

        $posts = Post::where('user_id', $user->id)->pluck('id');

        \DB::transaction(function () use ($posts, $user) {
            \DB::table('posts')->where('user_id', $user->id)->delete();
            \DB::table('profiles')->where('user_id', $user->id)->delete();
            \DB::table('profile_user')->where('user_id', $user->id)->delete();
            \DB::table('users')->where('id', $user->id)->delete();
        });

        return view('profiles.suspend');

    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',

            // image is not required as of sprint 4
            'image' => ['image'],

        ]);

        // Added this line below to avoid error in array concatentation

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);

            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Diwa changed this Sprint 4 imageArray
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []

        ));

        return redirect("/profile/{$user->id}");
    }
}
