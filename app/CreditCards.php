<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCards extends Model
{
    /** @var array  */
    protected $fillable = ['name', 'due_day', 'status'];

    /**
     * @return string
     */
    public function getLabelStatus()
    {
        if($this->status){
            return 'enable';
        }

        return 'disable';
    }
}
