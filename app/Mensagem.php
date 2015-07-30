<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
  protected $table = "mensagens";
  public $timestamps = false;
  public $incrementing = false;

  protected $fillable = [
    'contacto',
    'conteudo',
    'data'
  ];

  public static function boot()
  {
    parent::creating(function($m) {
      $m->id = sha1(str_random(128));
    });

    parent::created(function($m) {
      preg_match_all("/(^|[^a-zA-Z0-9])@([a-zA-Z0-9_])+/i", $m->conteudo, $matches);
      $locais = array();

      print_r($matches[0]);
      if (!empty($matches[0])) {
        foreach($matches[0] as $match) {
          array_push($locais, preg_replace('/[^a-zA-Z0-9_]/i', "", $match));
        }
      }

      preg_match_all("/(^|[^a-zA-Z0-9])#([a-zA-Z0-9_])+/i", $m->conteudo, $matches);
      $tags = array();

      print_r($matches[0]);
      if (!empty($matches[0])) {
        foreach($matches[0] as $match) {
          array_push($tags, preg_replace('/[^a-zA-Z0-9_]/i', "", $match));
        }
      }

      foreach ($tags as $tag) {
        $t = \App\Tag::firstOrCreate(['tag' => $tag]);
        $m->tags()->save($t);
      }

      foreach ($locais as $local) {
        $l = \App\Local::firstOrCreate(['local' => $local]);
        $m->locais()->save($l);
      }
    });
  }


  public function contactos()
  {
    return $this->belongsToMany('\App\Mensagem', 'contacto_mensagem');
  }

  public function tags()
  {
    return $this->belongsToMany('\App\Tag', 'mensagem_tag', 'mensagem_id', 'tag_id');
  }

  public function locais()
  {
    return $this->belongsToMany('\App\Local', 'local_mensagem', 'mensagem_id', 'local_id');
  }

  public function toArray()
  {
    $mensagens = [
      'id' => $this->id,
      'contacto' => $this->contacto,
      'data' => $this->data,
      'conteudo' => $this->conteudo,
    ];

    if ($this->tags)
      $mensagens['tags'] = $this->tags->toArray();

    if ($this->locais)
      $mensagens['locais'] = $this->locais->toArray();

    return $mensagens;
  }
}
