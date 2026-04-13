<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <table class="w-full text-left table-auto border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-2">Name</th>
                                <th class="border-b px-4 py-2">SKU</th>
                                <th class="border-b px-4 py-2">Price</th>
                                <th class="border-b px-4 py-2">Supplier</th>
                                <th class="border-b px-4 py-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border-b px-4 py-2">{{ $product->name }}</td>
                                    <td class="border-b px-4 py-2">{{ $product->sku }}</td>
                                    <td class="border-b px-4 py-2">${{ number_format($product->price, 2) }}</td>
                                    <td class="border-b px-4 py-2">{{ $product->supplier ? $product->supplier->name : 'N/A' }}</td>
                                    <td class="border-b px-4 py-2 text-right">
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($products->isEmpty())
                                <tr>
                                    <td colspan="5" class="border-b px-4 py-2 text-center text-gray-500">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
