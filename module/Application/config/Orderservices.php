<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="order_services")
 */
class Orderservices
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
     * @ORM\ManyToOne(targetEntity="Application\Entity\Orders", inversedBy="order_services")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Services", inversedBy="services")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     */
    protected $service;

    /**
     * @ORM\Column(name="price", type="decimal", precision=7, scale=2, nullable=true)
     */
    protected $price = 0;

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



