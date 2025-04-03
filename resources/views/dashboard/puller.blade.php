<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Puller Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Your Information</h3>
                
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>NID Number</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Full Address</th>
                                <th>Registered Riksha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="highlight">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                <td>{{ $user->nid_number ?? 'N/A' }}</td>
                                <td>{{ $user->division ?? 'N/A' }}</td>
                                <td>{{ $user->district ?? 'N/A' }}</td>
                                <td>{{ $user->full_address ?? 'N/A' }}</td>
                                <td class="highlight">
                                    {{ $user->riksha_id ?? 'Not Assigned Yet' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
