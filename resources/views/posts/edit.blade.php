<x-layout>
    <section class="px-6 py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Edit post: {{ $post->title}}
        </h1>
        <x-panel class="max-w-sm mx-auto">
            <form method='POST' action='/admin/posts/{{$post->id}}' enctype='multipart/form-data'>
                @csrf
                @method('PATCH')
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for='title'>title</label>
                    <input class='border border-gray-400 p-2 w-full' type='text' name='title' id='title' value="{{ $post->title }}" require>
                    @error('title')
                        <p class='text-red-500 text-xs mt-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">Category</label>
                    <select name="category_id"  id="category_id" class="border w-full border border-gray-400 p-2" value="{{ old('category') }}">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }} </option>
                        @endforeach
                    </select>
                </div>
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for='thumbnail'>Thumbnail</label>
                    <input class='border border-gray-400 p-2 w-full' type='file' name='thumbnail' id='thumbnail' value="{{ old('thumbnail', $post->thumbnail) }}">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                    @error('thumbnail')
                        <p class='text-red-500 text-xs mt-2'>{{ $message }} </p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for='slug'>slug</label>
                    <input class='border border-gray-400 p-2 w-full' type='text' name='slug' id='slug' value="{{ $post->slug }}" require>
                    @error('slug')
                        <p class='text-red-500 text-xs mt-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for='excerpt'>excerpt</label>
                    <textarea class='border border-gray-400 p-2 w-full' type='text' name='excerpt' id='excerpt' require>{{ $post->excerpt }}</textarea>
                    @error('excerpt')
                        <p class='text-red-500 text-xs mt-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for='body'>body</label>
                    <textarea class='border border-gray-400 p-2 w-full' type='text' name='body' id='body' require>{{ $post->body }}</textarea>
                    @error('body')
                        <p class='text-red-500 text-xs mt-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Publish
                    </button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
