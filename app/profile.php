<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table ="tbl_users";
    protected $primaryKey = 'id';
    protected $fillable =[
        "nama",
        "alamat",
        "nomor_telepon",
    ];
}
