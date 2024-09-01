<x-layout>
    <x-slot:heading>Jobs page</x-slot:heading>
    <div class="space-y-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong class="text-laracasts">{{ $job['title'] }}</strong> : pays {{ $job['salary'] }}
                </div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
            <!-- pagination links are formatted with preformatted defaults from different css engines => to customize it, publish the vendor assets (php artisan vendor:publish) and modify the blade file in resources/views/vendor/pagination/xxxxxx.blade.php with xxxx converted to the selected css engine-->
        </div>
    </div>
    </x-layout>
