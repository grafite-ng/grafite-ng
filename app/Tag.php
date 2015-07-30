<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $primaryKey = 'tag';
  public $incrementing = false;
  protected $fillable = ['tag'];
  public $timestamps = false;

  public function mensagens()
  {
    return $this->belongsToMany('\App\Mensagem', 'mensagem_tag');
  }

  public function toArray()
  {
    return $this->tag;
  }
}
