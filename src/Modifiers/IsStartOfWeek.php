<?php

namespace CarkDigital\Events\Modifiers;

use Illuminate\Support\Carbon;
use Statamic\Modifiers\Modifier;

class IsStartOfWeek extends Modifier
{
    public function index($value, $params, $context)
    {
        return Carbon::parse($value)->isSunday();
    }
}
