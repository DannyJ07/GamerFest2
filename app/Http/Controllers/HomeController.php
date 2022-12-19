<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Game;
use App\Models\Inscriptionsin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show theÑ application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $num_participantes=Participant::all()->count();
        //dd($num_participantes);
        //dd($this->get_participants_by_game());
        $data=$this->get_participants_by_game();
        return view('home', ['num_participantes'=>$num_participantes], $data);

    }

    public function get_participants_by_game(){;
        $juegos=Game::all();
        $data=[];
        $dt = [];
        foreach($juegos as $juego){
            $data['label'][] = $juego->nombre;
            $data['data'][] = Inscriptionsin::all()->where('id_juego',$juego->id)->count();
        }
        $dt['data']=json_encode($data);
        return $dt;
    }



}
