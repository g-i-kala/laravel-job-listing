<x-layout>
    <x-slot:heading>
       Job listing.
    </x-slot>
    <h1> Hello from the jobs page.</h1>
    <div class="space-y-4">
        @foreach ($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="text-sm font-bold text-blue-700">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }} </strong>
                    {{-- Pays: {{ $job['salary']}} $ per year. --}}
                </div>
                </a>
        @endforeach
        {{ $jobs->links() }}
    <div>
</x-layout>
    
