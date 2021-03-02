<?php

namespace Citizenzet\Laravel\Core\V1\DataProcessor;

use Citizenzet\Laravel\Core\V1\Services\Base\Service;
use Citizenzet\Php\Core\DataProcessor\DataProcessor;
use Illuminate\Database\Eloquent\Builder;

abstract class DbDataProcessor extends DataProcessor
{
    /**
     * @var Service
     */
    public $service;

    public function setupQuery($query)
    {
        $this->dataHandler->setupQuery($query);
    }

    /**
     *  get rows by sql
     */
    protected function executeQuery()
    {
        $offset = $this->pageSize * (int) ($this->currentPage);
        $rows = $this->service->allByCondition(function (Builder $query) use($offset) {
            $this->setupQuery($query);
            $query->skip($offset);
            $query->take($this->pageSize);
        });

        if (! $rows ){
            $this->isDone = true;
        }

        if ($this->currentPage+1 == $this->pageCount ){
            $this->isDone = true;
        }

        if(! $this->totalCount) {
            $this->totalCount = $this->service->countByCondition(function (Builder $query) {
                $this->setupQuery($query);
            });
            $this->pageCount = ceil($this->totalCount/$this->pageSize);
        }

        $this->currentPage +=1;

        return $rows;
    }
}