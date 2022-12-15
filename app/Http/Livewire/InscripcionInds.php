<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InscripcionInd;

class InscripcionInds extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $id_juego, $id_participantes;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripcionInds.view', [
            'inscripcionInds' => InscripcionInd::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('id_juego', 'LIKE', $keyWord)
						->orWhere('id_participantes', 'LIKE', $keyWord)
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
		$this->id_juego = null;
		$this->id_participantes = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'id_juego' => 'required',
		'id_participantes' => 'required',
        ]);

        InscripcionInd::create([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_participantes' => $this-> id_participantes
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'InscripcionInd Successfully created.');
    }

    public function edit($id)
    {
        $record = InscripcionInd::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->id_juego = $record-> id_juego;
		$this->id_participantes = $record-> id_participantes;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'id_juego' => 'required',
		'id_participantes' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InscripcionInd::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_participantes' => $this-> id_participantes
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'InscripcionInd Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = InscripcionInd::where('id', $id);
            $record->delete();
        }
    }
}
