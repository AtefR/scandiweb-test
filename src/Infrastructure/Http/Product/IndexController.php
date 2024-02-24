<?php

declare(strict_types=1);

namespace Infrastructure\Http\Product;

use Core\Http\Controller;
use Domain\Product\Infrastructure\ProductRepository;

final class IndexController extends Controller
{
    public function __invoke(): string
    {
        $repository = new ProductRepository;

        return $this->json($repository->all());
    }
}