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
        $user = $this->model->create($inputs);
        $user->save();
        return $user;
    }
}
