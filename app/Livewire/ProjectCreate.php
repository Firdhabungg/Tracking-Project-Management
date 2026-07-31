<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectCreate extends Component
{
    use WithFileUploads;

    public $title = '';
    public $client_id = '';
    public $user_id = '';
    public $start_date = '';
    public $end_date = '';
    public $progress = 0;
    public $status = 'not_started';
    public $description = '';
    public $photo = '';

    public function save()
    {
        $validated =
            $this->validate([
                'title'         => 'required|string|min:4|max:50',
                'client_id'     => 'required|exists:clients,id',
                'user_id'       => 'required|exists:users,id',
                'start_date'    => 'required|date',
                'end_date'      => 'nullable|date|after_or_equal:start_date',
                'progress'      => 'required|integer|min:0|max:100',
                'status'        => 'required|in:not_started,in_progress,completed,on_hold',
                'description'   => 'nullable|string',
                'photo'         => 'nullable|image|max:2048'
            ]);

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('projects', 'public');
        }
        $validated['photo'] = $photoPath;
        Project::create($validated);

        session()->flash('success', 'Project berhasil ditambahkan');
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.project-create', [
            'clients' => Client::all(),
            'users' => User::all()
        ]);
    }
}
