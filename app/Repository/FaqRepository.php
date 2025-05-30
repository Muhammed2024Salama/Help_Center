<?php

namespace App\Repository;

use App\Interface\FaqInterface;
use App\Models\Faq;

class FaqRepository implements FaqInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Faq::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Faq::findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Faq::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($data);
        return $faq;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        return $faq->delete();
    }
}
