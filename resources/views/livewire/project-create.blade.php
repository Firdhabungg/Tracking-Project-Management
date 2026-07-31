<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold mb-4">Create New Project</h2>

        <form wire:submit.prevent="save" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-2">
                    <label for="title" class="block font-medium">Title Project</label>
                    <input wire:model="title" id="title" type="text"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    @error('title')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="client" class="block font-medium">Client</label>
                    <select wire:model="client_id" id="client"
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
                    <label for="leader" class="block font-medium">Project Leader</label>
                    <select wire:model="user_id" id="leader"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
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
                    <label for="start_date" class="block">Start Date</label>
                    <input wire:model="start_date" id="start_date" type="date"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    @error('start_date')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="end_date" class="block">End Date</label>
                    <input wire:model="end_date" id="end_date" type="date"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    @error('end_date')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="progress" class="block">Progress</label>
                    <input wire:model="progress" id="progress" type="number" min="0" max="100"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    @error('progress')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="status" class="block font-medium">Status</label>
                    <select id="status" wire:model="status"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
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
                    <label for="description" class="block">Description</label>
                    <textarea wire:model="description" id="description"
                        rows="3"class="w-full p-2 border border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="col-span-2">
                    <label class="block">Upload Photo / Document</label>
                    <input wire:model="photo" type="file"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700">
                    @if ($photo)
                        <div class="mt-2 text-sm text-green-600">Choose file: {{ $photo->getClientOriginalName() }}
                        </div>
                    @endif
                    @error('photo')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ '/' }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Back</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create
                    Project</button>
            </div>
        </form>
    </div>
</div>
