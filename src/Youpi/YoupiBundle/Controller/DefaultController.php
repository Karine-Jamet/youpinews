<?php

namespace Youpi\YoupiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YoupiBundle:Default:index.html.twig');
    }
}
