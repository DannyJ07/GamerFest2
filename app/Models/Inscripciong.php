<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciong extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inscripciongs';

    protected $fillable = ['fecha','total','id_juego','id_equipo','id_pago','doc_pago'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'id_equipo');
    }
    
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
    public function tipopg()
    {
        return $this->hasOne('App\Models\Tipopg', 'id', 'id_pago');
    }
    
}
