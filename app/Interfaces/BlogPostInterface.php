<?php

namespace App\Interfaces;

interface BlogPostInterface
{
    public function index();

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function delete($id);
}
