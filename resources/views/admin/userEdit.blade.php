<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="" action="{{ route('admin.user.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter user name" value="{{ $user->name }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- email field --}}
                        <div class="mb-4">
                            <label for="email"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter user email" value="{{ $user->email }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Category Select Field -->
                        <div class="mb-4">
                            <label for="id_category"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Category</label>
                            <select id="id_category" name="level" value="{{ $user->level }}"
                                class="block dark:text-gray-700 text-white appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select Category</option>
                                <option @if($user->level === 'admin') selected @endif value="admin">Admin</option>
                                <option @if($user->level === 'user') selected @endif value="user">User</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                            <a href="{{ route('admin.user') }}"
                                class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
