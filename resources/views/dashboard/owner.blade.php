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
                    <div class="value">10</div>
                </div>
                <div class="square">
                    <div class="title">Number of Pullers</div>
                    <div class="value">15</div>
                </div>
                <div class="square">
                    <div class="title">Rikshas Online</div>
                    <div class="value">8</div>
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
                        <tr>
                            <td>R001</td>
                            <td>P101</td>
                            <td>Rahim</td>
                            <td>2025-04-02</td>
                            <td>10:00 AM</td>
                            <td>2h 30m</td>
                        </tr>
                        <tr>
                            <td>R002</td>
                            <td>P102</td>
                            <td>Karim</td>
                            <td>2025-04-02</td>
                            <td>11:15 AM</td>
                            <td>1h 45m</td>
                        </tr>
                        <tr>
                            <td>R003</td>
                            <td>P103</td>
                            <td>Abdul</td>
                            <td>2025-04-02</td>
                            <td>09:45 AM</td>
                            <td>3h 10m</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
