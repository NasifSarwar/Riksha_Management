<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                Welcome, {{ $user->name }}! <br>
                Your Email: {{ $user->email }} <br>
                You are a Registered Admin. 
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Squares Section -->
                <div class="squares-container">
                    <div class="square">
                        <div class="title">Number of Rikshas</div>
                        <div class="value">256</div>
                    </div>
                    <div class="square">
                        <div class="title">Number of Pullers</div>
                        <div class="value">320</div>
                    </div>
                    <div class="square">
                        <div class="title">Rikshas Online</div>
                        <div class="value">150</div>
                    </div>
                    <div class="square">
                        <div class="title">Number of Cases</div>
                        <div class="value">58</div>
                    </div>
                </div>
            </div>   
    </div>
</x-app-layout>
