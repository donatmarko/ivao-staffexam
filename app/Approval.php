<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    // Table name
    protected $table = "approvals";
    // Primary key
    public $primaryKey = "id";
    // Timestamps
    public $timestamps = true;
}
