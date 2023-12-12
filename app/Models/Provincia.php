<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table='provincia';
    protected $primaryKey='id';

    protected $fillable = [
        'nombre',
    ];

    //En hasMany (clase, referencia, atributo local)
    //En belongsto (clase, )
    public function municipios()
    {
        //Relacion de muchos a uno
        return $this->hasMany(Municipio::class, 'id_provincia', 'id');
    }
}
