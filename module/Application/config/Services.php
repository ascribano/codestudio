<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="services")
 */
class Services
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
     * @ORM\Column(name="category", type="string", length=45, nullable=false)
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $dateCreated;
    
    /**
     * Returns user ID.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Sets user ID. 
     * @param int $id    
     */
    public function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * Returns category.
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets category.
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    /**
     * Returns Name.
     * @return string     
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns Name.
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    
    /**
     * Returns description.
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets status.
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the date of user creation.
     * @return string     
     */
    public function getDateCreated() 
    {
        return $this->dateCreated;
    }
    
    /**
     * Sets the date when this user was created.
     * @param datetime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

}



