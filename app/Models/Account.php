<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable=[
        "AccountID",
        "FacebookID",
        "GoogleID",
        "AccountEmail",
        "AccountName",
        "AccountPhone",
        "AccountPictureURL",
        "PasswordHash",
        "AccountRole",
    ]
}
