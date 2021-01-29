<?php

namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait RepositoryTrait
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {
        return $this->model::query();
    }
}