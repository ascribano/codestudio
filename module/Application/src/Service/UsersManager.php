<?php
namespace Application\Service;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Application\Entity\Users;
use Application\Entity\Services;
use Application\Entity\Orderservices;
use Application\Entity\Orders;
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
    public function __construct($entityManager, $authService)
    {
        $this->authService = $authService;
        $this->entityManager = $entityManager;
    }

    public function getUserInfo($data){
        $user = $this->entityManager->getRepository(Users::class)
            ->findOneByEmail($data);
        return $user;
    }

    public function getServicesOffered(){
        $services = $this->entityManager->getRepository(Services::class)->findAll();
        return $services;
    }

    /**
     * This method adds a new professional.
     */
    public function addNewUser($data)
    {
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

        $this->entityManager->persist($users);
        
        // Apply changes to database.
        $this->entityManager->flush();
    }

    public function addNewOrder($data){

        $userinfo = $this->getUserInfo($this->authService->getIdentity());
        $user = $this->entityManager->getReference(Users::class, $userinfo->getId());
        $order = new Orders();
        $order->setUser($user);
        $order->setAddress($data['address']);
        $order->setPostalCode($data['postal_code']);
        $order->setCity($data['city']);
        $order->setState($data['state']);
        $order->setCountry($data['country']);
        $order->setMobile($data['mobile']);
        $order->setComments($data['comments']);
        $order->setStatus(Orders::ORDER_SERVICE);
        $order->setDateCreated(new \DateTime("now"));

        $this->entityManager->persist($order);

        $this->addOrderServices($data['services'], $order);

        // Apply changes to database.
        $this->entityManager->flush();
    }

    public function addOrderServices($arrservices, $order)
    {

        foreach ($arrservices as $rowservice) {
            $service = $this->entityManager->getReference(Services::class, $rowservice);
            $os = new Orderservices();
            $os->setOrder($order);
            $os->setService($service);
            $os->setDateCreated(new \DateTime("now"));
            $this->entityManager->persist($os);

            $order->addOrderservice($os);
        }
    }
    

}



