<?php

namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;

trait RepositoryModifyTrait
{
    public function create(array $data)
    {
        $query = $this->getQuery();
        $fields = array_keys($data);
        $values = array_values($data);

        return $query->create($fields, $values);
    }

    public function update(array $data, $condition)
    {
        $query = $this->getQuery();
        if (is_callable($condition)){
            call_user_func($condition, $query);
        }else{
            throw new Exception("Only callbacks supported");
        }

        return $query->update($data);
    }

    public function updateById($id, $data)
    {
        return $this->update($data, function (Builder $query) use ($id){
            $query->where([
                ['id', '=', $id],
            ]);
        });
    }

    public function delete($condition)
    {
        $query = $this->getQuery();
        if (is_callable($condition)){
            call_user_func($condition, $query);
        }else{
            throw new Exception("Only callbacks supported");
        }

        return $query->delete();
    }

    public function deleteById($id)
    {
        return $this->delete(function (Builder $query) use ($id){
            $query->where([
                ['id', '=', $id],
            ]);
        });
    }
}