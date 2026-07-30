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
                            <div class="flex items-center gap-3 w-24">
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full {{ $project->progress == 100 ? 'bg-green-500' : 'bg-blue-500' }} rounded-full"
                                        style="width: {{ $project->progress }}%"></div>
                                </div>
                                <span class="text-sm font-bold text-gray-700 w-10">{{ $project->progress }}%</span>
                            </div>
                        </td>
                        <td class="p-3">{{ $project->progress }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
