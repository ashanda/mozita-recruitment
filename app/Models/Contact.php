<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['id','unq_id','contact_person','designation','phone_number','email'];
    protected $primaryKey = 'id';
}
