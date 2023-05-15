<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="flex flex-col ">
                          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                              <div class="overflow-hidden">
                                <table class="min-w-full text-center text-sm font-light">
                                  <thead
                                    class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                    <tr>
                                      <th scope="col" class=" px-6 py-4">#</th>
                                      <th scope="col" class=" px-6 py-4">Имя</th>
                                      <th scope="col" class=" px-6 py-4">Телефон</th>
                                      <th scope="col" class=" px-6 py-4">Файлы</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($users as $user)
                                    <tr class="border-b dark:border-neutral-500">
                                      <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $user->id }}</td>
                                      <td class="whitespace-nowrap  px-6 py-4">{{ $user->name }}</td>
                                      <td class="whitespace-nowrap  px-6 py-4">{{ $user->telephone }}</td>
                                      <td class="whitespace-nowrap  px-6 py-4 flex flex-col text-left">
                                        @foreach (explode('!!',$user->files) as $path)
                                        <a
                                        href={{$user->id.'/'.$path}}
                                        class="underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit"
                                        >{{$path}}</a
                                      >
                                        @endforeach
                                      </td>
                                    </tr>
                                    @endforeach
                      
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
