<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'coef',
      'formateur_id',
  ];



  public function formateurs(){
    return $this->hasOne(Formateur::class);
  }
}