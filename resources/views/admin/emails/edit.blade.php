<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <form action="{{route('admin.emails.update',$email->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="p-5 flex flex-col">
                            <label for="name" class="pb-2 text-lg antialiased @error('type')
                                text-red-500
                            @enderror">Email Type</label>
                            <select name="type"  class="rounded-lg w-2/6 @error('type')
                            border-red-500
                            @enderror" >
                                <option selected disabled>Select Email Type</option>
                                <option value="to" {{old('type',$email->type) == "to" ? 'selected':''}}>To</option>
                                <option value="cc" {{old('type',$email->type) == "cc" ? 'selected':''}}>CC</option>
                                <option value="bcc" {{old('type',$email->type) == "bcc" ? 'selected':''}}>BCC</option>
                            </select>
                            @error('type')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>


                        <div class="p-5 flex flex-col">
                            <label for="phone" class="pb-2 text-lg antialiased @error('email')
                                text-red-500
                            @enderror">Email</label>
                            <input type="email" name="email" placeholder="Enter email" class="rounded-lg w-2/6 @error('email')
                                border-red-500
                            @enderror" value="{{old('email',$email->email)}}">
                            @error('email')
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