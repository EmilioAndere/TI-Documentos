<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    public function index(){
        $email = Auth::user()->email;
        if($email == 'emilio.andere.l@gmail.com'){
            $collections = download::all()->groupBy('email');
            //return $collections;
        }else{
            $collections = Document::all();
        }
        return view('dashboard', compact('collections'));
    }

    public function download(Request $req){
        $user = $req->user;
        $doc = $req->doc;
        $access = $req->access;

        $download = new download();

        $download->email = $user;
        $download->name_doc = $doc;

        $download->save();

        return redirect($access);
    }
}
