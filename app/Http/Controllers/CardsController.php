<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Card;

class CardsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['add']]);
    }

    //
    public function index(){
        $cards = Card::all();
        return view("cards.index",compact('cards'));
    }

    public function show(Card $card){
        $card->load('notes.user');
        return view('cards.show',compact('card'));
    }

    public function add(Request $request){
        $card = new Card();
        $card->title = $request->title;
        $card->save();
        return back();
    }
    public function delete(Card $card){
        $card->notes()->delete();
        $card->delete();
        return back();
    }
}
