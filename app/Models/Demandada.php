<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandada extends Model
{
    use HasFactory;
    protected $table='actdemandada';
    protected $primaryKey='id';

    protected $fillable = [
        'hora',
        'dia',
        'id_actividad',
        'id_users',
        'id_lugar',
    ];

    public function actividad()
    {
        //Relacion uno a muchos
        return $this->belongsTo(Actividad::class, 'id_actividad', 'id');
    }

    public function usuario()
    {
        //Relacion uno a muchos
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function lugar()
    {
        //Relacion uno a muchos
        return $this->belongsTo(Lugar::class, 'id_lugar', 'id');
    }

    public function participantes()
    {
        //Relacion uno a muchos
        return $this->hasMany(Participante::class, 'id_participante', 'id');
    }
}
