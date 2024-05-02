<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->product_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-10 rounded-xl flex-wrap bg-gray-200 ">
                    <img class="w-80 rounded-l-xl " src="{{ $product->img }}" alt="">
                    <div class="ml-10 flex flex-col">
                        <label class="font-bold text-3xl mt-5">{{ $product->product_name }}</label>

                        <p class="mt-5 text-sm font-medium">
                            Descripción
                        </p>

                        <div class="bg-white rounded-md text-center text-sm w-20">
                            {{ $product->color }}
                        </div>

                        <div class="mt-auto mb-5">
                            <p class="text-xl font-medium text-gray-900">
                                {{ "MXN $" . number_format($product->price) }}
                            </p>

                            <div class="flex items-center mb-5">
                                <p class="text-sm mr-2">Cantidad</p>
                                <div class="relative">
                                    <button class=" rounded-xl px-2 " onclick="decrementarCantidad()">-</button>
                                    
                                    <input class="h-8 w-20 pl-8 border-none rounded-lg" type="number" min="0"
                                        value="0" id="cantidad">

                                    <button onclick="incrementarCantidad()">+</button>

                                </div>
                            </div>

                            <script>
                                function incrementarCantidad() {
                                    var input = document.getElementById('cantidad');
                                    input.stepUp();
                                }

                                function decrementarCantidad() {
                                    var input = document.getElementById('cantidad');
                                    input.stepDown();
                                }
                            </script>

                            <x-primary-button>
                                Agregar al carrito
                            </x-primary-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
