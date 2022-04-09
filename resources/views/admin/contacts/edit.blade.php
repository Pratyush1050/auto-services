<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <form action="{{route('admin.contacts.update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-5 flex flex-col">
                            <label for="name" class="pb-2 text-lg antialiased @error('contactType')
                                text-red-500
                            @enderror">Contact Type</label>
                            <select name="contactType"  class="rounded-lg w-2/6 @error('contactType')
                            border-red-500
                            @enderror" >
                                <option value="telephone" {{old('contactType',$contact->contact_type) == "telephone" ? 'selected':''}}>Telephone</option>
                                <option value="mobile" {{old('contactType',$contact->contact_type) == "mobile" ? 'selected':''}}>Mobile</option>
                                <option value="fax" {{old('contactType',$contact->contact_type) == "fax" ? 'selected':''}}>Fax</option>
                            </select>
                            @error('contactType')
                                <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>


                        <div class="p-5 flex flex-col">
                            <label for="phone" class="pb-2 text-lg antialiased @error('phone_number')
                                text-red-500
                            @enderror">Phone Number</label>
                            <input type="text" name="phone_number" placeholder="Enter phone" class="rounded-lg w-2/6 @error('phone_number')
                                border-red-500
                            @enderror" value="{{old('phone_number',$contact->phone_number)}}">
                            @error('phone_number')
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