<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Club;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="app_evenement")
     */
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }
    /**
    * @Route("/addevt", name="add_evt")
    */
public function addevt(Request $request): Response
{
$evenement = new Evenement() ;
$form = $this->createForm(EvenementType::class , $evenement) ;
$form->handleRequest($request) ;
$em = $this->getDoctrine()->getManager() ;
$evenmentafter = $evenement->setNbParticipants(0);    
if($form->isSubmitted() && $form->isValid())
{
$em->persist($evenement);
$em->flush();
return $this->redirect("/getAllevt");
}
return $this->render('evenement/addevt.html.twig' , [
'formevt' => $form->createView() , 'evenmentafter'=>$evenmentafter
] );
}

/**
* @Route("/getAllevt", name="get_all_evt")
*/
public function getAllevt(EvenementRepository $repository, Request $request): Response
{
$evts = $repository->findAll() ;
$search = $request->query->get('search');
if ($search) {
    $em = $this->getDoctrine()->getManager()->getRepository(Evenement::class);
     $evts = $em->search($search) ;
}
return $this->render('evenement/list.html.twig' , [
'evts' => $evts,

]);
}


   /**
     * @Route("/evenementfelicitaion/{id}", name="evenement_feli")
     */
    public function felicitation(Request $req, $id, Evenement  $entity): Response
    {        $em = $this->getDoctrine()->getManager();
             $evenment2 = $entity->getNbParticipants();    
             $evenmentafter = $entity->setNbParticipants( $evenment2 +1);    
             $evenment2 = $entity->getNbParticipants();  
             $em->flush();  
             return $this->render('evenement/felicitation.html.twig' , [
             'evenment2' => $evenment2,
            
            ]);
    }
    




}
