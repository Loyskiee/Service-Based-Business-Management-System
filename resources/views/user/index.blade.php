<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">List of Staffs</h2>
            </div>

            <div class="grid grid-cols-1 gap-4">
                @foreach ($staffs as $staff)
                <div class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all flex items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="h-12 w-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 font-black text-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            {{ $staff->name }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
