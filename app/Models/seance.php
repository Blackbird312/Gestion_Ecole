<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seance extends Model
{
    use HasFactory;

    public function formateur(){
      return $this->hasOne(Formateur::class);
    }

    public function module(){
      return $this->hasOne(Module::class);
    }

    public function groupe(){
      return $this->hasOne(Formateur::class);
    }
    
}
