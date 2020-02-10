<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hash extends Model
{
     public function user()
     {
         return $this->belonsTo('App\User');
     }
}
