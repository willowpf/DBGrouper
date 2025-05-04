<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Report Details</h2>

    <div class="mb-4">
        <p><strong>Type:</strong> {{ ucfirst($report->type) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($report->status) }}</p>
        <p><strong>Requested:</strong> {{ $report->requested_at->format('Y-m-d H:i') }}</p>
        <p><strong>Completed:</strong> {{ $report->completed_at?->format('Y-m-d H:i') ?? 'N/A' }}</p>
        <p><strong>Parameters:</strong> <code>{{ json_encode($report->parameters) }}</code></p>
        <p><strong>File:</strong>
            @if ($report->file_path)
                <a href="{{ Storage::url($report->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Download ({{ $report->file_format }})</a>
            @else
                N/A
            @endif
        </p>
    </div>

    <a href="{{ route('reports.index') }}" class="text-sm text-gray-600 hover:underline">← Back to list</a>
</div>
