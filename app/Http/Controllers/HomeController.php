<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Inscripciongs;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Game;
use App\Models\Inscriptionsin;
use App\Models\Juego;
use App\Models\Modo;
use Illuminate\Support\Arr;
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
        $data1 = $this->getInsPorJuego();
        $data2 = $this->getInsGrPorJuego();
        $data3 = $this->getPorcentajeCategoria();
        $data4 = $this->getTopJuegos();
        $data5 = $this->getPorcentajesJuegosByCat();
        $data6 = $this->getInsIndvsGru();
        return view('dashboard', [
            'stats'=> $this->getStats(), 
            'data1'=>$data1, 
            'data2'=>$data2, 
            'data3'=>$data3, 
            'data4'=>$data4, 
            'data5'=>$data5,
            'data6'=>$data6
        ]);

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
            $tot_ins_cat = 0;
            $tot_ins = Inscripcioni::all()->count()+Inscripciong::all()->count();
            foreach($juegos_cat as $juego){
                $tot_ins_cat += Inscripcioni::all()->where('id_juego',$juego['id'])->count();
                $tot_ins_cat += Inscripciong::all()->where('id_juego',$juego['id'])->count();
            }
            $data['data'][] = round(($tot_ins_cat*100)/$tot_ins,2);
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getJuegosByCat(int $id_cat){
        return Juego::all()->where('id_categoria', $id_cat)->toArray();
    }

    public function getTopJuegos(){
        $juegos = Juego::all();
        $data = [];
        foreach( $juegos as $juego){
            array_push($data,[
                'nombre' => $juego->nombre,
                'inscripciones' => Inscripciong::all()->where('id_juego',$juego->id)->count()+Inscripcioni::all()->where('id_juego',$juego->id)->count()
            ]);
        }
        //$data['data'] = array_slice(array_reverse(array_values(Arr::sort($data, function ($value){return $value['inscripciones'];}))), 0,3);
        return json_encode(collect(array_slice(array_reverse(array_values(Arr::sort($data, function ($value){return $value['inscripciones'];}))), 0,3)));
    }

    public function getPorcentajesJuegosByCat(){
        
        $categorias = Categoria::all();
        $tot_juegos = Juego::all()->count();
        $data = [];
        foreach($categorias as $categoria){
            $data['label'][] = $categoria->tipo;
            $num_juegos_cat = count($this->getJuegosByCat($categoria->id));
            $data['data'][] = round(($num_juegos_cat*100)/$tot_juegos,2);   
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getInsIndvsGru(){
        $modos = Modo::all();
        $data = [];
        foreach($modos as $modo){
            $data['label'][] = $modo->tipo;
            if($modo->tipo=="Individual"){
                $data['data'][] = Inscripcioni::all()->count();
            }
            elseif($modo->tipo=="Grupal"){
                $data['data'][] = Inscripciong::all()->count();
            }
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getEventListByDate(){
        return Juego::all()->orderBy('');
    }

}
