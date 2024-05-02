<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrito
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="m-10 rounded-xl bg-gray-200 shadow-xl">
                    @foreach ($carts as $cart)
                        <h1>{{ $cart->product_id }}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
