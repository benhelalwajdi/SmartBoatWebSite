<?php

namespace StationBundle\Controller;

use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use StationBundle\Entity\Station;
/*
use Symfony\Component\Form\Extension\Core\Type\TextType;
*/
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="station")
     */
    public function indexAction()
    {

        $repo = $this->getDoctrine()->getRepository( Station::class);
        $st = $repo->findAll();

        return $this->render('StationBundle:Default:indexStation.html.twig', [
            'st' => $st
        ]);
    }



    /**
     * @Route("/addstationpage", name="ajoutstationpage")
     */

    public function pageaddStAction()
    {
        return $this->render('StationBundle:Default:addstation.html.twig');
    }

    /**
     * @Route("/addstation", name="ajoutstation")
     */

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

            /*ajouter l'image sous le dossier img/station/ nom de l'image*/

            $station->setName($name);
            $station->setAdresse($adresse);
            $station->setNbrPlace($place);
            $station->setPays($pays);
            $station->setImage('img/station/'.$image);

            $em->persist($station);
            $em->flush();
            return $this->redirectToRoute('station');
        }
        return $this->redirectToRoute('ajoutstationpage');
    }


    /**
     * @Route("/editstationpage", name="modifstationpage")
     */

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

            /*ajouter l'image sous le dossier img/boat/ nom de l'image

            $repo = $this->getDoctrine()->getRepository(Station::class);
            $station = $repo->find($ID);


            $station->setName($name);
            $station->setAdresse($adresse);
            $station->setPlace($place);
            $station->setPays($pays);
            $station->setImage('img/station/'.$image);

            $em->persist($station);
            $em->flush();

            return $this->redirectToRoute('station');
        }
        return $this->render('StationBundle:Default:editStation.html.twig');
    }*/


    /**
     * @Route("/deletestation", name="supprimerstation")
     */

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


}
