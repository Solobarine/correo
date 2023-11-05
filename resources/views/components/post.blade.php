@props(['post' => $post])

<div class="grid grid-cols-1 sm:w-11/12 mx-2 md:max-w-md gap-2 bg-gray-100 mb-4 m-auto rounded-xl overflow-hidden">
    <p class="px-4 pt-1">
        <a href="{{ route("user.show", $post->user) }}" class="text-text hover:text-primary text-xs font-semibold">{{ $post->user->name}}</a>
        <span class="text-xs">posted</span>
    </p>
    <hr class="border-neutral"/>
    <div class="flex p-2 align-center">
        <h3 class="text-text grow font-bold">{{ $post->title }}</h3>
        <small>{{ $post->created_at->diffForHumans() }}</small>
    </div>
    <div class="relative p-2 h-[10em]">
        <p class="text-text">{{ strlen($post->content) >= 200 ? substr($post->content, 0,199).'...' : $post->content }}</p>
        @if (strlen($post->content) > 200)
            <a href="{{ route("posts.show", $post)}}" class="absolute bottom-2 right-2 hover:underline text-text hover:text-secondary shrink">see more</a>
        @endif
    </div>
    <hr class="border-neutral" />
    <div class="flex align-center justify-between p-2 border-md bg-accent">
        @auth
        <div class="flex gap-1 items-center">
            <p class="font-bold">{{ $post->likes()->count()}}</p>
            @if ($post->likedBy(auth()->user()))
                <form action="{{ route('posts.like', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" flex items-center justify-center gap-2 text-action-bad font-bold items-center">
                        <i class="fas fa-heart sm:m-auto"></i>
                        <span class="xs:hidden sm:block">Unlike</span>
                    </button>
                </form>
            @else
                <form action="{{ route('posts.like', $post)}}" method="post">
                    @csrf
                    <button class="flex items-center justify-center gap-2 text-primary font-bold" type="submit">
                        <i class="fas fa-heart sm:m-auto"></i>
                        <span class="xs:hidden sm:block">Like</span>
                    </button>
                </form>
            @endif
        </div>
        <a href="{{ route('posts.show', $post)}}" class="flex items-center justify-center gap-2 text-action-pos font-bold">
            <i class="fas fa-comment sm:m-auto"></i>
            <span class="xs:hidden sm:block">Comment</span>
        </a>
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="flex items-center justify-center gap-2 text-danger font-bold" type="submit">
                    <i class="fas fa-trash sm:m-auto"></i>
                    <span class="xs:hidden sm:block">Delete</span>
                </button>
            </form>
        @endcan
    @endauth
    </div>
</div>