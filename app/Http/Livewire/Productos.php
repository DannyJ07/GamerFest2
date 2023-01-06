<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_producto, $nombre, $descripcion, $valor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::latest()
						->orWhere('id_producto', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('valor', 'LIKE', $keyWord)
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
		$this->id_producto = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->valor = null;
    }

    public function store()
    {
        $this->validate([
		'id_producto' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'valor' => 'required',
        ]);

        Producto::create([ 
			'id_producto' => $this-> id_producto,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'valor' => $this-> valor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_producto = $record-> id_producto;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->valor = $record-> valor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_producto' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'valor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([ 
			'id_producto' => $this-> id_producto,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'valor' => $this-> valor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Producto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::where('id', $id);
            $record->delete();
        }
    }
}
