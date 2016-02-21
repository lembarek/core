<?php

 namespace Lembarek\Core\Repositories;
class Repository
{
    /**
     * create a new record
     *
     * @param  array  $input
     * @return Models
     */
    public function create($inputs)
    {
        $record = $this->model->create($inputs);
        $record->save();
        return $record;
    }
}
