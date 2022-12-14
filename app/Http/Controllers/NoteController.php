<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        return view('notes.index');
    }

    public function fetch(){
        $note = Note::all();

        return response()->json($note);
    }

    public function getNote(Request $request){
        // dd($request->all());
        $id = $request->id;
        $note = Note::where('id',1)->get();

        // dd($note);
        return response()->json($note);
    }
}
