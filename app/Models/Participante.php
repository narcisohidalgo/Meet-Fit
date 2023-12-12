<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $table = 'participante';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_actdemandada',
        'id_users',
    ];

    public function demandada()
    {
        //Relacion uno a muchos
        return $this->belongsTo(Demandada::class,'id_actdemandada', 'id');
    }

    public function usuarios()
    {
        //Relacion de muchos a uno
        return $this->belongsTo(User::class, 'id_user');
    }
}
