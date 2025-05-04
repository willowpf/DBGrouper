@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Order Ice Cream
        </h1>
       
        <a href="{{ route('icorder.view') }}" 
   class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-400 transition duration-300 mt-2 inline-block">
   View Order
</a>



        <div class="overflow-x-auto mt-4">
            <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Name</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Size</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Flavor</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Price</th>
                        <th class="p-2 border border-gray-200 dark:border-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($icecreams as $iceCream)
                        <tr class="hover:bg-sky-400 dark:hover:bg-sky-600 transition duration-300">
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->name }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->size }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $iceCream->flavor }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">${{ $iceCream->price }}</td>
                            <td class="p-2 border border-gray-200 dark:border-gray-700">
                            <form action="{{ route('icorder.store') }}" method="POST">
    @csrf
    <input type="hidden" name="ice_cream_id" value="{{ $iceCream->id }}">
    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-sky-400 transition duration-300">
        Order Now
    </button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection