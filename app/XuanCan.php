<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuanCan extends Model
{
    protected $table = 'xuancans';
    protected $fillable = ['id','monhoc','giatien','giangvien'];
}
