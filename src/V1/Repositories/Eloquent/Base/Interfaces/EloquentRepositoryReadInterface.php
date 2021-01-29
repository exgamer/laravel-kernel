<?php
namespace Citizenzet\Laravel\Core\V1\Repositories\Eloquent\Base\Interfaces;

use Citizenzet\Php\Core\Interfaces\DataReadInterface;
use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryReadInterface extends DataReadInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;
}