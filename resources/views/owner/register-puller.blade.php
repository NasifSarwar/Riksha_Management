<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Puller') }}
        </h2>
      </x-slot>



      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Pullers List Table -->
                    @if ($allPullers->count())
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Your Registered Pullers</h3>
                            <div class="overflow-x-auto">
                                <table class="custom-table w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-gray-700">Name</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Email</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Phone</th>
                                            <th class="px-4 py-2 text-left text-gray-700">NID</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Full Address</th>
                                            <th class="px-4 py-2 text-left text-gray-700">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allPullers as $puller)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-2 text-gray-800">{{ $puller->name }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $puller->email }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $puller->phone_number }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $puller->nid_number }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $puller->full_address }}</td>
                                                <td class="px-4 py-2 font-semibold">
                                                    @if (is_null($puller->is_approved))
                                                        <span class="text-yellow-600">Pending</span>
                                                    @elseif ($puller->is_approved)
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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Registration Form -->
                    <form action="{{ route('owner.register-puller.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- NID Number -->
                        <div class="mt-4">
                            <label for="nid_number" class="block text-sm font-medium text-gray-700">NID Number</label>
                            <input type="text" name="nid_number" id="nid_number" value="{{ old('nid_number') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                        <!-- Full Address -->
                        <div class="mt-4">
                            <label for="full_address" class="block text-sm font-medium text-gray-700">Full Address</label>
                            <textarea name="full_address" id="full_address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('full_address') }}</textarea>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Submit Button -->
                        <div style="margin-top: 24px;">
                            <button type="submit" style="
                                width: 100%;
                                background-color: #4299e1; /* Blue color */
                                color: white;
                                font-weight: bold;
                                padding: 12px 16px;
                                border-radius: 8px;
                                border: none;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                                outline: none;
                            "
                            onmouseover="this.style.backgroundColor='#2b6cb0'" onmouseout="this.style.backgroundColor='#4299e1'">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
