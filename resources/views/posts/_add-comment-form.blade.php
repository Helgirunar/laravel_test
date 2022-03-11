@auth
<x-panel>
    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf
        <header class="flex item-center">
            <img src="https://i.pravatar.cc/60?u{{ auth()->id() }}" alt="" width="40" height="60" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <div class="mt-4">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="10" placeholder="Quick, think of something to say."  required></textarea>

            @error('body')
                <span class="text-xs text-red-500"> {{$message}} </span>
            @enderror
        </div>
        <div class="flex justify-end mt-4">
            <button class="bg-blue-500  text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" type="submit">Comment</button>
        </div>
    </form>
</x-panel>
@else
<p>
    <a href="/register" class="hover:underline font-semibold">Register</a> or <a href="/login" class="hover:underline font-semibold"> Login </a> to leave a comment.
</p>
@endauth
