<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actividade;

class Actividades extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_actividades, $nombre, $fecha, $hora, $lugar;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actividades.view', [
            'actividades' => Actividade::latest()
						->orWhere('id_actividades', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('lugar', 'LIKE', $keyWord)
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
		$this->id_actividades = null;
		$this->nombre = null;
		$this->fecha = null;
		$this->hora = null;
		$this->lugar = null;
    }

    public function store()
    {
        $this->validate([
		'id_actividades' => 'required',
		'nombre' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'lugar' => 'required',
        ]);

        Actividade::create([ 
			'id_actividades' => $this-> id_actividades,
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'lugar' => $this-> lugar
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actividade Successfully created.');
    }

    public function edit($id)
    {
        $record = Actividade::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_actividades = $record-> id_actividades;
		$this->nombre = $record-> nombre;
		$this->fecha = $record-> fecha;
		$this->hora = $record-> hora;
		$this->lugar = $record-> lugar;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_actividades' => 'required',
		'nombre' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'lugar' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actividade::find($this->selected_id);
            $record->update([ 
			'id_actividades' => $this-> id_actividades,
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'lugar' => $this-> lugar
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actividade Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actividade::where('id', $id);
            $record->delete();
        }
    }
}
