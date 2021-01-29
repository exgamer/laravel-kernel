<?php

namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base;

use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Interfaces\EloquentRepositoryInterface;
use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits\RepositoryModifyTrait;
use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits\RepositoryReadTrait;
use Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Traits\RepositoryTrait;
use Citizenzet\Php\Core\Repositories\CrudRepository as Base;

/**
 * Class ReadRepository
 * @package App\Services\Base
 * @author citizenzet <exgamer@live.ru>
 */
abstract class CrudRepository extends Base implements EloquentRepositoryInterface
{
    use RepositoryTrait;
    use RepositoryReadTrait;
    use RepositoryModifyTrait;
}
