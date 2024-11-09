<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="form-payment">
                        <div class="mb-4">
                            <label for="firstName"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Firstname</label>
                            <input type="text" id="firstName" name="firstName" placeholder="Enter your firstname"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="lastName"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Lastname</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Enter your lastname"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ Auth::user()->email }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="phoneNumber"
                                class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Phone</label>
                            <input type="text" id="phoneNumber" name="phone" placeholder="+62811111"
                                class="shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-700 text-white leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                            <a href="{{ route('user.product') }}"
                                class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

<script type="text/javascript">
    document.querySelector('#form-payment').onsubmit = function(e) {
        e.preventDefault()
        const formData = new FormData(e.target)
        fetch('/get-snap-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    firstName: formData.get('firstName'),
                    lastName: formData.get('lastName'),
                    email:formData.get('email'),
                    phone:formData.get('phone'),
                    amount:{{ $product->price }},
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    snap.pay(data.snap_token,{
                        onSuccess:(result) => {
                            
                        },
                        onPending:(result) => {
                            console.log(result)
                        },
                        onError:(result) => {
                            console.log(result)
                        }
                    })
                } else {
                    alert('Error getting Snap token');
                }
            });
    };
</script>
