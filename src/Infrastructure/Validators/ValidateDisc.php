<?php

declare(strict_types=1);

namespace Infrastructure\Validators;

class ValidateDisc extends Validator
{
    function validateAttributes(array $attributes): ?string
    {
        if (!isset($attributes['size']))
            return 'size is missing';

        return null;
    }
}