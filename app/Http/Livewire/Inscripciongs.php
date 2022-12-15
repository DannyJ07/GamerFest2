<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripciong;

class Inscripciongs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $total, $id_juego, $id_equipo, $id_pago, $doc_pago;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripciongs.view', [
            'inscripciongs' => Inscripciong::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->orWhere('id_juego', 'LIKE', $keyWord)
						->orWhere('id_equipo', 'LIKE', $keyWord)
						->orWhere('id_pago', 'LIKE', $keyWord)
						->orWhere('doc_pago', 'LIKE', $keyWord)
						->paginate(10),
        ]);
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
		$this->id_equipo = null;
		$this->id_pago = null;
		$this->doc_pago = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'total' => 'required',
		'id_juego' => 'required',
		'id_equipo' => 'required',
		'id_pago' => 'required',
        ]);

        Inscripciong::create([ 
			'fecha' => $this-> fecha,
			'total' => $this-> total,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo,
			'id_pago' => $this-> id_pago,
			'doc_pago' => $this-> doc_pago
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Inscripciong Successfully created.');
    }

    public function edit($id)
    {
        $record = Inscripciong::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->total = $record-> total;
		$this->id_juego = $record-> id_juego;
		$this->id_equipo = $record-> id_equipo;
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
		'id_equipo' => 'required',
		'id_pago' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Inscripciong::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'total' => $this-> total,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo,
			'id_pago' => $this-> id_pago,
			'doc_pago' => $this-> doc_pago
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Inscripciong Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Inscripciong::where('id', $id);
            $record->delete();
        }
    }
}
