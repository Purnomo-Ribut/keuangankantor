<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_divisi extends Model
{
    protected $table ="tbl_divisis";
    protected $fillable =[
        "id_user",
        "nama_divisi",
    ];
}
