<x-mail::message>
Hi {{ $post->user->username }},

Exciting news! Your post received a like. 🎉
See the Post: {{ url(route('posts.show', $post)) }}

Keep up the good work and thanks for sharing on {{ config('app.name') }}.

Best,
The {{ config('app.name') }} Team
</x-mail::message>
