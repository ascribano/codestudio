<?php
/**
 * Created by PhpStorm.
 * User: armandoscribano
 * Date: 12/12/16
 * Time: 5:43 PM
 */

namespace Application\Service;

use Application\Model\Bitly;

class PostService
{
    const ACCESS_TOKEN  = 'c041ec00cdfa5cefe8bda46afaa996bb038527a4';
    const API_KEY       = 'cddd0f7a6282d6dddbe6a3fc465b6ec4';
    const API_SECRET    = 'apisecretkey';
    const API_URL       = 'http://api.transmitsms.com';

    public function bitlyMyURL( $longurl ){

        $bitly  = new Bitly();
        $params['access_token'] = self::ACCESS_TOKEN;
        $params['longUrl']      = $longurl;
        return $bitly->bitly_get('shorten', $params);

    }

    public function sendSMS($mobile, $message)
    {
        $client = new \Zend\Http\Client();
        $client->setAuth(self::API_KEY, self::API_SECRET, \Zend\Http\Client::AUTH_BASIC);
        $client->setUri(self::API_URL.'/send-sms.json');
        $client->setMethod(\Zend\Http\Request::METHOD_POST);
        $client->setParameterPost(['message' => $message,
                                    'to' => $mobile]);
        return json_decode($client->send()->getContent(), true);
    }

}