<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'modos';

    protected $fillable = ['tipo','id_juego'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juego()
    {
        return $this->hasOne('App\Models\Juego', 'id', 'id_juego');
    }
    
}
