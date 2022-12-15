<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcioni extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inscripcionis';

    protected $fillable = ['fecha','id_juego','id_participantes'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juego()
    {
        return $this->hasOne('App\Models\Juego', 'id', 'id_juego');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participante()
    {
        return $this->hasOne('App\Models\Participante', 'id', 'id_participantes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoPagos()
    {
        return $this->hasMany('App\Models\TipoPago', 'id_inscripcion_inds', 'id');
    }
    
}
