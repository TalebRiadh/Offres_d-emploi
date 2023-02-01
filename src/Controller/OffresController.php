<?php


namespace App\Controller;

use App\Entity\Etablissement;
use App\Entity\Offre;
use App\Form\EtablissementType;
use App\Form\OffreType;
use App\Repository\EtablissementRepository;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffresController extends AbstractController
{
    private $etablissementRepository;
    private $em;
    private $etablissement;

    public function __construct(EtablissementRepository $etablissementRepository, EntityManagerInterface $em){
        $this->etablissementRepository = $etablissementRepository;
        $this->em  = $em;
        $this->etablissement = $etablissementRepository->findOneBy([]);
    }

    /**
     * @Route("/", name="app_etablissement", methods={"GET","POST"})
     */
    public function etablissement(Request $request): Response
    {
        if($this->etablissement)
        {
            return $this->redirectToRoute('app_home');
        }
        $etablissement = new Etablissement;
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($etablissement);
            $this->em->flush();
            $this->addFlash('sucess', 'Etablissement successfully created!');
            return $this->redirectToRoute('app_home');
        }
        return $this->render('etablissement/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/offres", name="app_home", methods={"GET"})
     * */    
    public function index(OffreRepository $offreRepository): Response
    {        
        if($this->etablissement)
        {
            $offres = $offreRepository->findBy([], ['createdAt' => 'DESC']);
            return $this->render('offres/index.html.twig', compact('offres'));
        }
        return $this->redirectToRoute('app_etablissement');

    }

    /**
     * @Route("/offres/create", name="app_offres_create", methods={"GET", "POST"})
     */
    public function create(Request $request): Response
    {
        if(!$this->etablissement)
        {
            return $this->redirectToRoute('app_etablissement');
        }
        $offre = new Offre;
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $offre->setEtablissement($this->etablissement);
            $offre->setNumero();
            $this->em->persist($offre);
            $this->em->flush();

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
        if(!$this->etablissement)
        {
            return $this->redirectToRoute('app_etablissement');
        }
        return $this->render('offres/show.html.twig', compact('offre'));
    }


    /**
     * @Route("/offres/{id<[0-9]+>}/edit", name="app_offres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offre $offre): Response
    {
        if(!$this->etablissement)
        {
            return $this->redirectToRoute('app_etablissement');
        }
        $form = $this->createForm(OffreType::class, $offre, [
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
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
    public function delete(Request $request, Offre $offre)
    {
        if(!$this->etablissement)
        {
            return $this->redirectToRoute('app_etablissement');
        }
        if($this->isCsrfTokenValid('offre_deletion_' . $offre->getId(), $request->request->get('csrf_token')))
        {
            $this->em->remove($offre);
            $this->em->flush();

            $this->addFlash('info', 'Offre successfully deleted!');
        }
        return $this->redirectToRoute('app_home');
    }




}