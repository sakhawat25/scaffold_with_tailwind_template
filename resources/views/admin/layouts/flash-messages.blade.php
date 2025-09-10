@if (session()->has('error'))
    <div class="bg-red-500 px-4 py-3 text-white">{{ session('error') }}</div>
@endif

@if (session()->has('success'))
    <div class="bg-green-500 px-4 py-3 text-white">{{ session('success') }}</div>
@endif
