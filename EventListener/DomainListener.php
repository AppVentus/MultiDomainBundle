<?php
namespace AppVentus\MultiDomainBundle\EventListener;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Routing\RequestContextAwareInterface;
use Doctrine\Orm\EntityManager;

class DomainListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function onDomainParse(Event $event)
    {
        $request = $event->getRequest();

        $this->em->getFilters()->getFilter('domain')
            ->setParameter('domain', $request->getHost())
            ->setEntityManager($this->em);
    }
}
