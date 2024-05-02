<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->product_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="flex m-10 rounded-xl flex-wrap bg-gray-200 shadow-xl">
                    <img class="w-80 rounded-l-xl " src="{{ $product->img }}" alt="">
                    <div class="ml-10 flex flex-col">
                        <label class="font-bold text-3xl mt-5">{{ $product->product_name }}</label>

                        <p class="mt-5 text-sm font-medium">
                            Descripción
                        </p>

                        <div class="bg-white rounded-md text-center text-sm w-20">
                            {{ $product->color }}
                        </div>

                        <form class="mt-auto mb-5" action="{{ route('cart.store', $product->id) }}" method="POST">
                            @csrf

                            <p class="text-xl font-medium text-gray-900">
                                {{ "MXN $" . number_format($product->price) }}
                            </p>

                            <div class="flex items-center mb-5">
                                <p class="text-sm mr-2">Cantidad</p>
                                <div>
                                    <button type="button" onclick="decrementarCantidad()"><i class="fa-solid fa-square-minus fa-xl"
                                            style="color: #9f99b2;"></i></button>

                                    <input class="h-8 w-16 pl-6 border-none rounded-lg" type="number" min="0"
                                        value="0" id="cantidad" name="cantidad">

                                    <button type="button" onclick="incrementarCantidad()"><i class="fa-solid  fa-square-plus fa-xl"
                                            style="color: #9f99b2;"></i> </button>
                                </div>


                            </div>

                            <x-primary-button>
                                Agregar al carrito
                            </x-primary-button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
