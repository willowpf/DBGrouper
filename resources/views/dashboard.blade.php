<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h1 class="text-gray-900 dark:text-white font-bold text-3xl">
                {{ __('Dashboard') }}
                </h1>
                <!-- <button class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-sky-400 transition duration-300"> -->
                <button class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-blue-900">
                {{ __('Get Started') }}
</button>
        </div>
    </x-slot>

    <div class="min-h-screen py-12 bg-secondary">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            <div class="p-8 text-gray-900 dark:text-gray-100 flex items-center space-x-6">
                <img src="https://ichef.bbci.co.uk/news/480/cpsprodpb/13FCD/production/_130896818_donaldtrumpfullmugshot.jpg.webp" 
                     class="w-24 h-24 rounded-full shadow-lg" 
                     alt="Profile">
                <div>
                    <h3 class="text-2xl font-bold text-primary">{{ __("Welcome back!") }}</h3>
                    <p class="dark:text--400 text-primary">
                        {{ __("You're logged in and ready to explore.") }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-bold text-pink-500">🍦 Flavor of the Day</h3>
                    <p class="text-gray-600">Showcase a unique or seasonal flavor each day to encourage repeat visits.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all">
                    <h3 class="text-xl font-bold text-yellow-500">🍨 Build Your Own Ice Cream</h3>
                    <p class="text-slate-600">Customize your ice cream with various flavors, toppings, and syrups.</p>

                    <div class="mt-4 p-3 bg-yellow-100 text-yellow-700 rounded-lg">
                        <strong>Total Ice Creams Made:</strong> {{ $totalIceCream }}
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-bold text-sky-400 hover:text-sky-500">🍧 Ice Cream Stories</h3>
                    <p class="text-gray-600">Showcase the origin of flavors, fun facts, or ice cream history for engagement.</p>
                </div>
            </div>

            <!-- Step-by-Step Process -->
<!-- <div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="relative w-24 h-24 mx-auto rounded-full bg-yellow-400 flex items-center justify-center border-4 border-dashed border-red-500">
                <img src="/images/choose-icon.png" alt="Choose" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-bold mt-4">Choose</h3>
            <p class="text-gray-600">Browse our menus to find the foodtrip you like.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="relative w-24 h-24 mx-auto rounded-full bg-yellow-400 flex items-center justify-center border-4 border-dashed border-red-500">
                <img src="/images/pay-icon.png" alt="Pay" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-bold mt-4">Pay</h3>
            <p class="text-gray-600">Pay fast & secure online or on delivery.</p>
        </div>
        <div class=" rounded-lg ">
            <div class="relative w-24 h-24 mx-auto rounded-full bg-yellow-400 flex items-center justify-center border-4 border-dashed border-red-500">
                <img src="/images/enjoy-icon.png" alt="Enjoy" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-bold mt-4">Enjoy</h3>
            <p class="text-gray-600">Order is prepared & delivered to your door.</p>
        </div>
    </div> -->
<!-- </div> -->
</x-app-layout>
