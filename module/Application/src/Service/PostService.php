<?php
/**
 * Created by PhpStorm.
 * User: armandoscribano
 * Date: 12/12/16
 * Time: 5:43 PM
 */

namespace Application\Service;


use Interop\Container\ContainerInterface;
use Application\Model\Bitly;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class PostService extends AbstractActionController
{
    protected $accesstoken;
    protected $apikey;
    protected $apisecret;
    protected $apiurl;
    protected $times;

    public function __construct($data)
    {
        $this->accesstoken  = $data->accesstoken;
        $this->apikey       = $data->apikey;
        $this->apisecret    = $data->apisecret;
        $this->apiurl       = $data->apiurl;
        $this->times        = $data->times;
    }

    public function bitlyMyURL( $longurl = null ){

        $bitly  = new Bitly();
        $params['access_token'] = $this->accesstoken;
        $params['longUrl']      = $longurl;
        return $bitly->bitly_get('shorten', $params);

    }

    public function sendSMS( $mobile, $message )
    {
        $client = new \Zend\Http\Client();
        $client->setAuth($this->apikey,
                        $this->apisecret,
                        \Zend\Http\Client::AUTH_BASIC);

        $client->setUri($this->apiurl.'/send-sms.json');
        $client->setMethod(\Zend\Http\Request::METHOD_POST);
        $client->setParameterPost(['message' => $message,
                                    'to' => $mobile]);
        return json_decode($client->send()->getContent(), true);
    }


}