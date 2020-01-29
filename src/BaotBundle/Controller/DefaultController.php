<?php

namespace BaotBundle\Controller;

use BaotBundle\Entity\Boat;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/*use Symfony\Component\Form\Extension\Core\Type\TextType;*/
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="boat")
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository(Boat::class);
        $bt = $repo->findAll();
        return $this->render('BaotBundle:Default:indexboat.html.twig',[
            'bt' => $bt
        ]);
    }

    /**
     * @Route("/addboatpage", name="ajoutboatpage")
     */
    public function pageaddBAction()
    {
        return $this->render('BaotBundle:Default:addbateau.html.twig');
    }

    /**
     * @Route("/addboat", name="ajoutboat")
     */

    public function AjoutBAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if($request->getMethod()=="POST")
        { $boat = new Boat();

            $name=$request->get('name');
            $numero=$request->get('numero');
            $longeur=$request->get('longeur');
            $largeur=$request->get('largeur');
            $place=$request->get('place');
            $specialite=$request->get('specialite');
            $image=$request->get('image');

            /*ajouter l'image sous le dossier img/boat/ nom de l'image*/

            $boat->setName($name);
            $boat->setNumero($numero);
            $boat->setLongeur($longeur);
            $boat->setLargeur($largeur);
            $boat->setPlace($place);
            $boat->setSpecialite($specialite);
            $boat->setImage('img/boat/'.$image);

            $em->persist($boat);
            $em->flush();
            return $this->redirectToRoute('boat');
        }
        return $this->redirectToRoute('ajoutboatpage');
    }


    /**
     * @Route("/editboatpage", name="modifboatpage")
     */

    public function pageeditAction(Request $request)
    {
        if($request->getMethod()=="POST")
        {
            $ID=$request->get('edit');
        }

        $repo = $this->getDoctrine()->getRepository(Boat::class);
        $bt = $repo->find($ID);

        return $this->render('BaotBundle:Default:editbateau.html.twig',[
            "bateau" => $bt
        ]);
    }


    /**
     * @Route("/modifboat", name="modifierboat")
     */
// update method
    public function ModifierBAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        if($request->getMethod()=="POST")
        {

            $ID=$request->get('enrmodif');
            $name=$request->get('name');
            $numero=$request->get('numero');
            $longeur=$request->get('longeur');
            $largeur=$request->get('largeur');
            $place=$request->get('place');
            $specialite=$request->get('specialite');
            $image=$request->get('image');

            /*ajouter l'image sous le dossier img/boat/ nom de l'image*/

            $repo = $this->getDoctrine()->getRepository(Boat::class);
            $bt = $repo->find($ID);

            $bt->setName($name);
            $bt->setNumero($numero);
            $bt->setLongeur($longeur);
            $bt->setLargeur($largeur);
            $bt->setPlace($place);
            $bt->setSpecialite($specialite);
            $bt->setImage('img/boat/'.$image);

            $em->persist($bt);
            $em->flush();

            return $this->redirectToRoute('boat');
        }
        return $this->render('BaotBundle:Default:editbateau.html.twig');
    }


    /**
     * @Route("/deleteboat", name="supprimerboat")
     */

    public function SupprimerBAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        if($request->getMethod()=="POST")
        {

            $ID=$request->get('delete');

            $repo = $this->getDoctrine()->getRepository(Boat::class);
            $bt = $repo->find($ID);

            $em->remove($bt);
            $em->flush();

        }
        return $this->redirectToRoute('boat');
    }


}
