<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;

class Juegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $reglas, $aula, $valor, $id_categoria;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.juegos.view', [
            'juegos' => Juego::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('reglas', 'LIKE', $keyWord)
						->orWhere('aula', 'LIKE', $keyWord)
						->orWhere('valor', 'LIKE', $keyWord)
						->orWhere('id_categoria', 'LIKE', $keyWord)
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
		$this->reglas = null;
		$this->aula = null;
		$this->valor = null;
		$this->id_categoria = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'reglas' => 'required',
		'aula' => 'required',
		'valor' => 'required',
		'id_categoria' => 'required',
        ]);

        Juego::create([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'id_categoria' => $this-> id_categoria
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Juego Successfully created.');
    }

    public function edit($id)
    {
        $record = Juego::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->reglas = $record-> reglas;
		$this->aula = $record-> aula;
		$this->valor = $record-> valor;
		$this->id_categoria = $record-> id_categoria;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'reglas' => 'required',
		'aula' => 'required',
		'valor' => 'required',
		'id_categoria' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Juego::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'id_categoria' => $this-> id_categoria
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Juego Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Juego::where('id', $id);
            $record->delete();
        }
    }
}