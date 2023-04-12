<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Illuminate\Support\Str;

class Element
{
    /**
     * Create a new instance of the class.
     *
     * @return static
     */
    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * Recursively evaluates the given value and returns the result.
     * If the value is an array, it will evaluate each element recursively and return an array of results.
     * If the value is an instance of the class, it will return the result of the toPayload method.
     * Otherwise, it will return the value itself.
     *
     * @param mixed $value
     * @return mixed
     */
    protected function evalute($value)
    {
        if (is_array($value)) {
            $results = [];
            foreach ($value as $v) {
                $results[] = $this->evalute($v);
            }
            return $results;
        }

        if ($value instanceof self) {
            return $value->toPayload();
        }

        return $value;
    }

    /**
     * Convert the object to a payload array.
     *
     * @return array
     */
    public function toPayload()
    {
        $class = (new \ReflectionClass(static::class));
        $results = [];
        foreach ($class->getProperties() as $property) {
            $propertyAsSnakeCase = Str::snake($property->name);
            $prefix = $property->getType() == 'bool' ? 'is' : 'get';

            if (!$propertyValue = $this->{$prefix . ucfirst($property->name)}()) {
                continue;
            }

            $results[$propertyAsSnakeCase] = $this->evalute($propertyValue);
        }
        return $results;
    }
}
