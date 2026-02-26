<x-app-layout>
    <div class="py-12 bg-[#f9fafb] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Total Bookings</p>
                    <p class="text-3xl font-black text-indigo-600 mt-1">{{ $totalBookings }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Pendings</p>
                    <p class="text-3xl font-black text-amber-500 mt-1">{{ $pendingBookings }}</p>
                </div>

                <a href="{{ route('bookings.create') }}" class="bg-indigo-600 p-6 rounded-2xl shadow-lg text-white flex justify-between items-center hover:bg-indigo-700 transition duration-300">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest opacity-70">Quick Action</p>
                        <p class="text-lg font-bold">New Booking</p>
                    </div>
                    <span class="text-2xl font-light">+</span>
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <div class="px-8 py-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
                    <h3 class="text-xl font-black text-gray-800 tracking-tight">Upcoming Schedule</h3>
                </div>

                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="px-8 py-4">Customer</th>
                            <th class="px-8 py-4">Service</th>
                            <th class="px-8 py-4">Schedule</th>
                            <th class="px-8 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($upcomingBookings as $booking)
                        <tr class="hover:bg-indigo-50/20 transition-colors">
                            <td class="px-8 py-5 font-bold text-gray-900">{{ $booking->customer->name }}</td>
                            <td class="px-8 py-5 text-sm text-gray-600">{{ $booking->service->service_name }}</td>
                            <td class="px-8 py-5 text-sm font-medium text-gray-500">
                             {{ $booking->scheduled_at->format('M d, Y · g:i A') }}
                            </td>
                            <td class="px-8 py-5 text-right">
                                <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase {{ $booking->status == 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">
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