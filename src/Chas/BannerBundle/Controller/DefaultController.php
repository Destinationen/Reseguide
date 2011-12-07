<?php

namespace Chas\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ChasBannerBundle:Default:index.html.twig');
    }
}
