<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcioni extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inscripcionis';

    protected $fillable = ['fecha','total','id_juego','id_participantes','id_pago','doc_pago'];
	
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipopg()
    {
        return $this->hasOne('App\Models\Tipopg', 'id', 'id_pago');
    }
    
}
