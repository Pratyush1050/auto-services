<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us View') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <div class="p-5 flex flex-col">
                            <label for="name" class="pb-2 text-lg antialiased">Name</label>
                            <p class="text-gray-500 text-lg">
                                {{$contact->name}}
                            </p>
                        </div>

                        <div class="p-5 flex flex-col">
                            <label for="email" class="pb-2 text-lg antialiased">Email</label>
                            <p class="text-gray-500 text-lg">
                                {{$contact->email}}
                            </p>
                        </div>

                        <div class="p-5 flex flex-col">
                            <label for="phone" class="pb-2 text-lg antialiased">Phone</label>
                            <p class="text-gray-500 text-lg">
                                {{$contact->phoneNo}}
                            </p>
                        </div>


                        <div class="p-5 flex flex-col">
                            <label for="message" class="pb-2 text-lg antialiased">Message</label>
                            <p class="text-gray-500 text-lg">
                                {{$contact->message}}
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>