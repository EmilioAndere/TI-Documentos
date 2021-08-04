<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->email != 'martin.juarez@adlerpelzer.com')
                {{ __('Documentos') }}
            @else
                {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('create')}}" method="POST">
                        @csrf
                        <div>
                            <x-label :value="__('Nombre Documento')" />
            
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Link')" />
            
                            <x-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Agregar Documento') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>