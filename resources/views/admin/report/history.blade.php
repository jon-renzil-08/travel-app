<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Passenger History - {{ $travels->destination }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Travel Information -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Travel Information</h3>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Destination</span>
                        <p class="font-semibold">{{ $travels->destination }}</p>
                    </div>

                    <div>
                        <span class="text-gray-500">Departure Date</span>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($travels->departure_date)->format('d M Y') }}
                        </p>
                    </div>

                    <div>
                        <span class="text-gray-500">Departure Time</span>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($travels->departure_time)->format('h:i A') }}
                        </p>
                    </div>

                    <div>
                        <span class="text-gray-500">Total Quota</span>
                        <p class="font-semibold">{{ $travels->passenger_quota }}</p>
                    </div>
                </div>
            </div>

            <!-- Passenger Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">

                <div class="p-4 border-b">
                    <h3 class="font-semibold text-gray-700">Passenger List</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-700">

                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">Passenger Name</th>
                                <th class="px-6 py-3 text-center">Tickets</th>
                                <th class="px-6 py-3 text-center">Payment Status</th>
                                <th class="px-6 py-3 text-center">Booking Date</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @forelse ($travels->bookings as $booking)
                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4 font-medium">
                                        {{ $booking->user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        {{ $booking->ticket_quantity }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        @if ($booking->payment_status->value === 'paid')
                                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                                Paid
                                            </span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
                                                Pending
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        {{ $booking->created_at->format('d M Y') }}
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">
                                        No passenger bookings yet.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>

                <!-- Summary -->
                <div class="p-4 border-t bg-gray-50 flex justify-between text-sm">

                    <div>
                        <span class="text-gray-500">Total Passengers:</span>
                        <span class="font-semibold">
                            {{ $travels->bookings->sum('ticket_quantity') }}
                        </span>
                    </div>

                    <a href="{{ route('report.passenger') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 rounded text-sm">
                        Back
                    </a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
