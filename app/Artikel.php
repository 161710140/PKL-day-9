<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{ 
    protected $fillable = ['Judul','content','kategori_id'];

    public $timestamps = true;

    public function Kategori()
    {
        return $this->belongsTo('App\Kategori','kategori_id');
    }
}
