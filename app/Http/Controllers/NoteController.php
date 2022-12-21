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
        $note = Note::orderBy('id',"DESC")->get();

        return response()->json($note);
    }

    public function getNote(Request $request){
        // dd($request->all());
        $id = $request->id;
        $note = Note::where('id',$id)->get();

        // dd($note);
        return response()->json($note);
    }

    public function edit(Request $request){
        // dd($request->all());
        $note = Note::findOrFail($request->id);
        if($note){
            $note->title = $request->title;
            $note->content = $request->content;
            $note->save();
            return response()->json("success");
        } else {
            return response()->json("error");
        }
    }
}
