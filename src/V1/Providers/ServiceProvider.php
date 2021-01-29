<?php

namespace Citizenzet\Laravel\Core\V1\Providers;

use Exception;
use Illuminate\Support\ServiceProvider as Base;

/**
 * Базовый сервис провайдер
 *
 * Class ServiceProvider
 * @package Common\App\Providers
 * @author citizenzet <exgamer@live.ru>
 */
abstract class ServiceProvider extends Base
{
    /**
     * Группа сервисов провайдера
     * ключ сервисов из основного конфига сервисов
     *
     * @var string
     */
    protected $servicesGroup;

    /**
     * Возвращает путь до конфига сервисов
     *
     * example return __DIR__.'/../../config/services/main.php'
     *
     * @return string
     */
    function getServicesConfigPath()
    {
        return __DIR__.'/../../config/services/main.php';
    }

    /**
     * Возвращает конфиг сервисов
     *
     * @return array
     */
    protected function getServicesConfig()
    {
        static $config = [];
        if (empty($config) && file_exists($servicesConfigPath = $this->getServicesConfigPath())) {
            return require $servicesConfigPath;
        }

        return $config;
    }

    /**
     * Возвращает массив конфига всех сервисов
     *
     * @return array
     */
    protected function getAllServicesConfig()
    {
        static $result = [];
        if (empty($result)) {
            $config = $this->getServicesConfig();
            foreach ($config as $c) {
                $result = array_merge($result, $c);
            }
        }

        return $result;
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

        $allServicesConfig = $this->getAllServicesConfig();
        foreach ($commonServicesConfig as $name => $config) {
            $this->app->singleton($name, function ($app) use ($allServicesConfig, $config) {
                $class = $config['class'] ?? null;
                $params = $config['params'] ?? [];
                $args = [];
                foreach ($params as $param) {
                    // Если ключ есть в конфигах сервисов, то создаем сервис
                    if (isset($allServicesConfig[$param])) {
                        $args[] = $app->make($param);
                        continue;
                    }
                }

                return new $class(... $args);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     * @throws Exception
     */
    public function register()
    {
        $this->initServices();
    }
}
