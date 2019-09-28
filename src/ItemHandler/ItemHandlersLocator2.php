<?php
declare(strict_types=1);

namespace App\ItemHandler;

use Symfony\Component\DependencyInjection\ServiceLocator;

class ItemHandlersLocator2 extends ServiceLocator
{
    public function get($id) : ItemHandlerInterface
    {
        return parent::get($id);
    }
}