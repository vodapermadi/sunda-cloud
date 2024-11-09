<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-5">
                    @if (Auth::user()->level === 'admin')
                        <a href="{{ route('admin.category.create') }}"
                            class="py-2 px-5 bg-blue-800 hover:shadow-md hover:shadow-blue-300 duration-200 hover:scale-110 font-bold rounded">Create</a>
                    @endif
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
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $category->config == false ? "false" : "true" }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $category->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                @if ($categories === 0)
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
</x-app-layout>
