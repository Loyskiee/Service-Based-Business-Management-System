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
     <form action="{{ route('services.store') }}" method="POST"> 
  @csrf
    <div class="border-b border-white/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="service_name" class="block text-sm/6 font-medium text-white">Service Name</label>
          <div class="mt-2">
            <input id="service_name" type="text" name="service_name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="contact" class="block text-sm/6 font-medium text-white">Price</label>
          <div class="mt-2">
            <input id="price" type="number " name="price" min="100" max="300" required class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

    <div class="mt-12 flex items-center justify-end gap-x-6">
    <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-white">Cancel</a>
    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
  </div>
</form>
    </x-app-layout>
</body>
</html>
