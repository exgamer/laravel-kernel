<?php

namespace Citizenzet\Laravel\Core\V1\Services\Base;

use Citizenzet\Laravel\Core\V1\Services\Base\Traits\ServiceModifyTrait;
use Citizenzet\Laravel\Core\V1\Services\Base\Traits\ServiceReadTrait;
use Citizenzet\Laravel\Core\V1\Services\Base\Traits\ServiceTrait;
use Citizenzet\Php\Core\Services\CrudService as Base;

/**
 * Базовый crud сервис
 *
 * Class CrudService
 * @package Common\App\Services\Base
 * @author citizenzet <exgamer@live.ru>
 */
abstract class CrudService extends Base
{
    use ServiceTrait;
    use ServiceReadTrait;
    use ServiceModifyTrait;
}
