<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $projects = Project::with(['client', 'user'])->get();
        return view('livewire.dashboard', compact('projects'));
    }
}
