<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'file_uploads';

    protected $fillable = [

        'realName',
        'uploadName',


    ];
}
