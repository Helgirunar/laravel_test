<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex item-center">
        @guest
            <a href="/register" class="ml-4 mt-2 text-sm font-bold uppercase">Register</a>
            <a href="/login" class="ml-4 mt-2 text-sm font-bold uppercase">Login</a>
        @endguest
        @auth
        <a href="/admin/dashboard">
            <x-account.displayImage :height="60" :width="60"/>
        </a>
        <x-dropdown>
            <x-slot name="trigger">
                <div class="flex">
                    <button class="ml-4 mt-2 text-sm ml-4 font-bold uppercase">{{ Auth()->user()->username }}</button>
                </div>
            </x-slot>
            <x-dropdown-item href="/admin/dashboard"> Dashboard</x-dropdown-item>
            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')"> New Post</x-dropdown-item>
        </x-dropdown>
            <form method="post" action="/logout">
                @csrf

                <button type="submit"><p class="ml-4 mt-2 text-sm ml-4 font-bold uppercase">Log Out</p></button>
            </form>

            @endauth

        <a href="/#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
