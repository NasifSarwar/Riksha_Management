<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owner Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Squares Section -->
            <div class="squares-container">
                <div class="square">
                    <div class="title">Number of Rikshas</div>
                    <div class="value">{{ $totalRikshas }}</div>
                </div>
                <div class="square">
                    <div class="title">Number of Pullers</div>
                    <div class="value">{{ $totalPullers }}</div>
                </div>
                <div class="square">
                    <div class="title">Rikshas Online</div>
                    <div class="value">{{ $rikshasOnline }}</div>
                </div>
                <div class="square">
                    <div class="title">Number of Cases</div>
                    <div class="value">2</div>
                </div>
            </div>

            <!-- Table Section -->
            <!-- Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Rikshas Currently On Road</h3>
                <table class="custom-table w-full">
                    <thead>
                        <tr>
                            <th>Riksha ID</th>
                            <th>Puller ID</th>
                            <th>Puller Name</th>
                            <th>Date Online</th>
                            <th>Time Online</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rikshas as $riksha)
                            <tr>
                                <td>{{ $riksha->riksha_id }}</td>
                                <td>{{ $riksha->puller_id }}</td>
                                <td>{{ $riksha->puller_name }}</td>
                                <td>{{ $riksha->date_online }}</td>
                                <td>{{ $riksha->time_online }}</td>
                                <td>{{ $riksha->duration }}</td>
                            </tr>
                        @endforeach
                    </tbody>                </table>
            </div>
        </div>
    </div>
</x-app-layout>
