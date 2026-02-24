<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Bookings</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
   <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Bookings') }}
            </h2>
            <a href="{{ route('bookings.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Create Booking
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($bookings as $booking)
                            <li class="py-4 flex justify-between items-center">
                                <div>
                                    <a href="{{ route('bookings.edit', $booking->id) }}" class="text-lg font-medium text-indigo-600 dark:text-indigo-400 hover:underline">
                                        {{ $booking->customer->name }}
                                    </a>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Service: {{ $booking->service->service_name }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                                        {{ $booking->status }}
                                    </span>
                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ $booking->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 text-center text-gray-500">No bookings found.</li>
                        @endforelse
                    </ul>
                    @if ($bookings->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $bookings->onEachSide(2)->links() }}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
