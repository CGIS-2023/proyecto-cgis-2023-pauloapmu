<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricionista extends Model
{
    use HasFactory;

    protected $fillable = ['n_licencia, telefono'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pacientes(){
        return $this->hasManyThrough(Paciente::class, Menu::class);
    }

    public function menus(){
        return $this->hasMany(Menu::class);
    }

}
