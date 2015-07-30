<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
  protected $primaryKey = 'local';
  protected $table = "locais";
  protected $fillable = ['local'];
  public $incrementing = false;
  public $timestamps = false;

  public function mensagens()
  {
    return $this->belongsToMany('\App\Mensagem', 'local_mensagem');
  }

  public function toArray()
  {
    return $this->local;
  }
}
