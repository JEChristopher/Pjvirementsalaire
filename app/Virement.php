<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected $filable = [
        'description', 'bordereau', 'created_at', 'updated_at', 'libelle'
    ];
}
