<?php

namespace App\Livewire\Reports;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use Flasher\Laravel\Facade\Flasher;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public array $selected = [];
    public bool $selectAll = false;

    public function updatingSearch() { $this->resetPage(); }
    public function updatingStatus() { $this->resetPage(); }

    public function render()
    {
        $reports = Report::query()
            ->when($this->search, fn($q) => $q->where('type', 'like', "%{$this->search}%"))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.reports.index', compact('reports'));
    }
    public function deleteReport($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
    
        Flasher::addSuccess('Report archived successfully.');
    }
    
    public function restoreSelected()
    {
        Report::withTrashed()->whereIn('id', $this->selected)->restore();
        $this->reset('selected', 'selectAll');
    
        Flasher::addSuccess('Selected reports restored.');
    }

}
