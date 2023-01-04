<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Game;
use App\Models\Inscriptionsin;
use App\Models\Juego;
use App\Models\Modo;
use App\Models\Inscripciong;
use App\Models\Inscripcioni;

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
        //dd($this->getStats());
        //dd($this->getInsPorJuego());
        //dd($num_participantes);
        //dd($this->get_participants_by_game());
        //$data=$this->get_participants_by_game();
        //dd();
        //dd($this->getPorcentajeCategoria());
        $data1 = $this->getInsPorJuego();
        $data2 = $this->getInsGrPorJuego();
        return view('dashboard', ['stats'=> $this->getStats(), 'data1'=>$data1, 'data2'=>$data2]);

    }

    public function getStats(){;
        $stats = [
            'num_juegos'        => Juego::all()->count(),
            'num_participantes' => Participante::all()->count(),
            'num_ins_ind'       => Inscripcioni::all()->count(),
            'num_ins_gru'       => Inscripciong::all()->count()
        ];
        return $stats;
    }

    public function getInsPorJuego(){

        $juegos = Juego::all()->where('id_modo',1);
        $data = [];
        foreach( $juegos as $juego){
            $data['label'][] = $juego->nombre;
            $data['data'][] = Inscripcioni::all()->where('id_juego',$juego->id)->count();
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getInsGrPorJuego(){

        $juegos = Juego::all()->where('id_modo',2);
        $data = [];
        foreach( $juegos as $juego){
            $data['label'][] = $juego->nombre;
            $data['data'][] = Inscripciong::all()->where('id_juego',$juego->id)->count();
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getPorcentajeCategoria(){
        $categorias = Categoria::all();
        $data = [];
        foreach( $categorias as $categoria){
            $data['label'][] = $categoria->tipo;
            $juegos_cat = $this->getJuegosByCat($categoria->id);
            $tot_ins = 0;
            foreach($juegos_cat as $juego){
                $tot_ins += Inscripcioni::all()->where('id_juego',$juego['id'])->count();
                $tot_ins += Inscripciong::all()->where('id_juego',$juego['id'])->count();
            }
            $data['data'][] = $tot_ins;
        }
        return $data;
    }

    public function getJuegosByCat(int $id_cat){
        return Juego::all()->where('id_categoria', $id_cat)->toArray();
    }

    public function getInsByModo(){

    }


}
