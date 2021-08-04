<div>
    <ul>
        @forelse($documentos as $doc)
            <li class="flex mt-5">
                <span class="mr-5">{{$doc->name}}</span>
                <form class="ml-5" action="{{ route('descarga',$doc->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="access" value="{{$doc->link}}">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </button>
                </form>
            </li>
        @empty
            <h2>No hay documentos guardados</h2>
        @endforelse
    </ul>
</div>
