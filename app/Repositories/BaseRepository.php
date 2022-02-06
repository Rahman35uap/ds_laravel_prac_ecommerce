<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->get();
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function delete($id)
    {
        $data = $this->model->find($id);
        if($data)
        {
            $data->delete();
            flash("Successfully deleted")->success();
        }
        else
        {
            flash("No such a item found to delete")->error();
        }
        return;
    }
}
