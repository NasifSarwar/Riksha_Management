<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Riksha Approvals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Owner Name</th>
                                <th class="border p-2">Division</th>
                                <th class="border p-2">District</th>
                                <th class="border p-2">Police Station</th>
                                <th class="border p-2">Purchase Date</th>
                                <th class="border p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingRikshas as $riksha)
                                <tr>
                                    <td class="border p-2">{{ $riksha->owner->name ?? 'N/A' }}</td>
                                    <td class="border p-2">{{ $riksha->division }}</td>
                                    <td class="border p-2">{{ $riksha->district }}</td>
                                    <td class="border p-2">{{ $riksha->police_station }}</td>
                                    <td class="border p-2">{{ $riksha->purchase_date }}</td>
                                    <td class="border p-2">
                                        <form method="POST" action="{{ route('admin.approve-riksha', $riksha->riksha_id) }}" style="display:inline">
                                            @csrf
                                            <button type="submit" style="background-color: green; color: white; padding: 5px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;">
                                                Approve
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('admin.disapprove-riksha', $riksha->riksha_id) }}" style="display:inline">
                                            @csrf
                                            <button type="submit" style="background-color: red; color: white; padding: 5px 12px; border: none; border-radius: 4px; cursor: pointer;">
                                                Disapprove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($pendingRikshas->isEmpty())
                        <p class="text-center mt-4 text-gray-500">No pending rikshas found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
