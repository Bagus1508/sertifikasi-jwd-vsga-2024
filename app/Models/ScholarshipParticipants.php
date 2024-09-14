<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipParticipants extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $table = 'scholarship_participants';
}
