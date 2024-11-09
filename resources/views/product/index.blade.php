{{-- {{ dd($products) }} --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-5">
                    @if (Auth::user()->level === 'admin')
                        <a href="{{ route('admin.product.create') }}"
                            class="py-2 px-5 bg-blue-800 hover:shadow-md hover:shadow-blue-300 duration-200 hover:scale-110 font-bold rounded">Create</a>
                    @endif
                    <div class="w-full grid grid-cols-3 gap-3">
                        @if (count($products) == 0)
                            <div class="w-full text-center col-span-3">
                                <span>Product not found</span>
                            </div>
                        @else
                            @foreach ($products as $row)
                                <div
                                    class="w-full border border-gray-500 rounded-lg shadow-lg shadow-gray-400 p-3 flex flex-col">
                                    <span class="text-2xl font-bold capitalize text-center">{{ $row->name }}</span>
                                    <span class="font-bold text-xl text-center">Rp
                                        {{ number_format($row->price, 0, ',', '.') }}</span>
                                    <div class="my-5 space-x-2">
                                        {{-- fitur admin --}}
                                        @if (Auth::user()->level === 'admin')
                                            <a class="py-2 px-4 bg-yellow-800 font-bold rounded"
                                                href="{{ route('admin.product.edit', $row->id) }}">Edit</a>
                                            <a class="py-2 px-4 bg-red-800 font-bold rounded"
                                                href="{{ route('admin.product.edit', $row->id) }}">Delete</a>
                                        @endif

                                        {{-- fitur user --}}
                                        @if (Auth::user()->level === 'user')
                                            <div class="w-full text-center">
                                                <button
                                                    onclick="window.location.href = '{{ route('transaction', $row->id) }}' "
                                                    class="w-[calc(100%-10px)] border border-gray-600 hover:scale-105 hover:shadow hover:shadow-green-600 duration-200 font-bold text-green-500 py-2 rounded">Order
                                                    Now</button>
                                            </div>
                                        @endif
                                    </div>
                                    <hr class="border-t-[1px] w-full mb-4">
                                    @foreach ($categories as $category)
                                        @if ($category['id'] == $row->id_category)
                                            <span
                                                class="font-bold text-xl capitalize text-yellow-400">{{ $category['name'] }}</span>
                                        @endif
                                    @endforeach
                                    @php
                                        $content = preg_replace_callback(
                                            '/<list>(.*?)<\/list>/s',
                                            function ($matches) {
                                                $items = preg_split("/[\n,]+/", trim($matches[1]));
                                                $htmlList = '<div class="px-1"><ul class="list-inside">';
                                                foreach ($items as $item) {
                                                    $htmlList .=
                                                        '<li class="flex items-center gap-2 text-lg font-semibold capitalize">' .
                                                        '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 32 27"><path fill="#73ff00" d="M26.99 0L10.13 17.17l-5.44-5.54L0 16.41L10.4 27l4.65-4.73l.04.04L32 5.1z"/></svg>' .
                                                        trim($item) .
                                                        '</li>';
                                                }
                                                $htmlList .= '</ul></div>';

                                                return $htmlList;
                                            },
                                            $row->description,
                                        );
                                    @endphp
                                    {!! $content !!}
                                    <hr class="border-t-[1px] w-full my-4">
                                    <span class="w-full text-center font-semibold text-xl">{{ $row->period }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
