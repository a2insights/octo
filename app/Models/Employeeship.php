<?php

namespace App\Models;

use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Wallo\FilamentCompanies\Employeeship as FilamentCompaniesEmployeeship;

class Employeeship extends FilamentCompaniesEmployeeship
{
    use BelongsToTenant;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
