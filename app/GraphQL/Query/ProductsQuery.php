<?php

namespace App\GraphQL\Query;

use App\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'Products Query',
        'description' => 'A query of product'
    ];

    public function type()
    {
        return GraphQL::paginate('products');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string()
            ],


            'sales_office' => [
                'name' => 'sales_office',
                'type' => Type::string()
            ],
            'store_name' => [
                'name' => 'store_name',
                'type' => Type::string()
            ],
            'prefecture' => [
                'name' => 'prefecture',
                'type' => Type::string()
            ],
            'address' => [
                'name' => 'address',
                'type' => Type::string()
            ],
            'telephone_number' => [
                'name' => 'telephone_number',
                'type' => Type::string()
            ],
            'number_of_equipment' => [
                'name' => 'number_of_equipment',
                'type' => Type::string()
            ],
            'active_row' => [
                'name' => 'active_row',
                'type' => Type::boolean()
            ],


            'limit' => [
                'name' => 'limit',
                'type' => Type::int()
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }

            if (isset($args['store_name'])) {
                $query->where('store_name','like','%'.$args['store_name'].'%');
            }
        };
        $with = array_keys($fields->getRelations());
        return Product::with($with)
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'], ['*'], 'page', $args['page']);
    }
}
