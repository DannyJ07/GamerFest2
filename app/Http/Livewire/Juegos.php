<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;
use App\Models\Categoria;
use App\Models\Modo;
use Barryvdh\DomPDF\Facade\Pdf;

class Juegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $reglas, $aula, $valor, $fecha_evento, $id_categoria, $id_modo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.juegos.view', [
			$categorias=Categoria::all(),
			$modos=Modo::all(),
            'juegos' => Juego::with('categoria')->with('modo')
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('reglas', 'LIKE', $keyWord)
						->orWhere('aula', 'LIKE', $keyWord)
						->orWhere('valor', 'LIKE', $keyWord)
						->orWhere('fecha_evento', 'LIKE', $keyWord)
						->whereHas('categoria', fn($query)=>
                        $query->where('tipo', 'LIKE', $keyWord))
						->whereHas('modo', fn($query)=>
                        $query->where('tipo', 'LIKE', $keyWord))
						->paginate(10),
        ],compact('categorias','modos'));
    }

	public function index()
    {
        return Juego::all();
    }
	
    public function listarJuegos(Juegos $juego)
    {
        return $juego;
    }

	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->reglas = null;
		$this->aula = null;
		$this->valor = null;
		$this->fecha_evento = null;
		$this->id_categoria = null;
		$this->id_modo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'reglas' => 'required',
		'aula' => 'required',
		'valor' => 'required',
		'fecha_evento' => 'required',
		'id_categoria' => 'required',
		'id_modo' => 'required',
        ]);

        Juego::create([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'fecha_evento' => $this-> fecha_evento,
			'id_categoria' => $this-> id_categoria,
			'id_modo' => $this-> id_modo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Juego Successfully created.');
    }

    public function edit($id)
    {
        $record = Juego::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->reglas = $record-> reglas;
		$this->aula = $record-> aula;
		$this->valor = $record-> valor;
		$this->fecha_evento = $record-> fecha_evento;
		$this->id_categoria = $record-> id_categoria;
		$this->id_modo = $record-> id_modo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'reglas' => 'required',
		'aula' => 'required',
		'valor' => 'required',
		'fecha_evento' => 'required',
		'id_categoria' => 'required',
		'id_modo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Juego::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'fecha_evento' => $this-> fecha_evento,
			'id_categoria' => $this-> id_categoria,
			'id_modo' => $this-> id_modo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Juego Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Juego::where('id', $id);
            $record->delete();
        }
    }

	public function reporte(){
        $juegos= Juego::all();
        return view('pdfJuego.index', compact('juegos'));
    }


    public function pdfReporte()
    {
        $juegos = Juego::all();
        $pdf = PDF::loadView('pdfJuego.download', compact('juegos'));
        return $pdf->stream();
    }


}
