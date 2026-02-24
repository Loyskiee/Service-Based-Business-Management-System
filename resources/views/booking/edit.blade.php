<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Edit Booking for {{ $booking->customer->name }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Booking') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Booking Information</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Update the status for <strong>{{ $booking->customer->name }}'s</strong> 
                        <strong>{{ $booking->service->service_name }}</strong>.
                    </p>
                </header>

                <form action="{{ route('bookings.update', $booking) }}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">Scheduled Time:</span>
                            <p class="text-gray-200">{{ $booking->scheduled_at }}</p>
                        </div>
                    </div>

                    <div>
                 <x-input-label for="status" :value="__('Status')" />

    <select  name="status" id="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @foreach (\App\Enums\BookingStatus::cases() as $status)
            <option 
                value="{{ $status->value }}"
                {{ old('status', $booking->status?->value) === $status->value ? 'selected' : '' }}
            >
                {{ $status->label() }}
            </option>
        @endforeach
    </select>

    <x-input-error class="mt-2" :messages="$errors->get('status')" />
</div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
                        <a href="{{ route('bookings.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-red-500/20">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Delete Booking</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Once this booking is deleted, all of its data will be permanently removed.
                </p>

                <form method="post" action="{{ route('bookings.destroy', $booking->id) }}" class="mt-6">
                    @csrf
                    @method('delete')

                    <x-danger-button onclick="return confirm('Are you sure you want to delete this booking?')">
                        {{ __('Delete Booking') }}
                    </x-danger-button>
                </form>
            </div>
        </div>
        
    </div>
</div>
</x-app-layout>
</body>
</html>