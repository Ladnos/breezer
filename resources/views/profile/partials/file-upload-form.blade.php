<section>


    <form method="post" action="{{ route('file.upload') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        @if(session('status'))            
            <x-success-alert> {{ __(session('status')) }} </x-success-alert>
        @endif

        <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        
        <div>
            <h2 class="block font-medium text-lg text-gray-700'">О себе</h2>
            <textarea id="message" rows="4" name="about" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="///" >{{Auth::user()->about ? Auth::user()->about:old('about')}}</textarea>
        </div>


        <div class="py-2">
            <x-input-label for="telephone" :value="__('Номер телефона')" />
            <x-text-input id="telephone" name="telephone" type="tel" class="mt-1 block w-full" />
        </div>
        <div class="mt-1">
            {{-- <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " name="file[]" id="multiple_files" type="file" multiple> --}}
        
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Кликните для выбора файлов</span> или перетащите</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400"></p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" multiple name="file[]"/>
                </label>
            </div> 

        </div>
        <div class="flex items-center gap-4">


        </div>
        <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

    </form>
</section>
