<?php

declare(strict_types=1);

namespace Infrastructure\Http\Product;

use Domain\Product\Infrastructure\ProductRepository;

final class DeleteController
{
    public function __invoke(): string
    {
        $repository = new ProductRepository;

        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);

        if ($data !== null) {
            $repository->destroy($data['ids']);

            return "ok";
        } else {
            http_response_code(400);

            echo "Invalid JSON data";
        }
    }
}