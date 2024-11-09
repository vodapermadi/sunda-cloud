<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="" action="{{ route('admin.product.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter product name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Price Field -->
                        <div class="mb-4">
                            <label for="price"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Price</label>
                            <input type="number" id="price" name="price" placeholder="Enter product price"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Description</label>
                            <textarea id="description" name="description" rows="3" placeholder="Enter product description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        {{-- Period Select field --}}
                        <div class="mb-4">
                            <label for="period"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Period</label>
                            <select id="period" name="period"
                                class="block dark:text-gray-700 text-white appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select Period</option>
                                <option value="1 bulan">1 Bulan</option>
                                <option value="6 bulan">6 Bulan</option>
                                <option value="permanent">Permanent</option>
                            </select>
                        </div>

                        <!-- Category Select Field -->
                        <div class="mb-4">
                            <label for="id_category"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Category</label>
                            <select id="id_category" name="id_category"
                                class="block dark:text-gray-700 text-white appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                            <a href="{{ route('admin.product') }}"
                                class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
