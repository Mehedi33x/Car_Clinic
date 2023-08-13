<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function userFrom()
    {
        return $this->belongsTo(Customer::class, 'from_user', 'id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'to_user', 'id');
    }

}
