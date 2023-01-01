<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;

class Juegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $reglas, $aula, $valor, $id_categoria, $id_modo;
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
						->orWhere('id_modo', 'LIKE', $keyWord)
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
		$this->id_modo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'reglas' => 'required',
		'aula' => 'required',
		'valor' => 'required',
		'id_categoria' => 'required',
		'id_modo' => 'required',
        ]);

        Juego::create([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'id_categoria' => $this-> id_categoria,
			'id_modo' => $this-> id_modo
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
		$this->id_modo = $record-> id_modo;
		
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
		'id_modo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Juego::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'reglas' => $this-> reglas,
			'aula' => $this-> aula,
			'valor' => $this-> valor,
			'id_categoria' => $this-> id_categoria,
			'id_modo' => $this-> id_modo
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

    public function Tips($id)
    {
        $record = Juego::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
        if ($this->nombre=="CLASH ROYAL"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        if ($this->nombre=="FIFA"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        if ($this->nombre=="LEGUE OF LEGENDS"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        if ($this->nombre=="DOTA 2"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        if ($this->nombre=="MARIO KART"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        if ($this->nombre=="FREE FIRE"){
            $mensaje=array("a"=>"Siempre ten 2 cartas anti aereas en tu mazo ","b"=>"A veces es mas valioso perder una torre y no gastar elixir para usarlo mas adelante","c"=>"pon una carta de mayor coste de elixir desde tu torre central para que hasta que llegue a la mitad hayas recuperado su coste y mandar refuerzos");
        }
        shuffle($mensaje);
        return $mensaje[0];  
    }
    public function CosasMeta($id)
    {
        $record = Juego::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
        if ($this->nombre=="CLASH ROYAL"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        if ($this->nombre=="FIFA"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        if ($this->nombre=="LEAGUE OF LEGENDS"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        if ($this->nombre=="DOTA 2"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        if ($this->nombre=="MARIO KART"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        if ($this->nombre=="FREE FIRE"){
            $mensaje=("lo meta actualmente es: mazo 1, mazo 2 , mazo 3");
        }
        return $mensaje;  
    }

    public function JuegosSimilares($id)
    {
        $record = Juego::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
        if ($this->nombre=="CLASH ROYAL"){
            $mensaje=array("a"=>"Yughi-Oh","b"=>"Marvel Snap","c"=>"Gears of war pop");
        }
        if ($this->nombre=="FIFA"){
            $mensaje=array("a"=>"PES","b"=>"NBA 2K22","c"=>"efootball");
        }
        if ($this->nombre=="LEGUE OF LEGENDS"){
            $mensaje=array("a"=>"DOTA 2","b"=>"SMITE","c"=>"Heroes of the storm");
        }
        if ($this->nombre=="DOTA 2"){
            $mensaje=array("a"=>"LOL","b"=>" SMITE","c"=>"Heroes of the storm");
        }
        if ($this->nombre=="MARIO KART"){
            $mensaje=array("a"=>"El chavo kart","b"=>" Rocket league","c"=>"beach buggy");
        }
        if ($this->nombre=="FREE FIRE"){
            $mensaje=array("a"=>"Pubg","b"=>"Fortnite","c"=>"Call of duty");
        }
        shuffle($mensaje);
        return $mensaje[0];  
    }

    public function CantidadJugadores($id)
    {
        $record = Juego::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
        if ($this->nombre=="CLASH ROYAL"){
            $mensaje=("La cantidad de jugadores actuales es: 18324326");
        }
        if ($this->nombre=="FIFA"){
            $mensaje=("La cantidad de jugadores actuales es: 101392");
        }
        if ($this->nombre=="LEAGUE OF LEGENDS"){
            $mensaje=("La cantidad de jugadores actuales es: 180000000");
        }
        if ($this->nombre=="DOTA 2"){
            $mensaje=("La cantidad de jugadores actuales es: 567334");
        }
        if ($this->nombre=="MARIO KART"){
            $mensaje=("La cantidad de jugadores actuales es: 4000000");
        }
        if ($this->nombre=="FREE FIRE"){
            $mensaje=("La cantidad de jugadores actuales es: 2696875");
        }
        return $mensaje;  
    }
    
}
