<?php

namespace AppVentus\MultiDomainBundle\ORM\Filter;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\ORM\Mapping\ClassMetaData;
use AppVentus\MultiDomainBundle\Entity\Domain;

class DomainFilter extends SQLFilter
{
    protected $manager;

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$targetEntity->hasAssociation('domain')) {
            return true;
        }
        $tableName = $this->manager->getClassMetadata(Domain::class)->getTableName() ;
    
        $select = "SELECT d.id as id FROM `{$tableName}` d WHERE d.id = ".$targetTableAlias.'.domain_id';
        return $select.' AND d.name = '. $this->getParameter('domain');
    }

    public function setEntityManager ($em) {
        $this->manager = $em;
        return $this;
    }
}
