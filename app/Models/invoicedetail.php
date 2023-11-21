<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicedetail extends Model
{
    use HasFactory;
    public function item(){
        return $this->belongsTo(item::class,'id_item','id');
    }
}
