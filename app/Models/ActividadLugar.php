<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadLugar extends Model
{
    use HasFactory;
    protected $table='act-lugar';
    protected $primaryKey='id';

    protected $fillable = [
        'id_actividad',
        'id_lugar',
    ];


    public function actividad()
    {
        //Relacion uno a muchos
        return $this->belongsTo(Actividad::class, 'id_actividad', 'id');
    }

    public function lugar()
    {
        //Relacion uno a muchos
        return $this->belongsTo(Lugar::class, 'id_lugar', 'id');
    }
}
