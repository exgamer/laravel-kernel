<?php

namespace Citizenzet\Laravel\Core\V1\Providers;

use Exception;

abstract class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Возвращает путь до конфига сервисов
     *
     * example return __DIR__.'/../../config/repositories/main.php'
     *
     * @return string
     */
    function getServicesConfigPath()
    {
        return __DIR__.'/../../config/repositories/main.php';
    }

    /**
     * инициализация сервисов
     */
    protected function initServices()
    {
        if (! $this->servicesGroup) {
            throw new Exception('Set servicesGroup variable');
        }

        $servicesConfig = $this->getServicesConfig();
        if (! $servicesConfig) {
            return;
        }

        $commonServicesConfig = $servicesConfig[$this->servicesGroup];
        if (! $commonServicesConfig) {
            return;
        }

        foreach ($commonServicesConfig as $interfaceClass => $class) {
            $this->app->bind($interfaceClass, $class);
        }
    }
}
