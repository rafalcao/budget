<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCards extends Model
{
    protected $fillable = ['name', 'due_day', 'status'];

    public function getLabelStatus()
    {
        if($this->status){
            return 'enable';
        }

        return 'disable';
    }
}
