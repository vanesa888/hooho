<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";
    protected $primaryKey = 'id';
    protected $fillable = ['id','kategori_id', 'user_id','judul','isi','jbaca' ];


}
