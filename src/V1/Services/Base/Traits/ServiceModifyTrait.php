<?php

namespace Citizenzet\Laravel\Core\V1\Services\Base\Traits;

trait ServiceModifyTrait
{
    public function create(array $data)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function update(array $data, $condition)
    {
        return $this->callRepositoryMethod(__FUNCTION__, func_get_args());
    }

    public function updateById($id, $data)
    {
        $result = $this->callRepositoryMethod(__FUNCTION__, func_get_args());

        return $result;
    }

    public function delete($condition)
    {
        $this->beforeDelete($condition);
        $result = $this->callRepositoryMethod(__FUNCTION__, func_get_args());
        $this->afterDelete($condition);

        return $result;
    }

    public function deleteById($id)
    {
        $this->beforeDeleteById($id);
        $result = $this->callRepositoryMethod(__FUNCTION__, func_get_args());
        $this->afterDeleteById($id);

        return $result;
    }

    public function beforeDelete($condition)
    {

    }

    public function afterDelete($condition)
    {

    }

    public function beforeDeleteById($id)
    {

    }

    public function afterDeleteById($id)
    {

    }
}