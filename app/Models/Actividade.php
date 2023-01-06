<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actividades';

    protected $fillable = ['nombre','fecha','hora','lugar'];
	
}
