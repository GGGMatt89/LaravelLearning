<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year
    </p>

{{--    @can('edit-job', $job)  <!-- using Gate defined in AppServiceProvider -->--}}
    @can('edit', $job) <!-- using JobPolicy -->
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
        </p>
    @endcan
</x-layout>
