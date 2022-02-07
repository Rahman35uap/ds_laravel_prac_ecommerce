<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Exception;

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
    public function updateCategory($request,$id)
    {
        // $category = $this->model->find($id);
        // if($category)
        // {
        //     $category->main_category_id = $request->main_category_id;
        //     $category->name = $request->name;
        //     $category->save();
        //     flash("updated successfully")->success();
        //     // echo("success");
        // }
        // else
        // {
        //     // echo("No such a item exists to edit");
        //     flash("No such a item exists to edit")->error();
        // }
        // return redirect('/admin/categories/');

        try
        {
            $category = $this->model->find($id);
            $category->main_category_id = $request->main_category_id;
            $category->name = $request->name;
            $category->save();
            flash("updated successfully")->success();
        }
        catch(Exception $e)
        {
            flash("not updated.".$e->getMessage())->error();
        }
    }
}
