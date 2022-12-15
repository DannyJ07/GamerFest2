<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipopg;

class Tipopgs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipopgs.view', [
            'tipopgs' => Tipopg::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
        ]);

        Tipopg::create([ 
			'tipo' => $this-> tipo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tipopg Successfully created.');
    }

    public function edit($id)
    {
        $record = Tipopg::findOrFail($id);

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
			$record = Tipopg::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tipopg Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tipopg::where('id', $id);
            $record->delete();
        }
    }
}
