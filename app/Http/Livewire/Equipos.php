<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $enjuego;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.view', [
            'equipos' => Equipo::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('enjuego', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->enjuego = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'enjuego' => 'required',
        ]);

        Equipo::create([ 
			'nombre' => $this-> nombre,
			'enjuego' => $this-> enjuego
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Equipo Successfully created.');
    }

    public function edit($id)
    {
        $record = Equipo::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->enjuego = $record-> enjuego;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'enjuego' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Equipo::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'enjuego' => $this-> enjuego
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Equipo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Equipo::where('id', $id);
            $record->delete();
        }
    }
}
