<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Travel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full text-sm text-gray-700">

                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">Destination</th>
                                <th class="px-6 py-3 text-left">Departure Date</th>
                                <th class="px-6 py-3 text-center">Quota</th>
                                <th class="px-6 py-3 text-center">Passengers</th>
                                <th class="px-6 py-3 text-left">Passenger List</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @forelse ($travels as $travel)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        {{ $travel->destination }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($travel->departure_date)->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <span class="bg-gray-100 px-2 py-1 rounded text-xs">
                                            {{ $travel->passenger_quota }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                            {{ $travel->bookings_count }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($travel->bookings as $booking)
                                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                                    {{ $booking->user->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('report.history', $travel->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                                            View History
                                        </a>
                                    </td>

                                </tr>
                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-6 text-gray-500">
                                        No travel history available.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
