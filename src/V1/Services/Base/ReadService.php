<?php

namespace Citizenzet\Laravel\Core\V1\Services\Base;

use Citizenzet\Laravel\Core\V1\Services\Base\Traits\ServiceReadTrait;
use Citizenzet\Laravel\Core\V1\Services\Base\Traits\ServiceTrait;
use Citizenzet\Php\Core\Services\ReadService as Base;

/**
 * Class ReadService
 * @package App\Services\Base
 * @author citizenzet <exgamer@live.ru>
 */
abstract class ReadService extends Base
{
    use ServiceTrait;
    use ServiceReadTrait;
}
