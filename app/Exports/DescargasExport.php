<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class DescargasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('documents')
        ->join('document_user', 'documents.id', '=', 'document_user.document_id')
        ->join('users', 'users.id', '=', 'document_user.user_id')
        ->groupBy('document_user.document_id', 'documents.name', 'users.email')
        ->select('documents.name', 'users.email', DB::raw('count(documents.name) as total'))
        ->paginate();
    }
}
