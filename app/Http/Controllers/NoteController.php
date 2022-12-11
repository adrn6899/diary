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
}
