@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-md p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Add New Ice Cream
        </h1>

        <form action="{{ route('icecreams.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 dark:text-white mb-1">Name:</label>
                <input type="text" name="name" required
                       class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white 
                              focus:outline-none focus:ring-2 focus:ring-sky-400">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-white mb-1">Size:</label>
                <select name="size" required
                        class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white 
                               focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <option value="" disabled selected>Select Size</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>


            <div>
                <label class="block text-gray-700 dark:text-white mb-1">Flavor:</label>
                <select name="flavor" required
                        class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white 
                               focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <option value="" disabled selected>Select Flavor</option>
                    <option value="Vanilla">Vanilla</option>
                    <option value="Chocolate">Chocolate</option>
                    <option value="Strawberry">Strawberry</option>
                    <option value="Mint Chocolate Chip">Mint Chocolate Chip</option>
                    <option value="Cookies and Cream">Cookies and Cream</option>
                    <option value="Rocky Road">Rocky Road</option>
                    <option value="Mango">Mango</option>
                    <option value="Ube">Ube</option>
                    <option value="Coffee">Coffee</option>
                    <option value="Matcha">Matcha</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-white mb-1">Price:</label>
                <input type="number" name="price" step="any" required
                       class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white 
                              focus:outline-none focus:ring-2 focus:ring-sky-400">
            </div>
            

            <button type="submit" 
                    class="w-full px-4 py-2 bg-primary text-white rounded-lg shadow-md 
                           hover:bg-sky-400 transition duration-300">
                Add Ice Cream
            </button>
        </form>
    </div>
@endsection
