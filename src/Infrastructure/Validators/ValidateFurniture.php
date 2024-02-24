<?php

declare(strict_types=1);

namespace Infrastructure\Validators;

class ValidateFurniture extends Validator
{
    function validateAttributes(array $attributes): ?string
    {
        if (!isset($attributes['height']))
            return 'height are missing';

        if (!isset($attributes['width']))
            return 'width are missing';

        if (!isset($attributes['length']))
            return 'length are missing';

        return null;
    }
}