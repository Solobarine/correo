@extends('components.dashboard')

@section('content')

<div class="sm:w-full md:w-xl m-auto flex flex-col gap-2 px-2">
    <h2 class="font-bold mb-3 text-2xl text-text">Create New Post</h2>
    <form action="{{route('posts')}}" method="post" class="grid grid-cols-1 gap-2">
        @csrf
        <input type="text" name="title" placeholder="Title..." class="p-2 rounded-md" />
        @error('title')
            <p class="text-danger p-2 mb-2">{{ $message }}</p>
        @enderror
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Post Content..." class="p-2 rounded-md"></textarea>
         @error('content')
            <p class="text-danger p-2 mb-2">{{ $message }}</p>
        @enderror
        <button type="submit" class="bg-primary text-white p-2 rounded-md">Create Post</button>
    </form>
</div>
@endsection