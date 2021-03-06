@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class = "col-3 p-5">
            <img src = "{{ $user->profile->profileImage() }}" style = "max-height: 200px">
        </div>

        <div class = "col-9 pt-5">
            <!-- Should be the username -->

            <div class = "d-flex justify-content-between align-items-baseline">
                <div class = "d-flex align-items-center pb-2">
                    <div class = "h4"> {{ $user->username}}</div>
                    <!-- Adding a follow button Sprint 4 -->
                    <follow-button user-id = "{{ $user->id}}" follows = "{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href = "/p/create">Add New Post</a>
                @endcan

                @can('forceDelete', $user->profile)
                <a href = "/profile/{{ $user->id }}/ban">Ban User</a>
                @endcan

                @can('forceDelete', $user->profile)
            <a href = "/profile/{{ $user->id }}/suspend">Suspend User</a>
                @endcan
            </div>

            @can('update', $user->profile)
             <a href = "/profile/{{ $user->id }}/edit ">Edit Profile</a>
            @endcan

            <div class = "d-flex">
                <div class = "pr-5"><strong>{{ $user->posts->count()}}</strong> posts</div>
                <div class = "pr-5"><strong>{{ $user->profile->followers->count()}}</strong> followers</div>
                <div class = "pr-5"><strong>{{ $user->following->count()}}</strong> following</div>
            </div>

            <div class = "pt-4 font-weight-bold">{{ $user->profile->title ?? ''}}</div>

            <div>{{ $user->profile->description ?? ''}}
            </div>
            <div><a href = "https://www.instagram.com/candycharms.ph/">{{ $user->profile->url ?? ''}}</a></div>

        </div>
     </div>

     <div class = "row pt-5">
        @foreach($user->posts as $post)
        <div class = "col-4 pb-4">
            <a href = "/p/{{ $post->id }}">
                <img src ="/storage/{{ $post->image }}" class = "w-100">
            </a>
        </div>
        @endforeach
     </div>
</div>
@endsection
