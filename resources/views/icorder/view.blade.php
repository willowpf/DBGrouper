@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            My Orders
        </h1>

        @if ($orders->isEmpty())
            <p>No orders placed yet.</p>
        @else
            <div class="overflow-x-auto mt-4">
                <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Order ID</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Ice Cream</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Flavor</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Size</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Price</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Status</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Date</th>
                            <th class="p-2 border border-gray-200 dark:border-gray-700">Pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="hover:bg-sky-400 dark:hover:bg-sky-600 transition duration-300">
                                <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $order->id }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $order->iceCream->name }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $order->iceCream->flavor }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $order->iceCream->size }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700" id="price{{ $order->id }}">${{ $order->iceCream->price }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">
                                    @if($order->status == 'completed')
                                        <span class="text-green-600">Completed</span>
                                    @else
                                        <span class="text-yellow-600">Pending</span>
                                    @endif
                                </td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">{{ $order->created_at->format('F d, Y') }}</td>
                                <td class="p-2 border border-gray-200 dark:border-gray-700">
                                    @if ($order->status == 'pending')
                              
                                        <form action="{{ route('icorder.pay', $order->id) }}" method="POST" class="mt-4">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="paymentAmount{{ $order->id }}" class="block text-sm font-medium">Enter Payment Amount</label>
                                                <input type="number" id="paymentAmount{{ $order->id }}" name="paymentAmount" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md" required>
                                            </div>
                                            <div class="mb-4">
    <p id="changeAmount{{ $order->id }}" class="text-sm text-gray-700">Change: $0</p>
</div>

                                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-400 transition duration-300">
                                                Pay!
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@if(session('status'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
        {{ session('status') }}
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function () {
                const orderId = this.id.replace('paymentAmount', ''); 
                const paymentAmount = parseFloat(this.value) || 0;
                
               
                const priceElement = document.querySelector(`#price${orderId}`);
                if (!priceElement) return; 
                
                const priceText = priceElement.textContent.replace('$', '').trim(); 
                const price = parseFloat(priceText) || 0; 
                
           
                const change = paymentAmount - price;
             
                const changeElement = document.getElementById(`changeAmount${orderId}`);
                if (!changeElement) return; 
                
                if (change >= 0) {
                    changeElement.textContent = `Change: $${change.toFixed(2)}`;
                } else {
                    changeElement.textContent = `Amount owed: $${Math.abs(change).toFixed(2)}`;
                }
            });
        });
    });
</script>

