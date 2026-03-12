<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Travel') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-8">

                <h1 class="text-2xl font-bold text-gray-800 mb-6">
                    {{ $travel->destination }}
                </h1>

                <!-- Detail Travel -->
                <div class="border rounded-lg divide-y mb-6">

                    <div class="flex justify-between p-4">
                        <span class="text-gray-500">Destination</span>
                        <span class="font-semibold">{{ $travel->destination }}</span>
                    </div>

                    <div class="flex justify-between p-4">
                        <span class="text-gray-500">Departure Date</span>
                        <span class="font-semibold">
                            {{ \Carbon\Carbon::parse($travel->departure_date)->format('d M Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between p-4">
                        <span class="text-gray-500">Departure Time</span>
                        <span class="font-semibold">
                            {{ \Carbon\Carbon::parse($travel->departure_time)->format('h:i A') }}
                        </span>
                    </div>

                    <div class="flex justify-between p-4">
                        <span class="text-gray-500">Available Seats</span>
                        <span class="font-semibold">{{ $travel->passenger_quota }}</span>
                    </div>

                    <div class="flex justify-between p-4">
                        <span class="text-gray-500">Ticket Price</span>
                        <span class="font-bold text-green-600">
                            Rp {{ number_format($travel->ticket_price,0,',','.') }}
                        </span>
                    </div>

                </div>

                <!-- Form Booking -->
                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <input type="hidden" name="travel_schedule_id" value="{{ $travel->id }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Ticket Quantity
                        </label>

                        <input
                            type="number"
                            name="ticket_quantity"
                            min="1"
                            max="{{ $travel->passenger_quota }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter ticket quantity"
                            required
                        >
                    </div>

                    <div class="flex gap-3">

                        <a href="{{ route('travel.index') }}"
                           class="w-1/3 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 rounded-lg transition">
                            Back
                        </a>

                        <button
                            type="submit"
                            class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                            Confirm Booking
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
