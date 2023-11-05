<x-mail::message>
Hi {{ $post->user->username}},

Great news! Someone just commented on your post:

"{{ $comment->content }}"

Feel free to keep the conversation going and engage with your audience. We appreciate your contributions to {{ config('app.name') }}.

Best Regards,
The {{ config('app.name') }} Team
</x-mail::message>
