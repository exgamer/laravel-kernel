<?php

namespace Citizenzet\Laravel\Core\V1\Services\Base\Traits;

trait ServiceReadTrait
{
    public function oneById(int $id, $condition = null)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function oneByCondition($condition)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function allByIds(array $ids, $condition = null)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function allByCondition($condition)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function allCount()
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }
}