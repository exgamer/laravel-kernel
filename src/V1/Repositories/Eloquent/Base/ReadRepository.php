<?php

namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base;

use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Interfaces\EloquentRepositoryReadInterface;
use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits\RepositoryReadTrait;
use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits\RepositoryTrait;
use Citizenzet\Php\Core\Repositories\ReadRepository as Base;

/**
 * Class ReadRepository
 * @package App\Services\Base
 * @author citizenzet <exgamer@live.ru>
 */
abstract class ReadRepository extends Base implements EloquentRepositoryReadInterface
{
    use RepositoryTrait;
    use RepositoryReadTrait;
}
