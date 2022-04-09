<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Table Start --}}
                    <section class="container mx-auto p-6 font-mono">
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                          <div class="w-full ">
                            <table class="w-full">
                              <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                  <th class="px-2 py-3">Image</th>
                                  <th class="px-4 py-3">Description</th>
                                  <th class="px-4 py-3">Status</th>
                                </tr>
                              </thead>
                              <tbody class="bg-white">
                                  @forelse ($aboutUs as $about)
                                  <tr class="text-gray-700">
                                    <td class="px-2 py-3 border">
                                      <div class="flex items-center text-sm">
                                        <div class="relative w-1/2 h-1/2 mr-3  md:block">
                                          <img class="object-cover w-full h-full " src="{{asset('storage/aboutUs/'.$about->image)}}" alt="" loading="lazy" />
                                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="py-3 text-ms font-semibold border">{{$about->description}}</td>
                                    <td class="mx-4 py-3 text-xs border">
                                        <a href="{{route('admin.about-us.edit',$about->id)}}" class="pl-3">
                                            <i class="far fa-edit fa-2x text-green-500 hover:text-green-600"></i>
                                        </a>
                                        <form action="{{route('admin.about-us.destroy',$about->id)}}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button>
                                                <i class="ml-2 far fa-2x fa-trash-alt text-red-500 hover:text-red-600"></i>
                                            </button>
                                        </form>
                                    </td> 
                                  </tr>
                                  @empty
                                  <td class="text-gray-700  text-center p-6" colspan="3">
                                        No About Us Found!
                                  </td>
                                  @endforelse
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </section>
                    {{-- Table End --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>