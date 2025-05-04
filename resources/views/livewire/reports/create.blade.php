<div class="p-6 max-w-xl mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📄 Generate Report</h2>

    <form wire:submit.prevent="generateReport" class="space-y-5">
        {{-- Report Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Report Title</label>
            <input type="text" wire:model="title"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                   placeholder="Enter report title..." />
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Report Type --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Report Type</label>
            <select wire:model="type"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                <option value="">-- Select --</option>
                <option value="sales">Sales Report</option>
                <option value="inventory">Inventory Report</option>
            </select>
            @error('type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Dynamic Parameters --}}
        @foreach($parameters as $key => $value)
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ ucwords(str_replace('_', ' ', $key)) }}
                </label>
                <input wire:model="parameters.{{ $key }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
                @error("parameters.$key") <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                🚀 Generate Report
            </button>
        </div>
    </form>
</div>
