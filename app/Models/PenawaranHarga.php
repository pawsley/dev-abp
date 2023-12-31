<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranHarga extends Model
{
    use HasFactory;
    protected $fillable = ['id_customer','nama_pic', 'ketentuan', 'status'];

    public function customer()
    {
        return $this->hasOne(Customer::class,'id','id_customer');
    }
}
