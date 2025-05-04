<div class="p-6 max-w-7xl mx-auto bg-white shadow rounded-lg">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">📊 Reports</h2>

    {{-- Filters and Actions --}}
    <div class="flex flex-wrap items-center gap-4 mb-6">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search by title or type..."
            class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />

        <select wire:model="status"
            class="w-full sm:w-1/4 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">All Statuses</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="completed">Completed</option>
            <option value="failed">Failed</option>
        </select>

        {{-- Toggle for showing archived reports --}}
        <label class="inline-flex items-center text-sm text-gray-700">
            <input type="checkbox" wire:model="showArchived" class="mr-2">
            Show Archived
        </label>

        <a href="{{ route('reports.create') }}"
            class="ml-auto bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-medium shadow-sm transition duration-200">
            + New Report
        </a>
    </div>

    {{-- Bulk Actions --}}
    @if(count($this->selected))
        <div class="mb-4 space-x-3">
            <button wire:click="deleteSelected"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                🗑️ Archive
            </button>
            <button wire:click="restoreSelected"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                ♻️ Restore
            </button>
        </div>
    @endif

    {{-- Reports Table --}}
    <div class="overflow-x-auto border rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3">
                        <input type="checkbox" wire:model="selectAll">
                    </th>
                    <th class="p-3 text-left font-semibold">Title</th>
                    <th class="p-3 text-left font-semibold">Type</th>
                    <th class="p-3 text-left font-semibold">Status</th>
                    <th class="p-3 text-left font-semibold">Requested</th>
                    <th class="p-3 text-left font-semibold">Completed</th>
                    <th class="p-3 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($reports as $report)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3">
                            <input type="checkbox" wire:model="selected" value="{{ $report->id }}">
                        </td>
                        <td class="p-3 font-medium text-gray-800">{{ $report->title ?? '—' }}</td>
                        <td class="p-3 capitalize">{{ $report->type }}</td>
                        <td class="p-3">
                            <span class="inline-block px-3 py-1 text-sm rounded-full text-white
                                @if($report->status === 'completed') bg-green-600
                                @elseif($report->status === 'processing') bg-yellow-500
                                @elseif($report->status === 'failed') bg-red-600
                                @else bg-gray-500 @endif">
                                {{ ucfirst($report->status) }}
                            </span>
                        </td>
                        <td class="p-3 text-gray-600">{{ $report->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-3 text-gray-600">{{ $report->generated_at?->format('Y-m-d H:i') ?? '—' }}</td>
                        <td class="p-3 space-x-3">
                            @if($report->trashed())
                                <button wire:click="restoreReport({{ $report->id }})"
                                        class="text-yellow-600 hover:underline font-medium">Restore</button>
                            @else
                                <a href="{{ route('reports.show', $report) }}"
                                   class="text-blue-600 hover:underline font-medium">View</a>
                                @if($report->isReady())
                                    <a href="{{ $report->fileUrl() }}"
                                       target="_blank"
                                       class="text-green-700 hover:underline font-medium">Download</a>
                                @endif
                                <button wire:click="deleteReport({{ $report->id }})"
                                        class="text-red-600 hover:underline font-medium">Delete</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">No reports found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $reports->links() }}
    </div>
</div>
