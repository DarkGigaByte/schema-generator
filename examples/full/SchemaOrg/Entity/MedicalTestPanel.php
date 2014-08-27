<?php


namespace SchemaOrg\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Any collection of tests commonly ordered together.
 * 
 * @see http://schema.org/MedicalTestPanel Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 */
class MedicalTestPanel extends MedicalTest
{
    /**
     * @type MedicalTest $subTest A component test of the panel.
     * @ORM\ManyToOne(targetEntity="MedicalTest")
     */
    private $subTest;
}