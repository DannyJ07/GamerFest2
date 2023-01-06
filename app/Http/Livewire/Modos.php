<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Modo;

class Modos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.modos.view', [
            'modos' => Modo::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    
    public function index()
    {
        return Modo::all();
    }
	
    public function listarModos(Modos $modo)
    {
        return $modo;
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->tipo = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
        ]);

        Modo::create([ 
			'tipo' => $this-> tipo
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
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Modo::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo
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
