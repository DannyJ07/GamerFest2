<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InscripcionGrup;
use App\Models\Juego;
use App\Models\Equipo;
use App\Models\Tipopg;

class InscripcionGrups extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $id_juego, $id_equipo;
    public $updateMode = false;
    public $selectedJuego = null, $selectedEquipo = null, $selectedTipoPagos = null;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripcionGrups.view', [
            'inscripcionGrups' => InscripcionGrup::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('id_juego', 'LIKE', $keyWord)
						->orWhere('id_equipo', 'LIKE', $keyWord)
						->paginate(10),
                        'id_juego'=>Juego::all(),
                        'id_equipo'=>Equipo::all(),
                        'id_pago'=>Tipopg::all()]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->id_juego = null;
		$this->id_equipo = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'id_juego' => 'required',
		'id_equipo' => 'required',
        ]);

        InscripcionGrup::create([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'InscripcionGrup Successfully created.');
    }

    public function edit($id)
    {
        $record = InscripcionGrup::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->id_juego = $record-> id_juego;
		$this->id_equipo = $record-> id_equipo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'id_juego' => 'required',
		'id_equipo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InscripcionGrup::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'InscripcionGrup Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = InscripcionGrup::where('id', $id);
            $record->delete();
        }
    }
}
