<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithFileUploads, WithPagination;

    public $search = '';

    public $title = '';
    public $user_id = '';
    public $client_id = '';
    public $start_date = '';
    public $end_date = '';
    public $progress = '';
    public $status = '';
    public $description = '';
    public $photo = '';
    public ?int $projectId = null;
    public bool $showDeleteModal = false;
    public bool $showEditProjectModal = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->projectId = $id;
        $this->showDeleteModal = true;
    }

    public function delete(): void
    {
        $project = Project::findOrFail($this->projectId);
        if ($project->photo) {
            Storage::disk('public')->delete($project->photo);
        }
        $project->delete();

        $this->reset();
        session()->flash('succes', 'Project berhasil dihapus');
    }

    public function editProject(int $id): void
    {
        $project = Project::findOrFail($id);

        $this->projectId = $project->id;
        $this->title = $project->title;
        $this->client_id = $project->client_id;
        $this->user_id = $project->user_id;
        $this->start_date = $project->start_date;
        $this->end_date = $project->end_date;
        $this->progress = $project->progress;
        $this->status = $project->status;
        $this->description = $project->description;

        $this->showEditProjectModal = true;
    }

    public function update()
    {
        $this->validate([
            'title'         => 'required|string|max:50',
            'client_id'     => 'required|exists:clients,id',
            'user_id'       => 'required|exists:users,id',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
            'progress'      => 'required|integer|min:0|max:100',
            'status'        => 'required|in:not_started,in_progress,completed,on_hold',
            'description'   => 'nullable|string',
            'photo'         => 'nullable|image|max:2048'
        ]);

        $project = Project::findOrFail($this->projectId);

        if ($this->photo) {
            if ($project->photo) {
                Storage::disk('public')->delete($project->photo);
            }
            $photoPath = $this->photo->store('projects', 'public');
            $project->photo = $photoPath;
        }

        $project->update([
            'title'       => $this->title,
            'client_id'   => $this->client_id,
            'user_id'     => $this->user_id,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
            'progress'    => $this->progress,
            'status'      => $this->status,
            'description' => $this->description,
        ]);

        $this->showEditProjectModal = false;
        $this->reset();
        session()->flash('success', 'Project berhasil diupdate');
    }

    public function render()
    {
        $projects = Project::with(['client', 'user'])
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhereHas('client', function ($query) {
                $query->where('company_name', 'like', '%' . $this->search . '%');
            })->paginate(3);
        return view('livewire.dashboard', [
            'projects'  => $projects,
            'clients'   => Client::all(),
            'users'      => User::all()
        ]);
    }
}
