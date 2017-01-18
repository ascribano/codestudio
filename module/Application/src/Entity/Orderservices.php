<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orderservices
 *
 * @ORM\Table(name="order_services")
 * @ORM\Entity
 */
class Orderservices
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=7, scale=2, nullable=true, unique=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateCreated;

    /**
     * @var \Application\Entity\Orders
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Orders", inversedBy="order_services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $order;

    /**
     * @var \Application\Entity\Services
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Services", inversedBy="services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $service;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Orderservices
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Orderservices
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Orderservices
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set order
     *
     * @param \Application\Entity\Orders $order
     *
     * @return Orderservices
     */
    public function setOrder(\Application\Entity\Orders $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Application\Entity\Orders
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set service
     *
     * @param \Application\Entity\Services $service
     *
     * @return Orderservices
     */
    public function setService(\Application\Entity\Services $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Application\Entity\Services
     */
    public function getService()
    {
        return $this->service;
    }
}

