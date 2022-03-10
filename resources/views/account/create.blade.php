<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 border border-gray-200 bg-gray-100 rounded-xl p-6">
            <h1 class="text-center font-bold text-2xl">Register</h1>
            <form class="mt-12" method="POST" action="/register">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Username</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        name</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="confirmpassword">
                        confirm password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="confirmpassword" id="confirmpassword" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        email</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" required>
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
