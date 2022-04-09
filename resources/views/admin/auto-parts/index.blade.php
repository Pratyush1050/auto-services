<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auto Parts Image Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-3 gap-4">
                @forelse ($images as $image)
                {{-- Card --}}
                <div class=" rounded overflow-hidden border w-full h-5/6 bg-white">
                    <img class="w-full h-5/6 bg-contain" src="{{asset('storage/auto-parts/'. $image->image)}}">
                    <div class="px-3">
                      <div class="pt-2 text-center">
                          <form action="{{route('admin.auto-parts.update',$image->id)}}" class="inline" method="POST">
                            @csrf
                            @method('PUT')
                            <button>
                                @if ($image->status == "show")
                                    <i class="far fa-lg fa-eye text-green-500"></i>
                                @else
                                    <i class="far fa-lg fa-eye-slash text-yellow-700"></i>
                                @endif
                                </button>
                            </form>

                            <form action="{{route('admin.auto-parts.destroy',$image->id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <i class="ml-2 far fa-trash-alt text-red-500"></i>
                                </button>
                            </form>
                      </div>
                    </div>
                  </div>
                  {{-- End Card --}}
                  @empty
                    <div class="p-6 bg-white ">
                        No Auto Parts Images Found!
                    </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>