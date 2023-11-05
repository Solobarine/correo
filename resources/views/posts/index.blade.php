@extends('components.dashboard')

@section('content')
    <div class="posts m-1 sm:w-sm md:w-xl md:m-auto">
        @if (!$posts->count())
            <div>
                <h3>There Are no Posts</h3>
                <a href="{{ route('posts.new')}}">Create a Post</a>
            </div>
        @else
            @foreach ($posts as $post)
                <x-post :post="$post"/>
            @endforeach
        @endif
        {{ $posts->links()}}
    </div>
@endsection