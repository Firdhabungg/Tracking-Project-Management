<div class="max-w-7xl mx-auto bg-white overflow-hidden mt-4">
    <h1 class="text-center my-2 text-2xl font-bold">Project Monitoring</h1>
    <div class="flex justify-between items-center">
        <a href="{{ '/project/create' }}" wire:navigate
            class="p-2 rounded font-bold bg-amber-500 hover:bg-amber-600 transition-colors"><i
                class="fa-solid fa-plus"></i> Tambah Project</a>
        <div class="flex justify-center items-center">
            <i class="fa-solid fa-magnifying-glass text-xl mr-2"></i>
            <input wire:model.live="search" type="text" id="search"
                class="w-full p-2 border-2 border-blue-700 shadow-sm bg-gray-200 rounded-xl" placeholder="search...">
        </div>
    </div>

    <div class="overflow-x-auto bg-gray-50 rounded-sm shadow-md mt-3">
        <table class="w-full text-left border-collapse min-w-max ">
            <thead>
                <tr class="bg-blue-500 uppercase text-white">
                    <th class="p-3">Project Name</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Project Leader</th>
                    <th class="p-3">Start Date</th>
                    <th class="p-3">End Date</th>
                    <th class="p-3">Progress</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="text-gray-500 text-sm">
                        <td class="p-3">{{ $project->title }}</td>
                        <td class="p-3">{{ $project->client->company_name }}</td>
                        <td class="p-3">
                            <div class="flex items-center gap-3">
                                <div class="flex flex-col">
                                    <span class="font-semibold text-sm">{{ $project->user->name }}</span>
                                    <span class="text-xs">{{ $project->user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</td>
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-3 w-32">
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full {{ $project->progress == 100 ? 'bg-green-600' : 'bg-blue-500' }} rounded-full"
                                        style="width: {{ $project->progress }}%"></div>
                                </div>
                                <span class="text-xs font-bold w-10">{{ $project->progress }}%</span>
                            </div>
                        </td>
                        <td class="text-center p-3">
                            <div class="flex justify-center items-center gap-2">
                                <button wire:click="confirmDelete({{ $project->id }})"
                                    class="p-1.5 bg-red-600 text-white rounded hover:bg-red-700 transition-colors shadow-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button wire:click="editProject({{ $project->id }})"
                                    class="p-1.5 bg-green-600 text-white rounded hover:bg-green-700 transition-colors shadow-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 font-bold text-center text-gray-500">
                            The project is empty
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-3 py-4">
            {{ $projects->links() }}
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-6 flex flex-col items-end text-sm pr-2">
        <span class="text-gray-500">Created by:</span>
        <span class="font-bold text-blue-500">Dicky Firdha Firmansyah</span>
    </div>

    @include('livewire.modals.delete-project')
    @include('livewire.modals.edit-project')
</div>
