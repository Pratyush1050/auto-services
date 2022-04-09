<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <form action="{{route('admin.contact-us.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-5 flex flex-col">
                            <label for="name" class="pb-2 text-lg antialiased @error('name')
                                text-red-500
                            @enderror">Name</label>
                            <input type="text" name="name" placeholder="Enter Name" class="rounded-lg w-2/6 @error('name')
                                border-red-500
                            @enderror" value="{{old('name')}}">
                            @error('name')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="p-5 flex flex-col">
                            <label for="email" class="pb-2 text-lg antialiased @error('email')
                                text-red-500
                            @enderror">Email</label>
                            <input type="text" name="email" placeholder="Enter email" class="rounded-lg w-2/6 @error('email')
                                border-red-500
                            @enderror" value="{{old('email')}}">
                            @error('email')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="p-5 flex flex-col">
                            <label for="phone" class="pb-2 text-lg antialiased @error('phone')
                                text-red-500
                            @enderror">Phone</label>
                            <input type="text" name="phone" placeholder="Enter phone" class="rounded-lg w-2/6 @error('phone')
                                border-red-500
                            @enderror" value="{{old('phone')}}">
                            @error('phone')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>


                        <div class="p-5 flex flex-col">
                            <label for="message" class="pb-2 text-lg antialiased @error('message')
                                text-red-500
                            @enderror">Message</label>
                            <textarea name="message" cols="30" rows="10" placeholder="Enter message" class="rounded-lg w-4/6 @error('message')
                                border-red-500
                            @enderror">{{old('message')}}</textarea>
                            @error('message')
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