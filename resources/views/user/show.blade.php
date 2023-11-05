@extends('components.dashboard')

@section('content')
    <div>
        <div class="flex flex-col bg-background2 rounded-lg p-3 m-3 gap-3">
            @if ($user->avatar)
                <img src="#" alt="User Avatar" class="self-start"/>
            @else
                <div class="w-24 h-24 rounded-full place-items-center p-2 bg-primary grid self-start">
                    <p class=" font-bold text-6xl text-text">{{ Str::upper($user->username[0])}}</p>
                </div>
            @endif
            <div class="flex items-center flex-wrap gap-2 p-2 justify-between">
                <p class="text-text font-bold text-xl">{{ $user->name }}</p>
                <p class="text-text">Number of Posts: <span class="font-bold">{{ $user->posts()->count()}} {{Str::plural('post', $user->posts()->count())}}</span></p>
            </div>
        </div>
        <div>
            <h2 class="font-bold mb-2 text-xl text-text px-4">Latest Posts</h2>
            @forelse ($posts as $post)
                <div class="mx-4">
                    <x-post :post="$post"/>
                </div>
            @empty
                <h2>You Have No Posts</h2>
            @endforelse
        </div>
    </div>
@endsection