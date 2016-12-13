<?php
/**
 * Created by PhpStorm.
 * User: armandoscribano
 * Date: 13/12/16
 * Time: 9:48 AM
 */
namespace Application\Model;

class User
{
    public $accesstoken;
    public $apikey;
    public $apisecret;
    public $apiurl;
    public $times;

    public function exchangeArray($data)
    {
        $this->id           = (!empty($data['id'])) ? $data['id'] : null;
        $this->accesstoken  = (!empty($data['accesstoken'])) ? $data['accesstoken'] : null;
        $this->apikey       = (!empty($data['apikey'])) ? $data['apikey'] : null;
        $this->apisecret    = (!empty($data['apisecret'])) ? $data['apisecret'] : null;
        $this->apiurl       = (!empty($data['apiurl'])) ? $data['apiurl'] : null;
        $this->times        = (!empty($data['times'])) ? $data['times'] : null;
    }
}