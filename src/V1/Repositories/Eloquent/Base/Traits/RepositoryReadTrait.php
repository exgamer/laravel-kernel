<?php

namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits;

use Exception;
use Illuminate\Database\Eloquent\Collection;

trait RepositoryReadTrait
{
    public function oneById(int $id, $condition = null)
    {
        return $this->model->find($id);
    }

    public function oneByCondition($condition)
    {
        $query = $this->getQuery();
        if (is_callable($condition)){
            call_user_func($condition, $query);
        }else{
            throw new Exception("Only callbacks supported");
        }

        return $query->first();
    }

    public function allByIds(array $ids, $condition = null)
    {
        // TODO: Implement allByIds() method.
    }

    public function allByCondition($condition)
    {
        $query = $this->getQuery();
        if (is_callable($condition)){
            call_user_func($condition, $query);
        }else{
            throw new Exception("Only callbacks supported");
        }

        return $query->get();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function countByCondition($condition)
    {
        $query = $this->getQuery();
        if (is_callable($condition)){
            call_user_func($condition, $query);
        }else{
            throw new Exception("Only callbacks supported");
        }

        return $query->count();
    }

    /**
     * @return integer
     */
    public function allCount()
    {
        $model = $this->model;
        return $model::count();
    }
}