<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripcioni;
use App\Models\Juego;
use App\Models\Participante;
use App\Models\Tipopg;

class Inscripcionis extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $total, $id_juego, $id_participantes, $id_pago, $doc_pago;
    public $updateMode = false;
    public $selectedJuego = null, $selectedParticipante = null, $selectedTipoPagos = null;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripcionis.view', [
            $juegos=Juego::all(),
            $participantes=Participante::all(),
            $tipopgs=Tipopg::all(),
            'inscripcionis' => Inscripcioni::with('juego')->with('participante')->with('tipopg')
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->whereHas('juego', fn($query)=>
                        $query->where('nombre', 'LIKE', $keyWord))
						->whereHas('participante', fn($query)=>
                        $query->where('nombre','LIKE',$keyWord))
						->whereHas('tipopg', fn($query)=>
                        $query->where('tipo','LIKE',$keyWord))
						->orWhere('doc_pago', 'LIKE', $keyWord)
						->paginate(10),
       ],compact('juegos','participantes','tipopgs'));
    }
	
   
    public function index()
    {
        return Inscripcioni::all();
    }
	
    public function listarInscripcionis(Inscripcionis $inscripcioni)
    {
        return $inscripcioni;
    }


    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->total = null;
		$this->id_juego = null;
		$this->id_participantes = null;
		$this->id_pago = null;
		$this->doc_pago = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'total' => 'required',
		'id_juego' => 'required',
		'id_participantes' => 'required',
		'id_pago' => 'required',
        ]);

        Inscripcioni::create([ 
			'fecha' => $this-> fecha,
			'total' => $this-> total,
			'id_juego' => $this-> id_juego,
			'id_participantes' => $this-> id_participantes,
			'id_pago' => $this-> id_pago,
			'doc_pago' => $this-> doc_pago
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Inscripcioni Successfully created.');
    }

    public function edit($id)
    {
        $record = Inscripcioni::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->total = $record-> total;
		$this->id_juego = $record-> id_juego;
		$this->id_participantes = $record-> id_participantes;
		$this->id_pago = $record-> id_pago;
		$this->doc_pago = $record-> doc_pago;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'total' => 'required',
		'id_juego' => 'required',
		'id_participantes' => 'required',
		'id_pago' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Inscripcioni::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'total' => $this-> total,
			'id_juego' => $this-> id_juego,
			'id_participantes' => $this-> id_participantes,
			'id_pago' => $this-> id_pago,
			'doc_pago' => $this-> doc_pago
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Inscripcioni Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Inscripcioni::where('id', $id);
            $record->delete();
        }
    }
    
}
