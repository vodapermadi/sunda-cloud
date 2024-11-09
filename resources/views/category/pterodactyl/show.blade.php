<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Server') }}
        </h2>
    </x-slot>
    @if ($statusCode == 200 or $statusCode == 201)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    {{ dd($server) }}
                </div>
            </div>
        </div>
    @else
        <span>{{ $message }}</span>
    @endif
</x-app-layout>

@if ($statusCode === 500)
    {{ dd($error) }}
@endif
