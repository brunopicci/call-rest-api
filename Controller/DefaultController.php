<?php

namespace Services\Bundle\Rest\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * This class render the Controller
 *
 * Class DefaultController
 * @package Services\Bundle\Rest\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     *
     * @return mixed
     */
    public function indexAction()
    {
        return $this->render('ServicesBundle:Default:index.html.twig');
    }
}
