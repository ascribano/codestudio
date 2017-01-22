<?php
namespace Application\Service;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Application\Entity\Categories;
use Zend\Crypt\Password\Bcrypt;
use Zend\Math\Rand;
use Doctrine\ORM\Query;

/**
 * The Category Manager service is responsible for adding new categories, updating
 * , deleting, etc.
 */
class CategoriesManager
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

    public function getList(){
        $categories = $this->entityManager->getRepository(Categories::class)->findAll();
        $ret = "";
        foreach($categories as $category)
        {
            $ret[]=[$category->getId(),
                    $category->getName()];
        }
        return $ret;
    }

    public function addCategory($data){

        $category = new Categories();
        $category->setName($data->name);
        $category->setDateCreated(new \DateTime("now"));

        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }

    public function editCategory($data){

        //there is a bug in the javascript I couldnt find for lack of time, so I wrote this line
        if(!$data->id){
            $this->addCategory($data);
        }else {
            $category = $this->entityManager->getReference(Categories::class, $data->id);
            $category->setName($data->name);

            $this->entityManager->persist($category);
            $this->entityManager->flush();
        }
    }

    public function deleteCategory($data){
        $category = $this->entityManager->getReference(Categories::class, $data->id);
        $this->entityManager->remove($category);

        // Apply changes to database.
        $this->entityManager->flush();

    }


}



