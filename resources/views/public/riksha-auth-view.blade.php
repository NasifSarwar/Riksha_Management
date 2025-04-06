<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Riksha Full Details</h2>
        <p><strong>Riksha ID:</strong> {{ $riksha->riksha_id }}</p>
        <p><strong>Status:</strong> {{ $riksha->status === 'assigned' ? 'Assigned' : 'Inactive' }}</p>
        <p><strong>Puller ID:</strong> {{ $riksha->puller ? $riksha->puller->id : 'N/A' }}</p>
        <p><strong>Puller Name:</strong> {{ $riksha->puller ? $riksha->puller->name : 'N/A' }}</p>
        <p><strong>Owner:</strong> {{ $riksha->owner ? $riksha->owner->name : 'N/A' }}</p>
        <p><strong>Approved:</strong> {{ $riksha->is_approved ? 'Yes' : 'No' }}</p>
        <p><strong>Created At:</strong> {{ $riksha->created_at->format('Y-m-d h:i A') }}</p>
    </div>
</x-app-layout>