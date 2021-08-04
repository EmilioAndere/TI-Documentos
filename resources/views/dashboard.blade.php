<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->email != 'emilio.andere.l@gmail.com')
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
                    @if(Auth::user()->email == "emilio.andere.l@gmail.com")
                        <x-list-descargas :descargas="$collections"></x-list-descargas>
                    @else
                        <x-list-documents :documentos="$collections"></x-list-documents>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
