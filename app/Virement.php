<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected $filable = [
        'libelle', 'description', 'bordereau'
    ];
}
