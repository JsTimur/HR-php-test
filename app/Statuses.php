<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    const NEW = 0;
    const APPROVED = 10;
    const CLOSED = 20;
}
