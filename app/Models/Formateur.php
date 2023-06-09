<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'prenom',
      'email',
      'pass',
  ];

  public function modules()
  {
      return $this->belongsTo(Module::class);
  }

  public function seance(){
    return $this->belongsTo(seance::class);
  }

}
