@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Order Confirmation
        </h1>

        <p class="text-lg text-gray-900 dark:text-white mb-4">
            Your order has been placed successfully! We’ll process it soon.
        </p>

        <a href="{{ route('icorder.order') }}" class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-sky-400 transition duration-300">
            Go Back to Orders
        </a>
    </div>
@endsection
