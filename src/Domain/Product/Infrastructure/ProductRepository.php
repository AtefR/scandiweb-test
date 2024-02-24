<?php

declare(strict_types=1);

namespace Domain\Product\Infrastructure;

use Domain\Product\Domain\Product;
use Domain\Product\Domain\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): array
    {
        return (new Product())->select(['*'])->get();
    }

    public function save(Product $product): void
    {
        $product->insert([
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'type' => $product->getType(),
            'price' => $product->getPrice(),
            'attributes' => $product->getAttributes(),
        ]);
    }

    public function findById(string $id): ?Product
    {
        // TODO: Implement findById() method.
    }

    public function destroy(array $data): bool
    {
        return (new Product())->delete('id', $data);
    }
}