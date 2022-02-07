<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\IProductRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    protected $productModel;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->productModel = $model;
    }
}
