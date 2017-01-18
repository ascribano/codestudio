<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class Users
{
    // User status constants.
    const STATUS_ACTIVE       = 1; // Active user.
    const STATUS_RETIRED      = 2; // Retired user.

    const TYPE_PUBLIC       = 1;
    const TYPE_HAIRDRESSER  = 2;
    const TYPE_ADMIN        = 3;

    const SOURCE_LOCAL      = 1; //LOCAL
    const SOURCE_FACEBOOK   = 2; //FACEBOOK
    const SOURCE_GOOGLE     = 3; //GOOGLE

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
     * @ORM\Column(name="email", type="string", length=45)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=45)
     */
    protected $fullName;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=false)
     */
    protected $password;

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    protected $status;

    /**
     * @var integer $type
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    protected $type;

    /**
     * @var integer $source
     *
     * @ORM\Column(name="source", type="integer", nullable=false)
     */
    protected $source;

    /**
     * @var integer $source
     *
     * @ORM\Column(name="access_token", type="string", length=60, nullable=true)
     */
    protected $access_token;
    
    /**
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $dateCreated;
        
    /**
     * @ORM\Column(name="pwd_reset_token", type="string", length=200, nullable=true)
     */
    protected $passwordResetToken;
    
    /**
     * @ORM\Column(name="pwd_reset_token_creation_date", type="datetime", nullable=true)
     */
    protected $passwordResetTokenCreationDate;
    
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
     * Returns email.     
     * @return string
     */
    public function getEmail() 
    {
        return $this->email;
    }

    /**
     * Sets email.     
     * @param string $email
     */
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    
    /**
     * Returns full name.
     * @return string     
     */
    public function getFullName() 
    {
        return $this->fullName;
    }

    /**
     * Returns full name.
     * @return string
     */
    public function getName()
    {
        $name = explode(" ", $this->fullName);
        return $name[0];
    }

    /**
     * Sets full name.
     * @param string $fullName
     */
    public function setFullName($fullName) 
    {
        $this->fullName = $fullName;
    }
    
    /**
     * Returns status.
     * @return int     
     */
    public function getStatus() 
    {
        return $this->status;
    }

    /**
     * Returns possible statuses as array.
     * @return array
     */
    public static function getStatusList() 
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_RETIRED => 'Retired'
        ];
    }    
    
    /**
     * Returns user status as string.
     * @return string
     */
    public function getStatusAsString()
    {
        $list = self::getStatusList();
        if (isset($list[$this->status]))
            return $list[$this->status];
        
        return 'Unknown';
    }    
    
    /**
     * Sets status.
     * @param int $status     
     */
    public function setStatus($status) 
    {
        $this->status = $status;
    }

    /**
     * Sets source.
     * @param int $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Returns source.
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Returns status.
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns possible statuses as array.
     * @return array
     */
    public static function getTypeList()
    {
        return [
            self::TYPE_PUBLIC => 'public',
            self::TYPE_HAIRDRESSER => 'hairdresser',
            self::TYPE_ADMIN => 'admin'
        ];
    }

    /**
     * Returns user type as string.
     * @return string
     */
    public function getTypeAsString()
    {
        $list = self::getTypeList();
        if (isset($list[$this->type]))
            return $list[$this->type];

        return 'Unknown';
    }

    /**
     * Sets status.
     * @param int $status
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * Returns password.
     * @return string
     */
    public function getPassword() 
    {
       return $this->password; 
    }
    
    /**
     * Sets password.     
     * @param string $password
     */
    public function setPassword($password) 
    {
        $this->password = $password;
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
    
    /**
     * Returns password reset token.
     * @return string
     */
    public function getResetPasswordToken()
    {
        return $this->passwordResetToken;
    }
    
    /**
     * Sets password reset token.
     * @param string $token
     */
    public function setPasswordResetToken($token) 
    {
        $this->passwordResetToken = $token;
    }
    
    /**
     * Returns password reset token's creation date.
     * @return string
     */
    public function getPasswordResetTokenCreationDate()
    {
        return $this->passwordResetTokenCreationDate;
    }
    
    /**
     * Sets password reset token's creation date.
     * @param string $date
     */
    public function setPasswordResetTokenCreationDate($date) 
    {
        $this->passwordResetTokenCreationDate = $date;
    }
}



