<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'TalentDaemon')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional: Custom font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/talentdaemon.css') }}">

</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- Navigation bar (optional) -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">TalentDaemon</a>
        <div class="space-x-4">
            <a href="{{ url('/login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
            <a href="{{ url('/jobs/all') }}" class="text-gray-700 hover:text-indigo-600">All Jobs</a>
        </div>
    </div>
</nav>

<!-- Main content -->
<main class="flex-1">
    @yield('content')
</main>

<!-- Footer (optional) -->
<footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
    &copy; {{ date('Y') }} TalentDaemon. All rights reserved.
</footer>
</body>
</html>
