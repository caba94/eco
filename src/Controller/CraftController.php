<?php

namespace App\Controller;

use App\Entity\Craft;
use App\Entity\Raw;
use App\Form\CraftType;
use App\Repository\JobRepository;
use App\Repository\RawRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class CraftController extends AbstractController
{
    /**
     * @Route("/addCraft", name="addCraft")
     */
    public function addCraft(Request $req, EntityManagerInterface $manager, RawRepository $repoRaw,JobRepository $repoJob)
    {
        //dump($req);
        $craft = new Craft();
        
        $form = $this->createForm(CraftType::class,$craft);
        
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($craft);
            $manager->flush();

            $this->redirectToRoute('item',$craft->getId());
        }

        return $this->render('craft/addCraft.html.twig', [
            'raws' => $repoRaw->findAll(),
            'jobs' => $repoJob->findAll(),
            'Craft' => $form->createView(),
        ]);
    }

    /**
     * @Route("/item/{id}",name="item")
     */
    public function itemView(Craft $craft){
        return $this->render('craft/item.html.twig',[
            'craft'=> $craft
        ]);
    }

}
