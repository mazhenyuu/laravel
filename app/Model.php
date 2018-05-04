<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

//表=>posts
class Model extends BaseModel
{
    //protected 可以指定表明

    protected $guarded = [];//不可以注入的字段
    //protected $fillable = ['content','title'];//可以注入的字段
}
