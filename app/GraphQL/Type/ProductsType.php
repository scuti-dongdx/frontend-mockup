<?php

namespace App\GraphQL\Type;

use App\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Products',
        'description' => 'A type Product',
        'model' => Product::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of product'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of product'
            ],


            'sales_office' => [
                'type' => Type::string()
            ],
            'store_name' => [
                'type' => Type::string()
            ],
            'prefecture' => [
                'type' => Type::string()
            ],
            'address' => [
                'type' => Type::string()
            ],
            'telephone_number' => [
                'type' => Type::string()
            ],
            'number_of_equipment' => [
                'type' => Type::string()
            ],
            'active_row' => [
                'type' => Type::boolean(),
                'description' => 'The active_row of product'
            ],





            'price' => [
                'type' => Type::int(),
                'description' => 'The price of product'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of product'
            ],
            'product_images' => [
                'type' => Type::listOf(GraphQL::type('product_images')),
                'description' => 'The images of product',
            ],
            'users' => [
                'type' => GraphQL::type('users'),
                'description' => 'The user of product'
            ]
        ];
    }
}
