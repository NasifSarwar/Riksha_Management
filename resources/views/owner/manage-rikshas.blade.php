<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Rikshas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Unassigned Rikshas -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl mb-4">Unassigned Rikshas</h3>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Riksha ID</th>
                                <th class="px-4 py-2">Division</th>
                                <th class="px-4 py-2">District</th>
                                <th class="px-4 py-2">Purchase Date</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unassignedRikshas as $riksha)
                                <tr>
                                    <td class="px-4 py-2">{{ $riksha->riksha_id }}</td>
                                    <td class="px-4 py-2">{{ $riksha->division }}</td>
                                    <td class="px-4 py-2">{{ $riksha->district }}</td>
                                    <td class="px-4 py-2">{{ $riksha->purchase_date }}</td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('owner.riksha.assign-puller', $riksha->riksha_id) }}" method="POST">
                                            @csrf
                                            <label for="puller_id">Select Puller</label>
                                            <select name="puller_id" id="puller_id" required>
                                                @foreach($pullers as $puller)
                                                    <option value="{{ $puller->id }}">{{ $puller->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" style="background-color: #3B82F6; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Assign Puller</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Assigned Rikshas -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl mb-4">Assigned Rikshas</h3>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Riksha ID</th>
                                <th class="px-4 py-2">Division</th>
                                <th class="px-4 py-2">District</th>
                                <th class="px-4 py-2">Purchase Date</th>
                                <th class="px-4 py-2">Puller Name</th>
                                <th class="px-4 py-2">Assigned Since</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignedRikshas as $riksha)
                                <tr>
                                    <td class="px-4 py-2">{{ $riksha->riksha_id }}</td>
                                    <td class="px-4 py-2">{{ $riksha->division }}</td>
                                    <td class="px-4 py-2">{{ $riksha->district }}</td>
                                    <td class="px-4 py-2">{{ $riksha->purchase_date }}</td>
                                    <td class="px-4 py-2">{{ $riksha->puller ? $riksha->puller->name : 'N/A' }}</td>
                                    <td class="px-4 py-2">
                                        @if($riksha->assigned_at)
                                            {{ $riksha->assigned_at->diffForHumans() }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('owner.riksha.unassign-puller', $riksha->riksha_id) }}" method="POST">
                                            @csrf
                                            <button type="submit" style="background-color: #EF4444; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Unassign Puller</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
