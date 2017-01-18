<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Orders
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
     * @ORM\Column(name="address", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=60, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="appointment_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $appointment_date;

    /**
     * @var string
     *
     * @ORM\Column(name="appointment_place", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $appointment_place;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateCreated;

    /**
     * @var \Application\Entity\Hairdressers
     *
     * @ORM\OneToOne(targetEntity="Application\Entity\Hairdressers", mappedBy="hairdressers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hairdressers", referencedColumnName="id", unique=true, nullable=true)
     * })
     */
    private $hairdresser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Orderservices", mappedBy="orders")
     */
    private $orderservices;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderservices = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set address
     *
     * @param string $address
     *
     * @return Orders
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Orders
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Orders
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Orders
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Orders
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Orders
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Orders
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Orders
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
     * Set appointmentDate
     *
     * @param \DateTime $appointmentDate
     *
     * @return Orders
     */
    public function setAppointmentDate($appointmentDate)
    {
        $this->appointment_date = $appointmentDate;

        return $this;
    }

    /**
     * Get appointmentDate
     *
     * @return \DateTime
     */
    public function getAppointmentDate()
    {
        return $this->appointment_date;
    }

    /**
     * Set appointmentPlace
     *
     * @param string $appointmentPlace
     *
     * @return Orders
     */
    public function setAppointmentPlace($appointmentPlace)
    {
        $this->appointment_place = $appointmentPlace;

        return $this;
    }

    /**
     * Get appointmentPlace
     *
     * @return string
     */
    public function getAppointmentPlace()
    {
        return $this->appointment_place;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Orders
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
     * Set hairdresser
     *
     * @param \Application\Entity\Hairdressers $hairdresser
     *
     * @return Orders
     */
    public function setHairdresser(\Application\Entity\Hairdressers $hairdresser = null)
    {
        $this->hairdresser = $hairdresser;

        return $this;
    }

    /**
     * Get hairdresser
     *
     * @return \Application\Entity\Hairdressers
     */
    public function getHairdresser()
    {
        return $this->hairdresser;
    }

    /**
     * Add orderservice
     *
     * @param \Application\Entity\Orderservices $orderservice
     *
     * @return Orders
     */
    public function addOrderservice(\Application\Entity\Orderservices $orderservice)
    {
        $this->orderservices[] = $orderservice;

        return $this;
    }

    /**
     * Remove orderservice
     *
     * @param \Application\Entity\Orderservices $orderservice
     */
    public function removeOrderservice(\Application\Entity\Orderservices $orderservice)
    {
        $this->orderservices->removeElement($orderservice);
    }

    /**
     * Get orderservices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderservices()
    {
        return $this->orderservices;
    }
}

