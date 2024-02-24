<?php

declare(strict_types=1);

namespace Infrastructure\Validators;

use Exception;

abstract class Validator
{
    protected $fields = [
        'sku', 'name', 'price', 'type', 'attributes'
    ];

    /**
     * @throws Exception
     */
    public function validate(array $data): array
    {
        $errors = [];

        if (!$this->fields)
            throw new Exception('Fields are missing.');

        $missing = array_diff($this->fields, array_keys($data));

        foreach ($missing as $item) {
            $errors[] = "{$item} is missing.";
        }

        $attributes = $data['attributes'];

        if (!is_array($attributes)) {
            $errors[] = 'invalid attributes';
        } else {
            $validated = $this->validateAttributes($attributes);

            if ($validated)
                $errors[] = $validated;
        }

        return $errors;
    }

    abstract function validateAttributes(array $attributes): ?string;
}