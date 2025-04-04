<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Riksha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Show Riksha Table --}}
                    @if ($allRikshas->count())
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Your Registered Rikshas</h3>
                            <div class="overflow-x-auto">
                                <table class="custom-table w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-gray-700">Riksha ID</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Purchase Date</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Division</th>
                                            <th class="px-4 py-2 text-left text-gray-700">District</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Police Station</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allRikshas as $riksha)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-2 text-gray-800">{{ $riksha->riksha_id }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $riksha->purchase_date }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $riksha->division }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $riksha->district }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $riksha->police_station }}</td>
                                                <td class="px-4 py-2 font-semibold">
                                                    @if (is_null($riksha->is_approved))
                                                        <span class="text-yellow-600">Pending</span>
                                                    @elseif ($riksha->is_approved)
                                                        <span class="text-green-600">Approved</span>
                                                    @else
                                                        <span class="text-red-600">Disapproved</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Registration Form --}}
                    <form action="{{ route('owner.register-riksha.store') }}" method="POST">
                        @csrf

                        <!-- Purchase Date -->
                        <div class="mt-4">
                            <label for="purchase_date" class="block text-sm font-medium text-gray-700">Purchase Date</label>
                            <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Division -->
                        <div class="mt-4">
                            <label for="division" class="block text-sm font-medium text-gray-700">Division</label>
                            <input type="text" name="division" id="division" value="{{ old('division') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- District -->
                        <div class="mt-4">
                            <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                            <input type="text" name="district" id="district" value="{{ old('district') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Police Station -->
                        <div class="mt-4">
                            <label for="police_station" class="block text-sm font-medium text-gray-700">Police Station</label>
                            <input type="text" name="police_station" id="police_station" value="{{ old('police_station') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Submit Button -->
                        <div style="margin-top: 24px;">
                            <button type="submit" style="
                                width: 100%;
                                background-color: #4299e1;
                                color: white;
                                font-weight: bold;
                                padding: 12px 16px;
                                border-radius: 8px;
                                border: none;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                                outline: none;
                            " onmouseover="this.style.backgroundColor='#2b6cb0'" onmouseout="this.style.backgroundColor='#4299e1'">
                                Register Riksha
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
