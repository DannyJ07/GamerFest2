<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipos';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionGrups()
    {
        return $this->hasMany('App\Models\InscripcionGrup', 'id_equipo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participantes()
    {
        return $this->hasMany('App\Models\Participante', 'id_equipo', 'id');
    }
    
}
