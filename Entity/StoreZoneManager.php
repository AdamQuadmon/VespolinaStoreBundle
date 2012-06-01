<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\StoreBundle\Entity;

use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\EntityManager;

use Vespolina\StoreBundle\Entity\Store;
use Vespolina\StoreBundle\Model\StoreZoneInterface;
use Vespolina\StoreBundle\Model\StoreZoneManager as BaseStoreZoneManager;
/**
 * @author Daniel Kucharski <daniel@xerias.be>
 * @author Richard Shank <develop@zestic.com>
 */
class StoreZoneManager extends BaseStoreZoneManager
{
    protected $storeZoneClass;
    protected $storeZoneRepo;
    protected $em;

    public function __construct(EntityManager $em, $storeZoneClass)
    {
        $this->em = $em;

        $this->storeZoneClass = $storeZoneClass;
        $this->storeZoneRepo = $this->em->getRepository($storeZoneClass);

        parent::__construct($storeZoneClass);
    }

    /**
     * @inheritdoc
     */
    public function findStoreById($id)
    {
        return $this->storeRepo->find($id);
    }

    /**
     * @inheritdoc
     */
    public function updateStoreZone(StoreZoneInterface $storeZone, $andFlush = true)
    {
        $this->em->persist($storeZone);
        if ($andFlush) {
            $this->em->flush();
        }
    }
}
