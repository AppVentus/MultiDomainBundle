<?php
namespace AppVentus\MultiDomainBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
* PrePersistSubscriber
*/
class PrePersistSubscriber implements EventSubscriber
{
    /**
     * @var Symfony\Component\DependencyInjection\ContainerInterface;
     */
    private $container;

    /**
     * We inject the service container in the constructor
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * List of event we are listening
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist
        );
    }


    /**
     * undocumented function
     *
     * @param LifecycleEventArgs $args
     * @return void
     **/
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (method_exists($entity, "setDomain")) {
            $em = $this->container->get('doctrine.orm.entity_manager');
            // $hostName = $em->getFilters()->getFilter('domain')->getParameter('domain');
            $hostName = $this->container->get('request')->getHost();
            // print_r($hostName);exit;
            $host = $em->getRepository('AvMultiDomainBundle:Domain')->findOneByName($hostName);
            $entity->setDomain($host);
        }

    }


}
