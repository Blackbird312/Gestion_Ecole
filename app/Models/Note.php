<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
      'note',
      'eleve_id',
      'module_id',
  ];

  public function eleve(){
    return $this->hasOne(Module::class);
  }

  public function module(){
    return $this->hasOne(Module::class);
  }

}
