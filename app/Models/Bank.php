<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['id_bank',
    'nama',
    'account_number',
    'status'];
    protected $table = 'bank';
}
