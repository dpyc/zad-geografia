<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class MyReefsController extends Controller
{
    /**
     * @Route("/reefs.html", name="reefs")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Reef')->findAll();
        return $this->render(
            'default/reefs.html.twig',
            array(
                'entities' => $entities,
            )
        );
    }
}