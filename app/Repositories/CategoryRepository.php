<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function createCategory($request)
    {
        $this->model->name = $request->name;
        $this->model->main_category_id = $request->main_category_id;
        $this->model->save();
        flash('Successfully created')->success(); // showing success message to the redirected page. This is using session() function inside.
    }
}
