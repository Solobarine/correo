<x-mail::message>
Dear {{ $user->username }},

We are thrilled to welcome you to {{ config('app.name') }}. Your successful registration is a delight to see, and we hope you have a great experience using our platform.

Here are some of the things you can do now that you're logged in:

<ul>
    <li>1. Create and share your posts with the community.</li>
    <li>2. Engage with others by liking, commenting, and sharing their posts.</li>
    <li>3. Explore trending topics and discover new content.</li>
    <li>4. Personalize your profile and settings to make your experience unique.</li>
</ul>

<x-mail::button :url="route('posts')">
View Posts
</x-mail::button>

If you have any questions, run into issues, or need assistance with anything, our support team is here to help. Feel free to reach out via our contact page or the in-app chat.

Thank you for being a part of our growing community. We look forward to seeing your contributions and helping you connect with like-minded individuals.

Happy posting!<br/>
Best regards,<br>
The {{ config('app.name') }} Team
</x-mail::message>
