<?php

namespace AppVentus\MultiDomainBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AvMultiDomainBundle extends Bundle
{
    public function boot()
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $conf = $em->getConfiguration();
        $conf->addFilter(
            'domain',
            'AppVentus\MultiDomainBundle\ORM\Filter\DomainFilter'
        );

        $em->getFilters()->enable('domain');
        // $em->getFilters()->enable('domain')->setParameter(
        //     'domain',
        //     $this->container->getParameter('domain')
        // );
    }
}
