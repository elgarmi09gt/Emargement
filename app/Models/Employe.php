<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['Matricule','Prenom','Nom','PhoneNumber','email'];
}
