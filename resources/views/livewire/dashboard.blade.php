<div class="max-w-7xl mx-auto bg-white overflow-hidden mt-4">
    <h1 class="text-center my-2 text-2xl font-bold">Project Monitoring</h1>
    <div class="overflow-x-auto bg-gray-50 rounded-sm shadow-2xl">
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
                @foreach ($projects as $project)
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
                                <button
                                    class="p-1.5 bg-green-600 text-white rounded hover:bg-green-700 transition-colors shadow-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="font-bold mb-6">Apakah Anda yakin ingin menghapus project ini?</h2>
                <div class="mt-4 flex gap-2">
                    <button wire:click="delete" class="bg-red-500 text-white px-4 py-2 rounded">Ya, Hapus</button>
                    <button wire:click="$set('showDeleteModal', false)"
                        class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                </div>
            </div>
        </div>
    @endif
</div>
