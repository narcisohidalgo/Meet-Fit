<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;
    protected $table = 'lugar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'tipo',
        'id_municipio',
    ];

    public function municipio()
    {
        //Relacion de muchos a uno
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function demandadas()
    {
        //Relacion de muchos a uno
        return $this->hasMany(Demandada::class, 'id', 'id_lugar');
    }

    public function actividades_lugares()
    {
        //Relacion de muchos a uno
        return $this->hasMany(ActividadLugar::class, 'id_demandada', 'id');
    }
}
