<?php

namespace Modules\Icommerceflatrate\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class IcommerceFlatrate extends Model
{
    use Translatable;

    protected $table = 'icommerceflatrate__icommerceflatrates';
    public $translatedAttributes = [];
    protected $fillable = [];
}
