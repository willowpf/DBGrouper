@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">
            Edit Ice Cream
        </h1>

        <form action="{{ route('icecreams.update', $iceCream->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 dark:text-white">Name:</label>
                <input type="text" name="name" value="{{ $iceCream->name }}" 
                       class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-white">Size:</label>
                <select name="size" 
                        class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                               bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="Small" {{ $iceCream->size == 'Small' ? 'selected' : '' }}>Small</option>
                    <option value="Medium" {{ $iceCream->size == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Large" {{ $iceCream->size == 'Large' ? 'selected' : '' }}>Large</option>
                </select>
            </div>

            <div>
    <label class="block text-gray-700 dark:text-white">Flavor:</label>
    <select name="flavor"
            class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                   bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
        <option value="Vanilla" {{ $iceCream->flavor == 'Vanilla' ? 'selected' : '' }}>Vanilla</option>
        <option value="Chocolate" {{ $iceCream->flavor == 'Chocolate' ? 'selected' : '' }}>Chocolate</option>
        <option value="Strawberry" {{ $iceCream->flavor == 'Strawberry' ? 'selected' : '' }}>Strawberry</option>
        <option value="Mint Chocolate Chip" {{ $iceCream->flavor == 'Mint Chocolate Chip' ? 'selected' : '' }}>Mint Chocolate Chip</option>
        <option value="Cookies and Cream" {{ $iceCream->flavor == 'Cookies and Cream' ? 'selected' : '' }}>Cookies and Cream</option>
        <option value="Rocky Road" {{ $iceCream->flavor == 'Rocky Road' ? 'selected' : '' }}>Rocky Road</option>
        <option value="Mango" {{ $iceCream->flavor == 'Mango' ? 'selected' : '' }}>Mango</option>
        <option value="Ube" {{ $iceCream->flavor == 'Ube' ? 'selected' : '' }}>Ube</option>
        <option value="Coffee" {{ $iceCream->flavor == 'Coffee' ? 'selected' : '' }}>Coffee</option>
        <option value="Matcha" {{ $iceCream->flavor == 'Matcha' ? 'selected' : '' }}>Matcha</option>
    </select>
</div>


            <div>
                <label class="block text-gray-700 dark:text-white">Price:</label>
                <input type="number" name="price" step="0.01" value="{{ $iceCream->price }}" 
                       class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
            </div>

            <button type="submit"
                    class="w-full px-4 py-2 bg-primary text-white rounded-lg shadow-md 
                           hover:bg-sky-400 hover:scale-105 transition-transform duration-300">
                Update Ice Cream
            </button>
        </form>
    </div>
@endsection

