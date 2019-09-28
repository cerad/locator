<?php
declare(strict_types=1);

namespace App\ItemHandler;

use Symfony\Component\DependencyInjection\ServiceLocator;

/* ==============================================
 * This is a ServiceLocator implementation which
 * is configured in src/Kernel.php
 * and can then be injected via autowire without mods to services.yaml
 */
class ItemHandlersLocator2 extends ServiceLocator
{
    // Just to specify the return type to keep IDEs happy
    // Sadly, specify string for $id
    public function get($id) : ItemHandlerInterface
    {
        return parent::get($id);
    }
}