<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 px-4 sm:px-0">
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Account Details</h2>
                <p class="text-sm text-gray-500 font-medium">Register a new staff</p>
            </div>

            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100 p-8">
                <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-y-6">
                        <div>
                            <label for="name" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="e.g., Sean Carlo Morano" 
                                class="block w-full rounded-2xl border-none bg-gray-50/50 px-6 py-4 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all">
                        </div>

                        <div>
                            <label for="email" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="name@example.com" 
                                class="block w-full rounded-2xl border-none bg-gray-50/50 px-6 py-4 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all">
                        </div>

                        <div>
                            <label for="password" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" 
                                class="block w-full rounded-2xl border-none bg-gray-50/50 px-6 py-4 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all">
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-50">
                        <a href="{{ route('dashboard') }}" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-indigo-600 px-8 py-3 rounded-2xl shadow-lg shadow-indigo-100 text-white text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition active:scale-95">
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>