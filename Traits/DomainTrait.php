<?php

namespace AppVentus\MultiDomainBundle\Traits;

use Doctrine\ORM\Mapping AS ORM;

trait DomainTrait
{

    /**
     *
     * @ORM\OneToOne(targetEntity="AppVentus\MultiDomainBundle\Entity\Domain")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     */
    protected $domain;

    /**
     * Set domain
     *
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
