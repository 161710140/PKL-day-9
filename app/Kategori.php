<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['Tempat_Wisata'];

    public $timestamps = true;

    public function Artikel()
    {
        return $this->HasMany('App\Artikel','kategori_id');
    }
}
