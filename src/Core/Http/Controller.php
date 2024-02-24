<?php

declare(strict_types=1);

namespace Core\Http;

class Controller
{
    public function json(array $array): string
    {
        return json_encode($array);
    }
}