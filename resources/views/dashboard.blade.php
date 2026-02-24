<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-3xl font-black text-indigo-600 mt-1">{{ $totalBookings }}</p>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Bookings</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-3xl font-black text-amber-500 mt-1">{{ $pendingBookings}}</p>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Pending Bookings</p>
                </div>

                <a href="{{ route('bookings.create') }}" class="group bg-indigo-600 p-6 rounded-2xl shadow-lg text-white flex justify-between items-center hover:bg-indigo-700 transition">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest opacity-80">Quick Action</p>
                        <p class="text-lg font-bold mt-1">Create Booking</p>
                    </div>
                    <div class="h-10 w-10 bg-white/20 rounded-full flex items-center justify-center text-xl group-hover:scale-110 transition">+</div>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-xl font-black text-gray-800 dark:text-gray-100 tracking-tight">Upcoming Schedule</h3>
                </div>

                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] bg-gray-50/50">
                            <th class="px-8 py-4">Customer</th>
                            <th class="px-8 py-4">Service</th>
                            <th class="px-8 py-4">Schedule</th>
                            <th class="px-8 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($upcomingBookings as $booking)
                        <tr class="hover:bg-indigo-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="font-bold text-gray-900 dark:text-gray-100">{{ $booking->customer->name }}</div>
                            </td>
                            <td class="px-8 py-5 text-sm text-gray-600 dark:text-gray-400">
                                {{ $booking->service->service_name }}
                            </td>
                            <td class="px-8 py-5 text-sm">
                                <div class="font-bold text-gray-700 dark:text-gray-300">{{ $booking->scheduled_at->format('M d, Y') }}</div>
                                <div class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $booking->scheduled_at->format('g:i A') }}</div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase
                                    {{ $booking->status == 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>