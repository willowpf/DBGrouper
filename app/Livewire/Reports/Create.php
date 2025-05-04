<?php

namespace App\Livewire\Reports;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;


class Create extends Component
{
    public $type = '';
    public $title;

    public $parameters = [];

    public function updatedType()
    {
        $this->parameters = match($this->type) {
            'sales' => ['date_from' => '', 'date_to' => ''],
            'inventory' => ['category' => ''],
            default => [],
        };
    }

    public function generateReport()
    {
        $this->validate([
            'type' => 'required',
            'parameters' => 'array',
        ]);

        $report = Report::create([
            'title' => $this->title,
            'type' => $this->type,
            'parameters' => $this->parameters,
            'status' => 'processing',
            'requested_at' => now(),
        ]);

        try {
            // Generate the PDF
            $pdf = Pdf::loadView("reports.templates.{$this->type}", [
                'params' => $this->parameters,
            ]);

            // Ensure the directory exists
            Storage::makeDirectory('public/reports');

            // Build path and store the PDF
            $filename = "report_{$report->id}_" . now()->timestamp . ".pdf";
            $path = "public/reports/{$filename}";
            Storage::put($path, $pdf->output());

            // Update the report record
            $report->update([
                'file_path' => $path,
                'file_format' => 'pdf',
                'file_size' => Storage::size($path),
                'status' => 'completed',
                'completed_at' => now(),
                'created_at' => now(),
            ]);
        } catch (\Exception $e) {
            Log::error("Report generation failed: " . $e->getMessage());
            $report->update(['status' => 'failed']);
        }

        return redirect()->route('reports.index')->with('success', 'Report generated!');
    }

    public function render()
    {
        return view('livewire.reports.create');
    }
}
