<?php

namespace Citizenzet\Laravel\Core\V1\Services\Base\Traits;

use Exception;

trait ServiceTrait
{
    protected $repository;

    /**
     * Вызов меотда репозитория сервиса
     *
     * @param $method
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function callRepositoryMethod($method, $params)
    {
        if (! method_exists($this->repository,$method)) {
            throw new Exception("Repository method delete not exists");
        }

        return $this->repository->{$method}(...$params);
    }
}