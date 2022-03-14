<x-layout >
    <section class="px-6 pt-6">
        <h1 class="text-center">Welcome to your dashboard, <strong>{{ Auth()->user()->name }}</strong></h1>
        <main class="max-w-4xl mx-auto mt-10 space-y-6 border ">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-4">
                <div class="col-span-3 py-2">
                    <x-account.displayImage :height="160" :width="160"/>
                </div>
                <div class="col-span-9 space-y-2 m-4 left-0">
                    <p> Name: {{ Auth()->user()->name }}</p>
                    <p> Username: {{ Auth()->user()->username }}</p>
                    <p> Email: {{ Auth()->user()->email }}</p>
                </div>
            </article>
            <x-account.posts posts={{$posts}} />
        </main>
    </section>
</x-layout>
