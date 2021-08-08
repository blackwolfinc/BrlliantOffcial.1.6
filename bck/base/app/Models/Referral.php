<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    protected $table = 'referral';
    protected $fillable = ['nama_pemilik','link_referal'];
    public $timestamps = false;
}
