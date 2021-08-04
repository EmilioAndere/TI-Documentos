<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\download;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    public function index(){
        $email = Auth::user()->email;
        if($email == 'martin.juarez@adlerpelzer.com'){
            $collections = DB::table('documents')
                ->join('document_user', 'documents.id', '=', 'document_user.document_id')
                ->join('users', 'users.id', '=', 'document_user.user_id')
                ->groupBy('document_user.document_id', 'documents.name', 'users.email')
                ->select('documents.name', 'users.email')
                ->get();
                // return $collections;
            $docs = Document::all();
        }else{
            $collections = Document::all();
            $docs = null;
        }
        return view('dashboard', compact('collections', 'docs'));
    }

    public function download(Request $req){
        $user = $req->id;
        $access = $req->access;

        $download = Document::find($user);

        $download->users()->attach($req->user);

        // return $req->user;

        return redirect($access);
    }

    public function store(Request $req){
        $doc = new Document();

        $doc->name = $req->name;
        $doc->link = $req->link;

        $doc->save();

        return redirect()->route('dashboard');
    }

    public function destroy($id){
        DB::delete('delete from document_user where document_id = ?', [$id]);
        DB::select('SET FOREIGN_KEY_CHECKS=0');
        $doc = new Document();
        $doc->destroy($id);

        return redirect()->route('dashboard');
    }
}
