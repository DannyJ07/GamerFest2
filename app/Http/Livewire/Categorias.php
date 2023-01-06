<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.categorias.view', [
            'categorias' => Categoria::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function index()
    {
        return Categoria::all();
    }
	
    public function listarCategorias(Categorias $categoria)
    {
        return $categoria;
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

        Categoria::create([ 
			'tipo' => $this-> tipo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Categoria Successfully created.');
    }

    public function edit($id)
    {
        $record = Categoria::findOrFail($id);

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
			$record = Categoria::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Categoria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Categoria::where('id', $id);
            $record->delete();
        }
    }
    public function tendencias($id)
    {
        $record = Categoria::findOrFail($id);
        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
        if ($this->tipo=="Aventura"){
            $mensaje=("Los juegos mas populares de aventura son: GOW Ragnarok, Grounded, Spiderman PS4");
        }
        if ($this->nombre=="Deporte"){
            $mensaje=("Los juegos mas populares de deporte son: Fallguys, Forza Horizon 5, Fifa");
        }
        if ($this->nombre=="Terror"){
            $mensaje=("Los juegos mas populares de Terror son: Resident evil 8, Phasmofobia, DayZ,Dying Ligth");
        }
        isset($_GET[$mensaje]);
    }
    public function relevancia($id)
    {
        $record = Categoria::findOrFail($id);
        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
        if ($this->tipo=="Aventura"){
            $mensaje=("El genero ha sido popular desde: 1980");
        }
        if ($this->nombre=="Deporte"){
            $mensaje=("El genero ha sido popular desde: 1976");
        }
        if ($this->nombre=="Terror"){
            $mensaje=("El genero ha sido popular desde: 1984");
        }
        isset($_GET[$mensaje]);
    }
}
