@props(['comment' => $comment])

<div class="relative m-2 mb-4 grid grid-col-1 gap-3 p-2 rounded-lg bg-background1 py-3">
    <div class="relative flex items-center gap-2">
        @if ($comment->user->avatar)
            <img src="{{ $comment->user->avatar }}" alt="User Avatar" class="w-avatar h-avatar flex rounded-full grid place-items-center bg-primary self-start"/>
        @else
            <div class="w-avatar h-avatar flex rounded-full grid place-items-center bg-primary self-start">
                <p class=" font-bold text-x text-text">{{ Str::upper($comment ->user->username[0])}}</p>
            </div>
        @endif
        <p class="font-semibold">{{ $comment->user->name}}</p>
        <small class="font-semibold grow text-right">{{ $comment->created_at->diffForHumans() }}</small>
    </div>
    <hr>
    <p class="p-2 pr-3.5 text-sm">{{ $comment->content }}</p>
    @can('destroy', $comment)
        <form action="{{ route('posts.comment.destroy', $comment)}}" method="post" class="absolute right-2 bottom-2 flex items-center justify-end">
            @csrf
            @method('DELETE')
            <button type="submit" class="font-semibold text-danger">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    @endcan
</div>