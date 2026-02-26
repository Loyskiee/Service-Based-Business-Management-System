<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service List</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
    <div class="py-12 bg-[#fcfcfd] dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">Services</h2>
                    <p class="text-sm text-gray-500 font-medium">Manage your business offerings and pricing</p>
                </div>
                <a href="{{ route('services.create') }}" class="bg-indigo-600 px-6 py-3 rounded-2xl shadow-lg shadow-indigo-100 text-white text-sm font-black uppercase tracking-widest hover:bg-indigo-700 transition">
                    + Add New Service
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] bg-gray-50/50 border-b border-gray-50">
                            <th class="px-8 py-5">Service Name</th>
                            <th class="px-8 py-5">Base Price</th>
                            <th class="px-8 py-5">Duration</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($services as $service)
                        <tr class="hover:bg-indigo-50/20 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="font-black text-gray-900 dark:text-white group-hover:text-indigo-600 transition-colors">
                                    {{ $service->service_name }}
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-lg font-black text-emerald-600">
                                    ₱{{ number_format($service->price, 2) }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('services.edit', $service) }}" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-indigo-600 transition">Edit</a>
                                    <button class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-red-600 transition">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
</body>
</html>
