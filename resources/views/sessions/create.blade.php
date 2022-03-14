<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 border border-gray-200 bg-gray-100 rounded-xl p-6">
            <h1 class="text-center font-bold text-2xl">login</h1>
            <form class="mt-12" method="POST" action="/login">
                @csrf
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
{{--
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
--}}
            </form>
        </main>
    </section>
</x-layout>
