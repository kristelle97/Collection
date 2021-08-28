<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collection Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('collection.store')}}" enctype="multipart/form-data" method="POST" class="w-full max-w-s bg-white pt-6 rounded">
                    @csrf
                    <!-- Collection Name -->
                        <x-forms.form-group name="title" label="Title" id="collection-id" placeholder="Collection Title">
                          @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </x-forms.form-group>

                        <!-- Collection Description -->
                        <x-forms.form-group name="description" label="Description" id="collection-description" placeholder="Collection Description" size="h-24">
                          @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </x-forms.form-group>

                        <div class="md:flex md:justify-center mb-6">
                            <input type="file" name="collection-image" required>
                        </div>

                        <!-- Add Collection Button -->
                        <x-forms.submit-button>Create Collection</x-forms.submit-button>

                    </form>

                    @if (count($collections) > 0)
                    <div class="flex justify-center md:justify-start flex-wrap mb-6">
                        @foreach ($collections as $collection)

                            @if ($collection->user_id == Auth::user()->id)
                              <div class=" w-full lg:max-w-full flex flex-wrap content-start shadow-lg rounded">
                                <div class="w-48 h-48">
                                   <img src="{{asset($collection->file_path)}}" class="object-cover h-48 w-full"></img>
                                </div>
                                  <div class="p-5 flex-grow w-full sm:w-auto">
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{$collection->title}}</div>
                                    <p class="text-gray-700 text-base">{{$collection->description}}</p>
                                    <div class="flex flex-row">
                                    <i class="fas fa-user-tie mt-4"></i>
                                    <div class="text-sm mt-4">
                                      <p class="text-gray-900 leading-none">{{$collection->user->name}}</p>
                                      <p class="text-gray-600">{{$collection->created_at}}</p>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="flex w-full sm:flex-col sm:w-12 mt-3 justify-end items-center">
                                    <x-forms.delete-button :action="route('collection.destroy',['collectionId'=>$collection->id])"><i class="far fa-trash-alt"></i></x-forms.delete-button>
                                    <a href="{{route('collection.edit', $collection->id)}}" class="bg-transparent text-gray-400 font-semibold hover:text-blue-800 py-2 px-2"><i class="far fa-edit"></i></a>
                                    <a href="{{route('collection.item.index', $collection->id)}}" class="bg-transparent text-gray-400 font-semibold hover:text-blue-800 py-2 px-2"><i class="fas fa-expand"></i></a>
                                  </div>
                                </div>
                                @endif


                        @endforeach

                    @endif
                </div>
                {{ $collections->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>