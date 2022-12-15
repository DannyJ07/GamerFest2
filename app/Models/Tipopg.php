<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopg extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipopgs';

    protected $fillable = ['tipo','doc_pago','total','id_inscripcion_inds','id_inscripcion_grups'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscripciong()
    {
        return $this->hasOne('App\Models\Inscripciong', 'id', 'id_inscripcion_grups');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscripcioni()
    {
        return $this->hasOne('App\Models\Inscripcioni', 'id', 'id_inscripcion_inds');
    }
    
}
