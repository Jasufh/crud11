<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-5">
                                <x-input-text title="Nombre de producto" name="product_name" />
                                @error('product_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <x-input-text title="Color" name="color" />
                                @error('color')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <x-input-text title="Precio" name="price" />
                                @error('price')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-60 mb-5">
                                <label for="category_id"
                                    class="block mb-2  font-medium text-gray-900 dark:text-white">Categoría</label>
                                <select id="category_id" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected>Elige la categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-5">
                                <label for="img">Imagen</label>
                                <input class="bg-gray-100 rounded-xl p-1.5" type="file" name="img" id="img"
                                    accept="image/*">
                                @error('img')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <button type="submit" class="bg-green-600 rounded-xl px-2 py-1 text-white">Agregar</button>
                            <a href="{{ route('product.index') }}"
                                class="bg-gray-500 rounded-xl px-2 py-1.5 text-white">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
