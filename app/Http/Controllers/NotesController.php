<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function store(Request $request,Card $card){
        $this->validate($request,[
           'body' => 'required|min:5'
        ]);

        $note = new Note($request->all());

        //this should be $note->Auth::id();
        $note->user_id = \Auth::id();
        $card->notes()->save($note);
        return back();
        /* Another approach to this is to create function addNote in card model
         * so we do:
         * $card->addNotes($note); */
    }


    public function edit(Note $note){
        return view("notes.edit",compact('note'));
    }

    public function update(Request $request, Note $note){
        $note->update($request->all());
        return back();
    }

    public function delete(Note $note){
        $note->delete();
        return back();
    }

}

