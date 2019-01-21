<?php

namespace Modules\IcommerceFlatrate\Repositories\Cache;

use Modules\IcommerceFlatrate\Repositories\ConfigflatrateRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheConfigflatrateDecorator extends BaseCacheDecorator implements ConfigflatrateRepository
{
    public function __construct(ConfigflatrateRepository $configflatrate)
    {
        parent::__construct();
        $this->entityName = 'icommerceflatrate.configflatrates';
        $this->repository = $configflatrate;
    }
}
