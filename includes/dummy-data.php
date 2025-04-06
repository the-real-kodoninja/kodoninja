<?php
declare(strict_types=1);

function get_dummy_posts(): array {
    return [
        [
            'username' => 'kodoninja',
            'profile_photo' => 'assets/images/profiles/kodoninja.jpg',
            'content' => 'The secret to resilience? Small steps every day. Here’s how I rewired my mind for success. #Mindset #Growth',
            'type' => 'blog',
            'image' => 'assets/images/posts/resilience.jpg',
            'likes' => 87,
            'comments' => 12,
            'shares' => 9,
            'timestamp' => '2 hours ago',
        ],
        [
            'username' => 'KodoSage',
            'profile_photo' => 'assets/images/profiles/kodo-sage.jpg',
            'content' => 'Goal Update: 75% to mastering meditation! Progress feels like freedom. #Goals',
            'type' => 'goal',
            'image' => null,
            'likes' => 45,
            'comments' => 6,
            'shares' => 3,
            'timestamp' => '1 day ago',
            'progress' => 75,
        ],
    ];
}
