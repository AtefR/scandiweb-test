<?php

declare(strict_types=1);

namespace Infrastructure\Http\Product;

use Core\Http\Controller;
use Domain\Product\Domain\Product;
use Domain\Product\Infrastructure\ProductRepository;

final class CreateController extends Controller
{
    public function __invoke(): string
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        
        if (!isset($data['type']))
            return 'type is missing';

        $validator = sprintf('\\Infrastructure\Validators\\Validate%s', ucfirst($data['type']));

        $validatorClass = new $validator;

        $errors = $validatorClass->validate($data);

        if (!empty($errors))
        {
            http_response_code(400);

            return $this->json($errors);
        }

        $product = new Product();
        $product->setSku($data['sku']);
        $product->setName($data['name']);
        $product->setType($data['type']);
        $product->setPrice(intval($data['price']));
        $product->setAttributes($data['attributes']);

        $repository = new ProductRepository();

        $repository->save($product);

        return "ok";
    }
}