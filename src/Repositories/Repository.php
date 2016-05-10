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
     * get all records in database with withs
     *
     * @param  string   $with
     * @param  integer  $limit
     * @return void
     */
    public function allWith($with, $limit = null)
    {
        if ($limit) {
            return $this->model->with($with)->limit($limit)->get();
        }

        return $this->model->with($with)->get();

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

    /**
     * get by slug
     *
     * @param  string  $slug
     * @return Model
     */
    public function getBySlug($slug)
    {
       return $this->model->where('slug', $slug)->first();
    }
}
