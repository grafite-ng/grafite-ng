<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
  public function mensagens()
  {
    return $this->belongsToMany('\App\Mensagem', 'contacto_mensagem');
  }
}
