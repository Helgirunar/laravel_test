<x-layout>
    <section class="px-6 py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="max-w-sm mx-auto">
            <form method='POST' action='\admin\posts' enctype='multipart/form-data'>
                @csrf
                <x-form.input name="title" type="text"/>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">Category</label>
                    <select name="category_id"  id="category_id" class="border w-full border border-gray-400 p-2" value="{{ old('category') }}">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }} </option>
                        @endforeach
                    </select>
                </div>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.input name="slug" type="text"/>
                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Publish
                    </button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
