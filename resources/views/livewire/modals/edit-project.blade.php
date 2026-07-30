<div>
    @if ($showEditProjectModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 overflow-y-auto">
            <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto my-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold mb-4">Edit Project</h2>
                    <button wire:click="$set('showEditProjectModal', false)"
                        class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                        &times;
                    </button>
                </div>
                <form wire:submit.prevent="update" class="space-y-4 text-left">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-2">
                            <label class="block font-medium">Title Project</label>
                            <input wire:model="title" type="text"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @error('title')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="block font-medium">Client</label>
                            <select wire:model="client_id"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="block font-medium">Project Leader</label>
                            <select wire:model="user_id" class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Leader</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">Start Date</label>
                            <input wire:model="start_date" type="date"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @error('start_date')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">End Date</label>
                            <input wire:model="end_date" type="date"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @error('end_date')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">Progress</label>
                            <input wire:model="progress" type="number" min="0" max="100"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @error('progress')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium">Status</label>
                            <select wire:model="status" class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="not_started">Not Started</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="on_hold">On Hold</option>
                            </select>
                            @error('status')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label class="block">Description</label>
                            <textarea wire:model="description" rows="3"class="w-full p-2 border border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label class="block">Change Photo (Opsional)</label>
                            <input wire:model="photo" type="file"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700">
                            @error('photo')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <button type="button" wire:click="$set('showEditProjectModal', false)"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Update Project</button>
                    </div>
                </form>
            </div>
        </div>

    @endif
</div>
