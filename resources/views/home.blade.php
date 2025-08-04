@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-50 dark:bg-gray-900 min-h-screen">
        {{-- Hero Section --}}
        <section class="text-center py-20 px-6 lg:px-12">
            <img src="/images/TalentDaemonHeader.png" alt="TalentDaemon" class="mx-auto mb-6 max-w-xs">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                Smarter Hiring, Powered by AI Trajectory Analysis
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                TalentDaemon matches candidates based on where they're headed—not just where they've been.
                Rethink your hiring pipeline with real career trajectory modelling.
            </p>
            <div class="mt-8">
                <a href="#" class="inline-block bg-purple-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-600 transition">
                    Request Early Access
                </a>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-6xl mx-auto px-6 lg:px-12">
                <div class="grid md:grid-cols-3 gap-12 text-center">
                    <div>
                        <img src="/images/f784ae4e-ca82-4853-a01a-11dbb223758a.png" alt="Feature 1" class="mx-auto mb-4 h-20">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">AI Resume Scoring</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">Automatic, intelligent filtering of candidate profiles based on true role fit.</p>
                    </div>
                    <div>
                        <img src="/images/talent-daemon-beta-sign-up.png" alt="Feature 2" class="mx-auto mb-4 h-20">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Beta Access Queue</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">Join a curated set of companies redefining what hiring intelligence means.</p>
                    </div>
                    <div>
                        <img src="/images/talent-daemon-privacy.png" alt="Feature 3" class="mx-auto mb-4 h-20">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Uncompromising Privacy</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">We never sell your data. Period. Our systems are built with compliance in mind.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Call to Action --}}
        <section class="py-20 px-6 lg:px-12 bg-gray-100 dark:bg-gray-700 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                Ready to see smarter hiring in action?
            </h2>
            <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                TalentDaemon is launching soon. Be the first to try it and help shape the future of intelligent recruiting.
            </p>
            <div class="mt-8">
                <a href="#" class="inline-block bg-purple-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-600 transition">
                    Join the Waitlist
                </a>
            </div>
        </section>
    </div>
@endsection