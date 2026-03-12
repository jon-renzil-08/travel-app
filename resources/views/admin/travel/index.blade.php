<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Travel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end mb-4">
                        @if (auth()->user()->role->value === 'admin')
                            <a href="{{ route('travel.create') }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                <p>Tambah Travel</p>
                            </a>
                        @endif
                    </div>
                    <div class="overflow-x-auto">
                        @php
                            $no = 1;
                        @endphp
                        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tujuan</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tanggal</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Waktu</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Kuota</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Harga</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                                </tr>
                            </thead>
                            @foreach ($travels as $travel)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="my-2">
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $no++ }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $travel->destination }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $travel->departure_date }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $travel->departure_time }} WIB
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $travel->passenger_quota }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            Rp {{ number_format($travel->ticket_price, 0, ',', '.') }}
                                        </td>
                                        <td class="space-x-2">

                                            @if (auth()->user()->role->value === 'admin')
                                                <a href="{{ route('travel.edit', $travel) }}"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-3 py-1 rounded">
                                                    Edit
                                                </a>

                                                <form action="{{ route('travel.destroy', $travel) }}" method="POST"
                                                    class="inline-block"
                                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus travel ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold px-3 py-1 rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('bookings.create', $travel->id) }}"
                                                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-3 py-1 rounded">
                                                    Book
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
