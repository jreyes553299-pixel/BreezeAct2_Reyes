<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Inventory Management System</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('products.index') }}" class="block p-6 bg-blue-50 hover:bg-blue-100 rounded-lg shadow border border-blue-200">
                            <h4 class="font-bold text-xl text-blue-800">Products</h4>
                            <p class="mt-2 text-blue-600">Manage your product inventory</p>
                        </a>
                        <a href="{{ route('suppliers.index') }}" class="block p-6 bg-green-50 hover:bg-green-100 rounded-lg shadow border border-green-200">
                            <h4 class="font-bold text-xl text-green-800">Suppliers</h4>
                            <p class="mt-2 text-green-600">Manage product suppliers</p>
                        </a>
                        <a href="{{ route('stocks.index') }}" class="block p-6 bg-purple-50 hover:bg-purple-100 rounded-lg shadow border border-purple-200">
                            <h4 class="font-bold text-xl text-purple-800">Stock Transactions</h4>
                            <p class="mt-2 text-purple-600">Record stock in and out</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
