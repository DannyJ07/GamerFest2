<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'modos';

    protected $fillable = ['tipo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function juegos()
    {
        return $this->hasMany('App\Models\Juego', 'id_modo', 'id');
    }
    
}
