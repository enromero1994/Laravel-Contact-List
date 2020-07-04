<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    // protected $table = 'contacts';

    // protected $primaryKey = 'id';
    public function user(){
        return $this->BelongsTo(User::class);
    }
}
