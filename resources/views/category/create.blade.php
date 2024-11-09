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
                    <form class="" action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- Name Field -->
                        <div class="mb-4">
                          <label for="name" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Name</label>
                          <input type="text" id="name" name="name" placeholder="Enter Category name"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                      
                        <!-- Submit Button -->
                        <div class="mb-4">
                          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                          <a href="{{ route('admin.category') }}" class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>