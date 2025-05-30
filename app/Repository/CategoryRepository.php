<?php

namespace App\Repository;

use App\Interface\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
