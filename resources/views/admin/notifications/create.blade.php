<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification Image Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <form action="{{route('admin.notifications.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div  class="p-5 flex-col">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">                
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select name="notificationType"id="notificationType"  class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option selected disabled>Select Notification Type</option>
                                        <option value="banner" {{old('notificationType') == "banner" ? 'selected':''}}>Banner</option>
                                        <option value="notification" {{old('notificationType') == "notification" ? 'selected':''}}> Notification </option>
                                    </select>
                                </div>
                            </div>
                                <div class="flex flex-col" id="title" style="display: none">
                                    <label for="name" class="py-2 text-lg antialiased @error('title')
                                        text-red-500
                                    @enderror">Title</label>
                                    <input type="text" name="title" placeholder="Enter Name" class="rounded-lg w-2/6 @error('title')
                                        border-red-500
                                    @enderror" value="{{old('title')}}">
                                    @error('title')
                                        <div class="text-red-500 pt-2 border-b-2 border-red-500 w-max">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="flex flex-col" id="description" style="display: none">
                                    <label for="description" class="py-2 text-lg antialiased @error('description')
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
                        </div>
                        <div class="p-5 flex flex-col">
                            <label for="image" class="pb-2 text-lg antialiased @error('image')
                                text-red-500
                            @enderror">Notification Image</label>
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
<script>
 document.getElementById('notificationType').addEventListener("change", function (e) {
    if (e.target.value === 'notification') {
        document.getElementById('title').style.display = 'flex';
        document.getElementById('description').style.display = 'flex';
    } else {
        document.getElementById('title').style.display = 'none';
        document.getElementById('description').style.display = 'none';
    }
});

var selectOption = document.getElementById('notificationType').value;

if(selectOption === 'notification'){
    document.getElementById('title').style.display = 'flex';
    document.getElementById('description').style.display = 'flex';
}
else{
        document.getElementById('title').style.display = 'none';
        document.getElementById('description').style.display = 'none';
}
</script>