<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    private $itemHandlersIterable;
    private $itemHandlersLocatorByKey;
    private $itemHandlersLocatorByClass;

    public function __construct(
        iterable $itemHandlersIterable,
        ServiceLocator $itemHandlersLocatorByClass,
        ServiceLocator $itemHandlersLocatorByKey
    )
    {
        $this->itemHandlersIterable = $itemHandlersIterable;
        $this->itemHandlersLocatorByClass = $itemHandlersLocatorByClass;
        $this->itemHandlersLocatorByKey = $itemHandlersLocatorByKey;
    }

    public function index() : Response
    {
        //dump($this->itemHandlersLocatorByKey);

        $itemHandlerClasses = 'Classes ';
        foreach($this->itemHandlersIterable as $itemHandler) {
            $itemHandlerClasses .= get_class($itemHandler) . ' ';
        }

        $oneClass = get_class($this->itemHandlersLocatorByClass->get('App\ItemHandler\OneItemHandler'));

        $twoClass = get_class($this->itemHandlersLocatorByKey->get('two'));

        $html = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head><title>Locator</title></head>
<body>
<h1>Locator</h1>
<p>{$itemHandlerClasses}</p>
<p>{$oneClass}</p>
<p>{$twoClass}</p>
</body>
</html>
EOT;
        return new Response($html);
    }
}