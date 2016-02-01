<?php namespace Lembarek\Core\Repositories;
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
        $this->model->create($inputs);
    }
}
