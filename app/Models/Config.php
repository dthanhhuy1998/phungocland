<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    public function getValueByKey($key) 
    {
        $config = Config::where('config_key', $key)->first();
        return $config->config_value;
    }
}
