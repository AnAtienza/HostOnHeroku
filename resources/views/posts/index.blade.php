@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class = "row pb-5">
            <div class = "col-7 text-center">
                <img src = "/storage/{{ $post->image}}" class = "w-75">
            </div>
            <div class = "col-5">
                <div>
                    <div class = "d-flex align-items-center pb-3">
                        <div class = "pr-3">
                            <img src = "{{ $post->user->profile->profileImage()}}" width = "75">
                        </div>
                        <div>
                            <div class = "font-weight-bold">
                                <a href = "/profile/{{ $post->user->id}}">
                                    <span class = "text-dark">
                                        {{$post->user->username}}
                                    </span>
                                </a>
                                <!-- <a href = "#" class = "pl-3">Follow</a> -->
                            </div>
                        </div>
                    </div>
                <!-- Diwa adding the delete -->

                    <form action = "/p/delete/{{$post->id}}" method="POST">
                
                        @csrf

                        <!-- Changed update to delete -->
                        @can('delete', $post->user->profile)
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">Delete Post</button>
                        @endcan
                    </form>

                    <hr>

                    <p>
                        <span class = "font-weight-bold">
                            <a href = "/profile/{{ $post->user->id}}">
                                <span class = "text-dark">
                                    {{$post->user->username}}
                                </span>
                            </a>
                        </span> 
                        {{$post->caption}}
                    </p>
                </div>
            </div>
        </div>

    @endforeach
</div>
@endsection
