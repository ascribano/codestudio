<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\UserTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\MobileForm;
use Application\Service\PostService;


class IndexController extends AbstractActionController
{
    protected $data;
    protected $table;

    public function __construct(UserTable $table)
    {
        $this->table = $table;
        $this->data  = $table->get(1);
    }

    public function indexAction()
    {
        $postservice = new PostService($this->data);

        $form = new MobileForm();
        $form->get('submit')->setValue('Send SMS');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()){
                //Get url from message
                preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
                    $this->getRequest()->getPost('message'),
                    $longurl);

                //Get minified url
                $res = $postservice->bitlyMyURL(@$longurl[0][0]);

                //replace domains
                $message = str_replace(@$longurl[0][0],
                    @$res['data']['url'],
                    $this->getRequest()->getPost('message'));

                $send = $postservice->sendSMS($this->getRequest()->getPost('mobile'),
                                                $message);

                $this->data->times = $send['error']['code']=='SUCCESS' ? $this->data->times + 1 : $this->data->times;
                $this->table->save($this->data);

                //avoid refresh page and escape validation
                if ($this->data->times == 3 ) $this->redirect()->toUrl('/');
            }

        }

        return ['mobile'    => @$this->getRequest()->getPost('mobile'),
                'message'   => @$message,
                'result'    => @$send['error']['code'],
                'times'     => $this->data->times,
                'form'      => $form];

    }
}
