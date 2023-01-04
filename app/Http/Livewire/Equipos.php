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
	
    public function index()
    {
        return Equipo::all();
    }

    public function listarEquipo(Equipos $equipo)
    {
        return $equipo;
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

    public function enpie(Request $request, $id)
    {
        $record = Equipo::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->enjuego = $record-> enjuego;
        if($this->enjuego=="Si")
        {
            session()->flash('message', 'El equipo', isset($_GET[$record->nombre]),'aun esta en la competencia') ;
        }

        else{
            session()->flash('message', 'El equipo ', isset($_GET[$record->nombre]),'ya no  esta en la competencia') ;
        }
        
    }


    public function antiguedad($id)
    {
        $record = Equipo::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->created_at = $record-> created_at;
        session()->flash('message', 'El juego es miembro desde el:', isset($_POST[$record->created_at]));
    }

    
}
