<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $projectId = null;
    public bool $showDeleteModal = false;

    public function confirmDelete(int $id): void
    {
        $this->projectId = $id;
        $this->showDeleteModal = true;
    }

    public function delete(): void
    {
        Project::findOrFail($this->projectId)->delete();
        $this->reset([
            'projectId',
            'showDeleteModal'
        ]);
        session()->flash('succes', 'Project berhasil dihapus');
    }

    public function render()
    {
        $projects = Project::with(['client', 'user'])->get();
        return view('livewire.dashboard', compact('projects'));
    }
}
