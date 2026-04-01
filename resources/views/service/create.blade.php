<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service Creation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Create New Service</h2>
                <p class="text-sm text-gray-500 font-medium">Define a new offering for your customers.</p>
            </div>

            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100 p-8">
                <form action="{{ route('services.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">
                      <div class="sm:col-span-6">
                       <label for="service_name" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Service Name</label>
                        <input type="text" name="service_name" id="service_name" placeholder="e.g., Premium Haircut" 
                          class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 px-6 py-4 text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 transition-all border-none shadow-sm">
                        </div>

                        <div class="sm:col-span-6">
                            <label for="price" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Price (₱)</label>
                            <input type="number" name="price" id="price" min="100" step="0.01" placeholder="e.g., 150.00"
                                class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 px-6 py-4 text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 transition-all border-none shadow-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-50">
                        <a href="{{ route('services.index') }}" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-indigo-600 px-8 py-3 rounded-2xl shadow-lg shadow-indigo-100 text-white text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition active:scale-95">
                            Save Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
