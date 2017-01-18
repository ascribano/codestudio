<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="hairdressers")
 */
class Hairdressers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=false)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=false)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=20, nullable=false)
     */
    protected $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=60, nullable=false)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=60, nullable=false)
     */
    protected $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=60, nullable=false)
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=60, nullable=true)
     */
    protected $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    protected $comments;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $dateCreated;
    


}



