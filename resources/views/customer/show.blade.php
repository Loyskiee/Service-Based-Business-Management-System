<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <nav class="text-sm font-medium text-gray-500 mb-4">
                <a href="{{ route('customers.index') }}" class="hover:text-indigo-600">Customer:</a> 
                <span class="text-gray-900 dark:text-gray-100">{{ $customer->name }}</span>
            </nav>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Contact Info</p>
                    <p class="text-sm text-gray-500">{{ $customer->contact ?? 'No Phone' }}</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Visits</p>
                    <p class="text-3xl font-black text-indigo-600 mt-1">{{ $bookings->count() }}</p>
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <div class="px-8 py-6 border-b border-gray-100">
                    <h3 class="text-xl font-black text-gray-800 dark:text-gray-100">Booking History</h3>
                </div>

                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest bg-gray-50/50">
                            <th class="px-8 py-4">Service</th>
                            <th class="px-8 py-4">Date & Time</th>
                            <th class="px-8 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-8 py-5 text-sm font-bold text-gray-900 dark:text-gray-100">
                                {{ $booking->service->service_name }}
                            </td>
                            <td class="px-8 py-5 text-sm text-gray-600">
                                {{ $booking->scheduled_at->format('M d, Y') }}
                                <span class="block text-[10px] text-gray-400">{{ $booking->scheduled_at->format('g:i A') }}</span>
                            </td>
                           <td class="px-8 py-5 text-right">
                            <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter
                                @switch($booking->status)
                                    @case('pending')
                                        bg-amber-100 text-amber-700
                                        @break
                                    @case('completed')
                                    @case('confirmed')
                                        bg-emerald-100 text-emerald-700
                                        @break
                                    @case('cancelled')
                                        bg-red-100 text-red-700
                                        @break
                                    @default
                                        bg-gray-100 text-gray-700
                                @endswitch">
                                {{ $booking->status }}
                            </span>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-gray-500 italic">No bookings found for this customer.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>