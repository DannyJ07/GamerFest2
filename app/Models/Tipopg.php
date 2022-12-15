<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopg extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipopgs';

    protected $fillable = ['tipo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripciongs()
    {
        return $this->hasMany('App\Models\Inscripciong', 'id_pago', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionis()
    {
        return $this->hasMany('App\Models\Inscripcioni', 'id_pago', 'id');
    }
    
}
