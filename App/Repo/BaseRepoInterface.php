<?php

namespace App\Repo;

interface BaseRepoInterface
{
    public function find($id);
    
    public function save(array $data);

    public function update(int $id, array $data);

    public function softDelete(int $id);

    public function audit($old_data, $activity, $id=null, $new_data=null);
}
