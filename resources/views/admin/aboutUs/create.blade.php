<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <form action="{{route('admin.about-us.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-5 flex flex-col">
                            <label for="description" class="pb-2 text-lg antialiased @error('description')
                                text-red-500
                            @enderror">Description</label>
                            <textarea name="description" cols="30" rows="10" placeholder="Enter Description" class="rounded-lg w-4/6 @error('description')
                                border-red-500
                            @enderror">{{old('description')}}</textarea>
                            @error('description')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="p-5 flex flex-col">
                            <label for="image" class="pb-2 text-lg antialiased @error('image')
                                text-red-500
                            @enderror">Image</label>
                            <input type="file" name="image">
                            @error('image')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="p-5">
                            <button class="px-3 py-1 rounded-lg bg-blue-400 border-2  text-white hover:bg-white hover:text-blue-400  hover:border-blue-400">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>