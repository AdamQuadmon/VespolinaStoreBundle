<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\StoreBundle\EventListener;

use Symfony\Component\DependencyInjection\Container;
use Vespolina\CartBundle\Event\CartEvent;
use Vespolina\Entity\OrderInterface;

class CartListener
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Called when a cart is initialized
     *
     * @param CartEvent $event
     */
    public function onCartInit(CartEvent $event)
    {
        $store = $this->container->get('vespolina.store.store_resolver')->getStore();
        $cart = $event->getCart();

        if ($store->getTaxationEnabled() ) {

            $cart->addAttribute('taxation_enabled', true);
        }
    }
}