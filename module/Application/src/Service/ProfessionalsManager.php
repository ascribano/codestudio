<?php
namespace Application\Service;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Application\Entity\Professionals;
use Application\Entity\Comment;
use Application\Entity\Tag;
use Zend\Filter\StaticFilter;

/**
 * The Professional Manager service is responsible for adding new professionals, updating
 * , deleting, etc.
 */
class ProfessionalsManager
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager;
     */
    private $entityManager;
    
    /**
     * Constructor.
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * This method adds a new professional.
     */
    public function addNewProfessional($data)
    {
        // Create new Professional entity.
        $pro = new Professionals();
        $pro->setFullname($data['fullname']);
        $pro->setEmail($data['email']);
        $pro->setMobile($data['mobile']);
        $pro->setAddress($data['address']);
        $pro->setCity($data['city']);
        $pro->setCountry($data['country']);
        $pro->setUsername($data['username']);
        $pro->setPassword(md5($data['password']));
        $currentDate = date('Y-m-d H:i:s');
        //s$pro->setDateCreated($currentDate);
        
        // Add the entity to entity manager.
        $this->entityManager->persist($pro);
        
        // Apply changes to database.
        $this->entityManager->flush();
    }
    

}



