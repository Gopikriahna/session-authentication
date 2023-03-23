<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
   // protected $table='employees';
    protected $fillable = [
        'EmployeeId',
        'FirstName',
        'LastName',
        'Skills',
        'StartDate',
        'createdBy',
        'updatedBy'
    ];
}
