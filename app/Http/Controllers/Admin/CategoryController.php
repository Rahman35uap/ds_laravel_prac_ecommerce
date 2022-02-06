<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MainCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)          // injecting dependency
    {
        $this->categoryRepo = $categoryRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['main_category_details'] = MainCategory::asSelectArray();
        
        $category = new Category();
        // $data['db_category_table'] = $category->get();
        $data['db_category_table'] = $this->categoryRepo->get();
        return view('admin.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["main_category"] = MainCategory::asSelectArray();
        return view('admin.categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // /* using Data access logic here */
        // $category = new Category();
        // $category->name = $request->name;
        // $category->main_category_id = $request->main_category_id;
        // $category->save();
        // flash('Successfully created')->success(); // showing success message to the redirected page. This is using session() function inside.
        
        /* using repository pattern */
        $this->categoryRepo->createCategory($request);
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        if($category)
        {
            $data['db_category_table'] = $category;
            $data['main_category'] = MainCategory::asSelectArray();
            return view('admin.categories.edit',$data);
        }
        else
        {
            flash("No such a category exists to edit")->error();
        }
        return redirect('/admin/categories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $category = Category::find($id);
        if($category)
        {
            $category->name = $request->name;
            $category->main_category_id = $request->main_category_id;
            $category->save();
            flash("Successfully Edited");
        }
        else
        {
            flash("No such an item exists to edit")->error();
        }
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* using Data access logic here */
        // $category = Category::find($id);
        // if($category)
        // {
        //     $category->delete();
        //     flash("Successfully deleted")->success();
        // }
        // else
        // {
        //     flash("No Items Found")->error();
        // }
        /* using repository pattern */
        $this->categoryRepo->delete($id);
        return redirect("/admin/categories/");
    }
}
