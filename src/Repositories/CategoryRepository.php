<?php

namespace Lembarek\Core\Repositories;

use Lembarek\Core\Models\Category;
use Lembarek\Core\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
