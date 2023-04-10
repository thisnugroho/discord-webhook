<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Illuminate\Support\Str;

class Element
{
    public static function make()
    {
        return app(static::class);
    }

    public function toPayload()
    {
        $properties = (new \ReflectionClass(static::class))
            ->getProperties();
        $results = [];
        foreach ($properties as $property) {
            $propertyAsSnakeCase = Str::snake($property->name);
            $prefix = $property->getType() == 'bool' ? 'is' : 'get';
            if (!$propertyValue = $this->{$prefix . ucfirst($property->name)}()) {
                continue;
            }
            if (is_array($propertyValue)) {
                foreach (current($propertyValue) as $pv) {
                    $propertyValue = [$pv->toPayload()];
                }
            }
            $results[$propertyAsSnakeCase] = $propertyValue;
        }

        return $results;
    }
}
