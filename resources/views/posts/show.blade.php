@extends('components.dashboard')

@section('content')
    <div class="bg-light sm:px-2 sm:w-full md:w-xl m-auto rounded-md border overflow-hidden">
        <div class="flex items-center gap-2 p-2">
            @if (auth()->user()->avatar)
                <img src="#" alt="User Avatar" class="w-[30px] h-[30px] rounded-full self-start"/>
            @else
                <div class="w-[30px] h-[30px] rounded-full grid place-items-center bg-primary self-start">
                    <p class=" font-bold text-x text-text">{{ Str::upper($post->user->username[0])}}</p>
                </div>
            @endif
            <a href="{{ route('user.show', $post->user)}}" class="text-text text-xs font-semibold hover:text-secondary">{{ $post->user->name }}</a>
        </div>
        <hr class="top-px border-neutral mb-1">
        {{-- POST SECTION --}}
        <div class="min-h-[10em]">
            <h3 class="text-lg font-semibold text-text p-2">{{ $post->title}}</h3>
            <p class="text-sm text-text p-2 my-2">{{ $post->content }}</p>
        </div>
        <hr class="top-px border-neutral">
        <div class="flex items-center justify-between p-2">
            <div class="flex gap-3">
                @if ($post->likedBy(auth()->user()))
                    <form action="{{ route('posts.like', $post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-action-bad font-bold">
                            <i class="fas fa-heart"></i>
                            <span>Unlike</span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('posts.like', $post)}}" method="post">
                        @csrf
                        <button class="text-primary font-bold" type="submit">
                            <i class="fas fa-heart"></i>
                            <span>Like</span>
                        </button>
                    </form>
                @endif
                <p class="font-semibold text-text">{{ $post->likes()->count()}} likes</p>
            </div>
            <button class="text-action-pos font-bold">
                <i class="fas fa-comment"></i>
                <span>{{ $post->comments->count()}} {{ Str::plural('Comment', $post->comments->count()) }}</span>
            </button>
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-danger font-bold" type="submit">
                        <i class="fas fa-trash"></i>
                        <span>Delete</span>
                    </button>
                </form>
            @endcan
        </div>
        <hr class="top-px border-neutral mb-2">

        {{-- COMMENTS SECTION --}}
        <div>
            <form action="{{ route("posts.comment", $post)}}" method="post" class="p-2 mb-2 grid">
                @csrf
                <div class="relative align-center grid">
                    @if (auth()->user()->avatar)
                        <img src="#" alt="User Avatar" class="self-start"/>
                    @else
                        <div class="absolute w-avatar h-avatar left-2 top-1/2 translate-y-minus-1/2 flex rounded-full grid place-items-center p-2 bg-primary self-start">
                            <p class=" font-bold text-x text-text">{{ Str::upper(auth()->user()->username[0])}}</p>
                        </div>
                    @endif
                    <input type="text" name="content" id="content" class="py-3 px-medium rounded-full" placeholder="Make your comment">
                </div>
                <button type="submit" class="rounded-md p-1 px-3 bg-action-pos text-white mt-3">Comment</button>
            </form>
            
            {{-- SHOW COMMENTS --}}
            <div class="rounded-md bg-background2 pb-3">
                @if (!$post->comments->count())
                    <h3 class="text-semibold text-xl text-action-bad text-center p-4 mt-6">There are no comments. <br>Make the First One</h3>
                @else
                    <h3 class="text-semibold text-2xl text-text p-2 mb-3">Comments</h3>
                    @foreach ($post->comments as $comment)
                        <x-comment :comment="$comment" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection