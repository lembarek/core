<?php

 namespace Lembarek\Core\Repositories;

use Auth;

abstract class Repository
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


    /**
     * get all records in database
     *
     * @param  integer  $limit
     * @return Model
     */
    public function all($limit = null)
    {
        if ($limit) {
            return $this->model->all()->limit($limit)->get();
        }

        return $this->model->all();
    }


    /**
     * get the columns for a users
     *
     * @param  int  $user
     * @return Model
     */
    public function getForUser($user_id = null)
    {
        if ($user_id) {
            return $this->model->whereUserId($user_id)->get()->first()->toArray();
        }

        if (Auth::user()) {
            return $this->model->whereUserId(Auth::user()->id)->first()->toArray();
        }

        return null;
    }


    /**
     * try to simulate the where of Eloquent
     *
     * @param  string  $key
     * @param  string  $value
     * @return this
     */
    public function where($key, $value)
    {
        return $this->model->where($key, $value);
    }
}
