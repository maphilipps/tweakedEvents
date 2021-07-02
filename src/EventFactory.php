<?php

namespace CarkDigital\Events;

use Statamic\Fields\Value;
use Statamic\Support\Arr;
use Statamic\Support\Str;
use CarkDigital\Events\Types\MultiDayEvent;
use CarkDigital\Events\Types\RecurringEvent;
use CarkDigital\Events\Types\SingleDayEvent;

class EventFactory
{
    public static function createFromArray($data)
    {
        if (static::raw($data, 'multi_day', false)) {
            return new MultiDayEvent($data);
        }

        // Statamic can save the recurrence "none" as "false" so we need to check for that
        if (Str::toBool(static::raw($data, 'recurrence', false))) {
            return new RecurringEvent($data);
        }

        return new SingleDayEvent($data);
    }

    // this is needed cuz we may have a `Value` object instead of a raw value
    private static function raw($data, $key, $default)
    {
        $value = Arr::get($data, $key, $default);

        if ($value instanceof Value) {
            return $value->raw();
        }

        return $value;
    }
}
