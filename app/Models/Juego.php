<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'juegos';

    protected $fillable = ['nombre','reglas','aula','valor','id_categoria'];
	
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
    public function inscripcionGrups()
    {
        return $this->hasMany('App\Models\InscripcionGrup', 'id_juego', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionInds()
    {
        return $this->hasMany('App\Models\InscripcionInd', 'id_juego', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modos()
    {
        return $this->hasMany('App\Models\Modo', 'id_juego', 'id');
    }
    
}
