<div class="flex justify-center">
    <div class="mb-6 w-2/3">
    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">{{$title}}</label>
    <div class="rounded-lg bg-gray-200 hover:bg-white border-4 hover:border-blue">
        <div class="px-4">
            <div class="flex items-center justify-center w-full py-4">
                <label x-data="{ files: null }" class="flex flex-col w-full h-32 border-4 border-dashed border-gray-400 hover:bg-white hover:border-white">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="file" name="{{ $name }}" class="opacity-0" x-on:change="files = Object.values($event.target.files)"/>
                    <div class="flex items-center justify-center pb-4">
                        <span class='pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600' x-text="files ? files.map(file => file.name).join(', ') : 'Select an Image'"></span>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>
</div>