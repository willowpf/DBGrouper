<?php

namespace App\Livewire\Reports;

use App\Models\Report;
use Livewire\Component;

class Show extends Component
{
    public Report $report;

    public function render()
    {
        return view('livewire.reports.show');
    }
}

