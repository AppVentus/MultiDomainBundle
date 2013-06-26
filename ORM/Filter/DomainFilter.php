<?php

namespace AppVentus\MultiDomainBundle\ORM\Filter;

use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\ORM\Mapping\ClassMetaData;

class DomainFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
	if (!$targetEntity->hasAssociation('domain')) {
	    return true;
	}
        $select = "SELECT d.id as id FROM Domain d WHERE d.id = ".$targetTableAlias.'.domain_id';


        return $select.' AND d.name = '. $this->getParameter('domain');
    }
}
