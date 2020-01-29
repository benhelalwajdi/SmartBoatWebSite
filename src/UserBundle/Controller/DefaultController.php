<?php

namespace UserBundle\Controller;

use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
/*
use Symfony\Component\Form\Extension\Core\Type\TextType;
*/

class DefaultController extends Controller
{
    /**
     * @Route("/",name="user")
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $us = $repo->findAll();

        return $this->render('UserBundle:Default:indexuser.html.twig', [
            'us' => $us
        ]);
    }




/*
    /**
     * @Route("/addstationpage", name="ajoutstationpage")
     */
/*
    public function pageaddStAction()
    {
        return $this->render('StationBundle:Default:addstation.html.twig');
    }*/
/*
    /**
     * @Route("/addstation", name="ajoutstation")
     */
/*
    public function AjoutStAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == "POST") {
            $station = new Station();

            $name = $request->get('name');
            $adresse = $request->get('adresse');
            $place = $request->get('place');
            $pays = $request->get('pays');
            $image = $request->get('image');

            $station->setName($name);
            $station->setAdresse($adresse);
            $station->setNbrPlace($place);
            $station->setPays($pays);
            $station->setImage($image);

            $em->persist($station);
            $em->flush();
            return $this->redirectToRoute('station');
        }
        return $this->redirectToRoute('ajoutstationpage');
    }
*/
/*
    /**
     * @Route("/editstationpage", name="modifstationpage")
     */
/*
    public function pageeditStAction(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $ID = $request->get('edit');
        }

        $repo = $this->getDoctrine()->getRepository(Station::class);
        $st = $repo->find($ID);

        return $this->render('StationBundle:Default:editStation.html.twig', [
            "station" => $st
        ]);
    }
*/

    /*
     * @Route("/modifstation"", name="modifierstation")
     */
    /*
        public function ModifierStAction(Request $request)
        {

            $em = $this->getDoctrine()->getManager();

            if ($request->getMethod() == "POST") {


                $ID=$request->get('enrmodif');

                $name = $request->get('name');
                $adresse = $request->get('adresse');
                $place = $request->get('place');
                $pays = $request->get('pays');
                $image = $request->get('image');

                $repo = $this->getDoctrine()->getRepository(Station::class);
                $station = $repo->find($ID);


                $station->setName($name);
                $station->setAdresse($adresse);
                $station->setPlace($place);
                $station->setPays($pays);
                $station->setImage($image);

                $em->persist($station);
                $em->flush();

                return $this->redirectToRoute('station');
            }
            return $this->redirectToRoute('station');
        }*/
/*

    /**
     * @Route("/deletestation", name="supprimerstation")
     */
/*
    public function SupprimerBAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == "POST") {

            $ID = $request->get('delete');

            $repo = $this->getDoctrine()->getRepository(Station::class);
            $st = $repo->find($ID);

            $em->remove($st);
            $em->flush();

        }
        return $this->redirectToRoute('station');
    }

*/
}
