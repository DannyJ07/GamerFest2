<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripciong;

class Inscripciongs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $id_juego, $id_equipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripciongs.view', [
            'inscripciongs' => Inscripciong::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('id_juego', 'LIKE', $keyWord)
						->orWhere('id_equipo', 'LIKE', $keyWord)
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
		$this->id_equipo = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'id_juego' => 'required',
		'id_equipo' => 'required',
        ]);

        Inscripciong::create([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo
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
			$record = Inscripciong::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'id_juego' => $this-> id_juego,
			'id_equipo' => $this-> id_equipo
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
