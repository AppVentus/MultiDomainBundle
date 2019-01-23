MultiDomainBundle
=================

This bundle provide multiple domain behavior for Symfony2 applications.

Installation
------------

add 
    
```json
{
    "require": {
        "appventus/multi-domain-bundle": "dev-master",
    }
}
```

in your composer.json
or `composer require appventus/multi-domain-bundle`

register the bundle adding it to your bundles.php file
```php
return [
	[...]
	AppVentus\MultiDomainBundle\AvMultiDomainBundle::class => ['all' => true],
];
```

and add the DomainTrait to all your domain managed entities:

```php
/**
* Page
*
* @ORM\Table()
* @ORM\Entity
*/
class Page
{
    use \AppVentus\MultiDomainBundle\Traits\DomainTrait;
    
    [...]
}
```
        
Annnnnnd, it's done !

Your Page entity will now be available only if his domain is the same as the request domain.

Have fun !
