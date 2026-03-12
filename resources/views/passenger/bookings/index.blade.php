<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg overflow-hidden">

                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-700">
                        My Travel Bookings
                    </h1>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Destination
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Quantity
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Payment Status
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $booking->travelSchedule->destination }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $booking->travelSchedule->departure_date }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $booking->ticket_quantity }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    @if($booking->payment_status->value == 'paid')
                                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                            Paid
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                            Pending
                                        </span>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
