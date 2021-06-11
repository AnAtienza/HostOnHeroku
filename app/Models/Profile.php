<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	// idk what this one line is for
    use HasFactory;

    protected $guarded = [];

    // Diwa added this function
    // Sprint 4
    public function profileImage(){
    	$imagePath = ($this->image) ? $this->image : "profile/ieZOZIvSWyP9m0vk5kX6SSpJo70yq8ybNHaJxaOG.png";
    	return '/storage/' . $imagePath;
    }

    public function user(){

    	return $this->belongsTo(User::class);
    }

    // Added to Sprint 4

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
