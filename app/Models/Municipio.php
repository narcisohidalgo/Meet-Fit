<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table='municipio';
    protected $primaryKey='id';

    protected $fillable = [
        'cp',
        'nombre',
        'id_provincia',
    ];

    //En belongsTo (clase, atributo local y atributo referenciado)
    public function provincia()
    {
        //Relacion de muchos a uno
        return $this->belongsTo(Provincia::class, 'id_provincia', 'id');
    }

    public function lugares()
    {
        //Relacion de muchos a uno
        return $this->hasMany(Lugar::class,'id_municipio', 'id');
    }


}
