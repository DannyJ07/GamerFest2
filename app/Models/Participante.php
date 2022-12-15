<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'participantes';

    protected $fillable = ['nombre','apellido','cedula','correo','telefono','id_equipo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'id_equipo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionInds()
    {
        return $this->hasMany('App\Models\InscripcionInd', 'id_participantes', 'id');
    }
    
}
