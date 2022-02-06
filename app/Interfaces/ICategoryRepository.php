<?php

namespace App\Interfaces;

interface ICategoryRepository extends IBaseRepository
{
    public function createCategory($request);
}
