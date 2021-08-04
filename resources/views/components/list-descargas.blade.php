<div>
    <ul>
        @foreach($descargas as $items)
            @foreach($items as $doc)
                <li>{{$doc->email}} - Documento: {{$doc->name_doc}}</li>
            @endforeach
                <br>
        @endforeach
    </ul>
</div>
