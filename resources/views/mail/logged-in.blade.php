<x-mail::message>
# Hello {{$user->username}}

You successfully logged in to {{ config('app.name') }} at {{ $date }}.

<x-mail::button :url="route('posts')">
View Posts
</x-mail::button>

Thanks for choosing us,<br>
The {{ config('app.name') }} Team
</x-mail::message>
