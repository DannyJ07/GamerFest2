<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'juegos';

    protected $fillable = ['nombre','reglas','aula','valor','fecha_evento','id_categoria','id_modo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripciongs()
    {
        return $this->hasMany('App\Models\Inscripciong', 'id_juego', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionis()
    {
        return $this->hasMany('App\Models\Inscripcioni', 'id_juego', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modo()
    {
        return $this->hasOne('App\Models\Modo', 'id', 'id_modo');
    }
    
}
