<?php

namespace App\Repository;

use App\Interface\FaqInterface;
use App\Models\Faq;

class FaqRepository implements FaqInterface
{
    public function all()
    {
        return Faq::all();
    }

    public function find($id)
    {
        return Faq::findOrFail($id);
    }

    public function create(array $data)
    {
        return Faq::create($data);
    }

    public function update($id, array $data)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($data);
        return $faq;
    }

    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        return $faq->delete();
    }
}
