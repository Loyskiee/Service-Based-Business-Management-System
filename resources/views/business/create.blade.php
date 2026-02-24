<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Business Name</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-app-layout>
      
<form action="{{ route('business.store') }}" method="POST"> 
@csrf
  <div class="border-b border-white/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      <div class="sm:col-span-3">
        <label for="name" class="block text-sm/6 font-medium text-white">Business Name</label>
        <div class="mt-2">
          <input id="name" type="text" name="name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="address" class="block text-sm/6 font-medium text-white">Address</label>
        <div class="mt-2">
          <input id="address" type="text" name="address" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

      <div class="sm:col-span-4">
        <label for="contact" class="block text-sm/6 font-medium text-white">Contact Number</label>
        <div class="mt-2">
          <input id="contact" type="tel" name="contact" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" maxlength="11" required class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>



<div class="mt-12 flex items-center justify-end gap-x-6">
  <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
  <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
</div>
</form>

</x-app-layout>
</body>
</html>