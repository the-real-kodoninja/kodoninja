<?php
$page_title = "Register - Kodoninja";
require_once __DIR__ . '/../components/header.php';
?>

<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-6">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-white">Kodoninja</h2>
            <p class="mt-2 text-sm text-gray-400">Create a new account</p>
        </div>

        <!-- Input Fields (Moved to Top) -->
        <form class="space-y-6" action="/?page=register" method="POST">
            <div class="username-wrapper">
                <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                <div class="flex items-center mt-1">
                    <span class="text-gray-400 mr-2">@</span>
                    <input id="username" name="username" type="text" required class="flex-1 px-3 py-1.5 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="yourusername">
                    <span class="text-gray-400 ml-2">.kodoninja.social</span>
                </div>
                <p id="username-availability" class="mt-2 text-sm"></p>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" name="email" type="email" required class="mt-1 w-full px-3 py-1.5 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="you@example.com">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" name="password" type="password" required class="mt-1 w-full px-3 py-1.5 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="••••••••">
            </div>
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500">Sign Up</button>
            </div>
        </form>

        <!-- Divider -->
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-600"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-gray-900 text-gray-400">or</span>
            </div>
        </div>

        <!-- Social Login Buttons (Moved to Bottom) -->
        <div class="space-y-4">
            <button onclick="window.location.href='/?page=login&action=login_x'" class="w-full flex items-center justify-center py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <img src="/assets/images/x-logo.png" alt="X Logo" class="w-5 h-5 mr-2">
                Sign up with X
            </button>
            <button onclick="window.location.href='/?page=login&action=login_bluesky'" class="w-full flex items-center justify-center py-2 px-4 bg-[#1a91da] text-white rounded-md hover:bg-[#1683c2] focus:outline-none focus:ring-2 focus:ring-gray-500">
                <img src="/assets/images/bluesky-logo.png" alt="Bluesky Logo" class="w-5 h-5 mr-2">
                Sign up with Bluesky
            </button>
            <button onclick="window.location.href='/?page=login&action=login_mastodon'" class="w-full flex items-center justify-center py-2 px-4 bg-[#6364FF] text-white rounded-md hover:bg-[#5859e6] focus:outline-none focus:ring-2 focus:ring-gray-500">
                <img src="/assets/images/mastodon-logo.png" alt="Mastodon Logo" class="w-5 h-5 mr-2">
                Sign up with Mastodon
            </button>
            <button onclick="window.location.href='/?page=login&action=login_kodoverse'" class="w-full flex items-center justify-center py-2 px-4 bg-purple-600 text-white rounded-md hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <img src="/assets/images/kodoverse-logo.png" alt="Kodoverse Logo" class="w-5 h-5 mr-2">
                Sign up with Kodoverse
            </button>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
