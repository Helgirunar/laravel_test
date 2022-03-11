@if (session()->has('message'))
    <div  x-data="{show: true}" x-init="setTimeout(() => show =false, 4000)" x-show="show" class="fixed bottom-3 right-3 bg-green-500 text-white py-2 px-4 text-sm rounded-xl">
        <p>{{ session('message') }}</p>
    </div>
@endif

@if (session()->has('error'))
    <div  x-data="{show: true}" x-init="setTimeout(() => show =false, 4000)" x-show="show" class="fixed bottom-3 right-3 bg-red-500 text-white py-2 px-4 text-sm rounded-xl">
        <p>{{ session('error') }}</p>
    </div>
@endif
