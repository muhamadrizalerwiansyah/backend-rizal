<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'rm_branch_id',
        'rm_rep_id',
        'rm_name',
        'rm_current_position',
        'rm_manager_id'
    ];
}
