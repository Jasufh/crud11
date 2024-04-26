<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name"
                                value="{{ $product->product_name }}">
                            @error('product_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="color">Color</label>
                            <input type="text" name="color" id="color" value="{{ $product->color }}">
                            @error('color')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-60">
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category_id" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div>
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ $product->price }}">
                            @error('price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="img">Image</label>
                            <input wire:model.live="imgView" type="file" name="img" id="img" accept="image/*">
                            @if ($imgView)
                                <img src="{{ $imgView->temporaryUrl() }}" alt="">
                            @endif
                            
                            @error('img')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 rounded-xl px-2 py-1 text-white">Actualizar</button>
                        <a href="{{ route('product.index') }}"
                            class="bg-gray-500 rounded-xl px-2 py-1.5 text-white">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
