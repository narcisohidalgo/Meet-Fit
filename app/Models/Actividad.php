<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table='actividad';
    protected $primaryKey='id';
    protected $fillable = [
        'nombre',
        'tipo',
    ];

    public function demandadas()
    {
        //Relacion uno a muchos
        return $this->hasMany(Demandada::class, 'id', 'id_actividad');
    }

    public function actividadeslugares()
    {
        //Relacion uno a muchos
        return $this->hasMany(ActividadLugar::class, 'id', 'id_act-lugar');
    }
}
