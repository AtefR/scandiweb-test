<?php

declare(strict_types=1);

namespace Infrastructure\Validators;

class ValidateBook extends Validator
{
    function validateAttributes(array $attributes): ?string
    {
        if (!isset( $attributes['weight']))
            return 'size is missing';

        return null;
    }
}