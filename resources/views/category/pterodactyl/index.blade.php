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
                    <div class="p-6 text-gray-900 dark:text-gray-100 space-y-5">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Config
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($server) > 0)
                                        @foreach ($server['data'] as $item)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4">
                                                    {{ $item['attributes']['name'] }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $item['attributes'] == false ? "false" : "true" }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('admin.pterodactyl.show',$item['attributes']['id']) }}">Show</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if ($server['data'] === 0)
                                    <tr>
                                        <td class="py-3 text-center" colspan="3">Data not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
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
