<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('customers.store') }}" method="POST" class="max-w-xl space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Customer Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="contact" :value="__('Contact Number')" />
                        <x-text-input id="contact" name="contact" type="tel" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" maxlength="11" class="mt-1 block w-full" required />
                        <p class="mt-1 text-xs text-gray-500 italic">Format: 11 digits (e.g., 09123456789)</p>
                        <x-input-error class="mt-2" :messages="$errors->get('contact')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>
                            {{ __('Save Customer') }}
                        </x-primary-button>

                        <a href="{{ route('customers.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>