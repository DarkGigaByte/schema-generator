<?php


namespace SchemaOrg\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * A service provided by an organization, e.g. delivery service, print services, etc.
 * 
 * @see http://schema.org/Service Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 */
class Service extends Intangible
{
    /**
     * @type ServiceChannel $availableChannel A means of accessing the service (e.g. a phone bank, a web site, a location, etc.)
     * @ORM\ManyToOne(targetEntity="ServiceChannel")
     */
    private $availableChannel;
    /**
     * @type Thing $produces The tangible thing generated by the service, e.g. a passport, permit, etc.
     * @ORM\ManyToOne(targetEntity="Thing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produces;
    /**
     * @type AdministrativeArea $serviceArea The geographic area where the service is provided.
     * @ORM\ManyToOne(targetEntity="AdministrativeArea")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serviceArea;
    /**
     * @type Audience $serviceAudience The audience eligible for this service.
     * @ORM\ManyToOne(targetEntity="Audience")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serviceAudience;
    /**
     * @type string $serviceType The type of service being offered, e.g. veterans' benefits, emergency relief, etc.
     * @Assert\Type(type="string")
     * @ORM\Column
     */
    private $serviceType;
    /**
     * @type Person $provider The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.
     * @ORM\ManyToOne(targetEntity="Person")
     */
    private $provider;
}
