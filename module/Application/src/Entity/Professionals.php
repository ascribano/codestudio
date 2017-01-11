<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* This class represents a single post in a blog.
* @ORM\Entity
* @ORM\Table(name="professionals")
*/
class Professionals
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id")
    */
    protected $id;

    /**
    * @ORM\Column(name="fullname")
    */
    protected $fullname;

    /**
    * @ORM\Column(name="email")
    */
    protected $email;

    /**
    * @ORM\Column(name="mobile")
    */
    protected $mobile;

    /**
     * @ORM\Column(name="address")
     */
    protected $address;

    /**
     * @ORM\Column(name="city")
     */
    protected $city;

    /**
     * @ORM\Column(name="country")
     */
    protected $country;

    /**
     * @ORM\Column(name="username")
     */
    protected $username;

    /**
     * @ORM\Column(name="password")
     */
    protected $password;

    /**
    * @ORM\Column(type="datetime", name="date_created")
    */
    protected $dateCreated;

    // Returns ID of this professional.
    public function getId()
    {
        return $this->id;
    }

    // Sets ID of this professional.
    public function setId($id)
    {
        $this->id = $id;
    }

    // Returns fullname of this professional.
    public function getFullname()
    {
        return $this->fullname;
    }

    // Sets fullname of this professional.
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    // Returns email of this professional.
    public function getEmail()
    {
        return $this->email;
    }

    // Sets email of this professional.
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Returns mobile of this professional.
    public function getmobile()
    {
        return $this->mobile;
    }

    // Sets mobile of this professional.
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    // Returns address of this professional.
    public function getAddress()
    {
        return $this->address;
    }

    // Sets address of this professional.
    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Returns city of this professional.
    public function getCity()
    {
        return $this->city;
    }

    // Sets city of this professional.
    public function setCity($city)
    {
        $this->city = $city;
    }

    // Returns country of this professional.
    public function getCountry()
    {
        return $this->country;
    }

    // Sets country of this professional.
    public function setCountry($country)
    {
        $this->country = $country;
    }

    // Sets username of this professional.
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Returns username of this professional.
    public function getUsername()
    {
        return $this->username;
    }

    // Sets password of this professional.
    public function setPassword($password)
    {
        $this->password = $password;
    }
    // Returns password of this professional.
    public function getPassword()
    {
        return $this->password;
    }

    // Returns the date when this post was created.
    public function getDateCreated()
    {
    return $this->dateCreated;
    }

    // Sets the date when this post was created.
    public function setDateCreated($dateCreated)
    {
    $this->dateCreated = $dateCreated;
    }
}