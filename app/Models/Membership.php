<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class Membership extends JetstreamMembership
{
    use CentralConnection;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
