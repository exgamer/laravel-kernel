<?php
namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Interfaces;

use Citizenzet\Php\Core\Interfaces\DataModifyInterface;

interface EloquentRepositoryModifyInterface extends DataModifyInterface
{
    public function deleteById($id);
    public function updateById($id, $data);
}