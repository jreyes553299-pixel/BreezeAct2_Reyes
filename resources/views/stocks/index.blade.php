<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Stock Transactions') }}
            </h2>
            <a href="{{ route('stocks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Record Transaction
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
                                <th class="border-b px-4 py-2">Date</th>
                                <th class="border-b px-4 py-2">Product</th>
                                <th class="border-b px-4 py-2">Type</th>
                                <th class="border-b px-4 py-2">Quantity</th>
                                <th class="border-b px-4 py-2">Remarks</th>
                                <th class="border-b px-4 py-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td class="border-b px-4 py-2">{{ $stock->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="border-b px-4 py-2">{{ $stock->product ? $stock->product->name : 'N/A' }}</td>
                                    <td class="border-b px-4 py-2">
                                        @if($stock->type == 'in')
                                            <span class="text-green-600 font-bold uppercase text-sm">IN</span>
                                        @else
                                            <span class="text-red-600 font-bold uppercase text-sm">OUT</span>
                                        @endif
                                    </td>
                                    <td class="border-b px-4 py-2">{{ $stock->quantity }}</td>
                                    <td class="border-b px-4 py-2">{{ $stock->remarks }}</td>
                                    <td class="border-b px-4 py-2 text-right">
                                        <form action="{{ route('stocks.destroy', $stock) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($stocks->isEmpty())
                                <tr>
                                    <td colspan="6" class="border-b px-4 py-2 text-center text-gray-500">No stock transactions found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
