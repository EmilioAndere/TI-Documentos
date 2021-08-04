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

    <div class="pt-12 pb-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::user()->email == "martin.juarez@adlerpelzer.com")
                        <h2 class="font-bold text-lg">Archivos Descargados</h2><br>
                        <x-list-descargas :descargas="$collections"></x-list-descargas>
                    @else
                        <x-list-documents :documentos="$collections"></x-list-documents>    
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->email == "martin.juarez@adlerpelzer.com")
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-bold text-lg">Tus Documentos</h2><br>
                        <ul>
                            @if ($docs != null)
                                @forelse ($docs as $doc)
                                    <li class="flex items-center">
                                        {{$doc->name}}
                                        <form action="{{ route('cursos.destroy', $doc->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="ml-3 text-white bg-red-500 px-3 py-2 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <h2>Sin documentos regitrado</h2>
                                @endforelse    
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
