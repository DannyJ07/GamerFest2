<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Modo;

class Modos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $id_juego;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.modos.view', [
            'modos' => Modo::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('id_juego', 'LIKE', $keyWord)
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
		$this->tipo = null;
		$this->id_juego = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'id_juego' => 'required',
        ]);

        Modo::create([ 
			'tipo' => $this-> tipo,
			'id_juego' => $this-> id_juego
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Modo Successfully created.');
    }

    public function edit($id)
    {
        $record = Modo::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->id_juego = $record-> id_juego;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'id_juego' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Modo::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'id_juego' => $this-> id_juego
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Modo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Modo::where('id', $id);
            $record->delete();
        }
    }
}
