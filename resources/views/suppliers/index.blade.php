<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Suppliers') }}
            </h2>
            <a href="{{ route('suppliers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Supplier
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
                                <th class="border-b px-4 py-2">Contact Person</th>
                                <th class="border-b px-4 py-2">Email</th>
                                <th class="border-b px-4 py-2">Phone</th>
                                <th class="border-b px-4 py-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td class="border-b px-4 py-2">{{ $supplier->name }}</td>
                                    <td class="border-b px-4 py-2">{{ $supplier->contact_person }}</td>
                                    <td class="border-b px-4 py-2">{{ $supplier->email }}</td>
                                    <td class="border-b px-4 py-2">{{ $supplier->phone }}</td>
                                    <td class="border-b px-4 py-2 text-right">
                                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($suppliers->isEmpty())
                                <tr>
                                    <td colspan="5" class="border-b px-4 py-2 text-center text-gray-500">No suppliers found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
