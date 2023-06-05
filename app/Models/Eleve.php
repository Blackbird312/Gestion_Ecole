<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'prenom',
      'email',
      'groupe_id',
  ];

  public function groupe(){
    return $this->hasOne(Groupe::class , "id") ;
  }
}
