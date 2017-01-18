<?php
namespace Application\Service;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Application\Entity\Users;
use Application\Entity\Services;
use Zend\Crypt\Password\Bcrypt;
use Zend\Math\Rand;

/**
 * The Professional Manager service is responsible for adding new professionals, updating
 * , deleting, etc.
 */
class UsersManager
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

    public function getUserInfo($data){
        $user = $this->entityManager->getRepository(Users::class)
            ->findByEmail($data);
        return $user;
    }

    public function getServicesOffered($data){
        $services = $this->entityManager->getRepository(Services::class)->findAll();
        return $services;
    }

    /**
     * This method adds a new professional.
     */
    public function addNewUser($data)
    {
        // Create new Professional entity.
        //echo "--->".Users::STATUS_ACTIVE;die;
        $users = new Users();
        $users->setFullName($data['fullname']);
        $users->setEmail($data['email']);

        // Encrypt password and store the password in encrypted state.
        $bcrypt = new Bcrypt();
        $passwordHash = $bcrypt->create($data['password']);
        $users->setPassword($passwordHash);
        $users->setSource(Users::SOURCE_LOCAL);
        $users->setStatus(Users::STATUS_ACTIVE);
        $users->setType(Users::TYPE_PUBLIC);
        $users->setDateCreated(new \DateTime("now"));

        //var_dump($users);die;
        // Add the entity to entity manager.
        $this->entityManager->persist($users);
        
        // Apply changes to database.
        $this->entityManager->flush();
    }
    

}



