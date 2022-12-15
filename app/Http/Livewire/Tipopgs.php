<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipopg;

class Tipopgs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $doc_pago, $total, $id_inscripcion_inds, $id_inscripcion_grups;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipopgs.view', [
            'tipopgs' => Tipopg::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('doc_pago', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->orWhere('id_inscripcion_inds', 'LIKE', $keyWord)
						->orWhere('id_inscripcion_grups', 'LIKE', $keyWord)
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
		$this->doc_pago = null;
		$this->total = null;
		$this->id_inscripcion_inds = null;
		$this->id_inscripcion_grups = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'doc_pago' => 'required',
		'total' => 'required',
		'id_inscripcion_inds' => 'required',
		'id_inscripcion_grups' => 'required',
        ]);

        Tipopg::create([ 
			'tipo' => $this-> tipo,
			'doc_pago' => $this-> doc_pago,
			'total' => $this-> total,
			'id_inscripcion_inds' => $this-> id_inscripcion_inds,
			'id_inscripcion_grups' => $this-> id_inscripcion_grups
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
		$this->doc_pago = $record-> doc_pago;
		$this->total = $record-> total;
		$this->id_inscripcion_inds = $record-> id_inscripcion_inds;
		$this->id_inscripcion_grups = $record-> id_inscripcion_grups;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'doc_pago' => 'required',
		'total' => 'required',
		'id_inscripcion_inds' => 'required',
		'id_inscripcion_grups' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tipopg::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'doc_pago' => $this-> doc_pago,
			'total' => $this-> total,
			'id_inscripcion_inds' => $this-> id_inscripcion_inds,
			'id_inscripcion_grups' => $this-> id_inscripcion_grups
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
