<?php

namespace App\Interfaces;

interface CommentInterface
{
    public function store($request);

    public function update($request, $id);

    public function delete($id);
}
