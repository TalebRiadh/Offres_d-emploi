<?php


namespace App\Controller;

use App\Entity\Etablissement;
use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\EtablissementRepository;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     * @Route("/", name="app_home", methods={"GET"})
     *  */    
    public function index(OffreRepository $offreRepository): Response
    {
        $offres = $offreRepository->findBy([], ['createdAt' => 'DESC']);
        return $this->render('offres/index.html.twig', compact('offres'));
    }

    /**
     * @Route("/offres/create", name="app_offres_create", methods={"GET", "POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, EtablissementRepository $er): Response
    {
        $offre = new Offre;
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $etablissement = $er->findOneBy([]);
            $offre->setEtablissement($etablissement);
            $offre->setNumero();
            $em->persist($offre);
            $em->flush();

            $this->addFlash('sucess', 'Offre successfully created!');

            return $this->redirectToRoute('app_home');
        }
        return $this->render('offres/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/offres/{id<[0-9]+>}", name="app_offres_show", methods="GET")
     */
    public function show(Offre $offre): Response
    {
        return $this->render('offres/show.html.twig', compact('offre'));
    }


    /**
     * @Route("/offres/{id<[0-9]+>}/edit", name="app_offres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offre $offre, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(OffreType::class, $offre, [
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Offre successfully updated!');

            return $this->redirectToRoute('app_home');
        }
        return $this->render('offres/edit.html.twig', [
            'offre' => $offre,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/offres/{id<[0-9]+>}", name="app_offres_delete", methods={"POST"})
     */
    public function delete(Request $request, Offre $offre, EntityManagerInterface $em)
    {
        if($this->isCsrfTokenValid('offre_deletion_' . $offre->getId(), $request->request->get('csrf_token')))
        {
            $em->remove($offre);
            $em->flush();

            $this->addFlash('info', 'Offre successfully deleted!');
        }
        return $this->redirectToRoute('app_home');
    }




}