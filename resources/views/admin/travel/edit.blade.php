<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Travel') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-5">
                    <h2 class="text-2xl font-semibold mb-4">Tambah Travel</h2>

                    <form action="{{ route('travel.update', $travel) }}" method="POST" class="space-y-4">
                        @method('PUT')
                        @csrf

                        <div>
                            <label for="destination" class="block text-sm font-medium text-gray-700">Tujuan</label>
                            <input type="text" name="destination" id="destination" value="{{ $travel->destination }}"aceholder="Masukkan Tujuan"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div>
                            <label for="departure_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="departure_date" id="departure_date" value="{{ $travel->departure_date }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div>
                            <label for="departure_time" class="block text-sm font-medium text-gray-700">Waktu</label>
                            <input type="time" name="departure_time" id="departure_time" value="{{ $travel->departure_time }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div>
                            <label for="passenger_quota" class="block text-sm font-medium text-gray-700">Kuota</label>
                            <input type="number" name="passenger_quota" id="passenger_quota" value="{{ $travel->passenger_quota }}"
                                placeholder="Masukkan Kuota"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div>
                            <label for="ticket_price" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="ticket_price" id="ticket_price" value="{{ $travel->ticket_price }}" placeholder="Masukkan Harga"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div class="flex justify-end gap-3">
                            <a href="{{ route('travel.index') }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
                                Kembali
                            </a>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
