<?php

namespace App\Models;

use Attribute as GlobalAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded=[];

    // public function mechanic(){

    // }

    // protected function service():Attribute{
    //     return Attribute::make(
    //         get:fn($value)=>json_decode($value,true),
    //         set:fn($value)=>json_encode($value),
    //     );
    // }
    protected $casts = [
        'service' => 'array',
    ];
}
