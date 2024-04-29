<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-wrap justify-between items-center mb-10">

                        <div class="flex items-center">
                            {{-- Category --}}
                            <div class="flex w-40 mr-10">
                                <select wire:model.live="categoryFilter"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value="" selected>Select category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $categoryFilter == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- Search --}}
                            <div class="">
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input wire:model.live="search" type="search" id="default-search"
                                        class="block w-full p-4 ps-10 text-sm pr-20 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search products" required />
                                </div>
                            </div>
                        </div>
                        
                        {{-- Button agregar --}}
                        <div class="mt-2">
                            <a type="submit" href="{{ route('product.create') }}"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2">Agregar
                                Producto</a>
                        </div>

                    </div>

                    {{-- Search --}}
                    {{--      <div class="max-w-md mx-auto mb-5">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input wire:model.live="search" type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search products" required />
                        </div>
                    </div> --}}
                    {{-- Table --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Color
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" colspan="3" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product->product_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $product->color }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $product->category->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ "MXN $" . number_format($product->price) }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                                    class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                        </td>

                                        <td class="px-6 py-4">
                                            <form class="delete-form"
                                                action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                id="deleteForm{{ $product->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-button fa-solid fa-trash fa-xl"
                                                    style="color: #c63939"
                                                    onclick="confirmDelete({{ $product->id }})"></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <h1 class="text-2xl pe-3">...</h1>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        function confirmDelete(productId) {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: "Esta acción no se puede revertir. ¿Seguro que quieres eliminar este producto?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Sí, eliminarlo',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Si se confirma la eliminación, enviar el formulario
                                    document.getElementById('deleteForm' + productId).submit();
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
