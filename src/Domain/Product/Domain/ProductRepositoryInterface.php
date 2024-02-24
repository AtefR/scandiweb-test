<?php

declare(strict_types=1);

namespace Domain\Product\Domain;

interface ProductRepositoryInterface
{
    public function all(): array;

    public function save(Product $product): void;

    public function findById(string $id): ?Product;

    public function destroy(array $data);
}