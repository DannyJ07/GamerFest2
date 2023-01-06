<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Participante;
use App\Models\Equipo;

class Participantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellido, $cedula, $correo, $telefono, $id_equipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.participantes.view', [
            $equipos=Equipo::all(),
            'participantes' => Participante::with('equipo')
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->whereHas('equipo', fn($query)=>
                        $query->where('nombre', 'LIKE', $keyWord))
						->paginate(10),
        ],compact('equipos'));
    }

    public function index()
    {
        return Participante::all();
    }
	
    public function listarParticipantes(Participantes $participante)
    {
        return $participante;
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellido = null;
		$this->cedula = null;
		$this->correo = null;
		$this->telefono = null;
		$this->id_equipo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
        ]);

        Participante::create([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'correo' => $this-> correo,
			'telefono' => $this-> telefono,
			'id_equipo' => $this-> id_equipo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Participante Successfully created.');
    }

    public function edit($id)
    {
        $record = Participante::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->cedula = $record-> cedula;
		$this->correo = $record-> correo;
		$this->telefono = $record-> telefono;
		$this->id_equipo = $record-> id_equipo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Participante::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'correo' => $this-> correo,
			'telefono' => $this-> telefono,
			'id_equipo' => $this-> id_equipo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Participante Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Participante::where('id', $id);
            $record->delete();
        }
    }
}
