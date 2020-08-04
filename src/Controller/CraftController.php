<?php

namespace App\Controller;

use App\Entity\Craft;
use App\Entity\Raw;
use App\Entity\RawCraft;
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
    public function addCraft(Request $req, EntityManagerInterface $manager, RawRepository $repoRaw, JobRepository $repoJob)
    {
        //dump($req);
        $craft = new Craft();
        $rawCraft1 = new RawCraft();
        $craft->getRawCrafts()->add($rawCraft1);
        $rawCraft2 = new RawCraft();
        $craft->getRawCrafts()->add($rawCraft2);
        $rawCraft3 = new RawCraft();
        $craft->getRawCrafts()->add($rawCraft3);


        $form = $this->createForm(CraftType::class, $craft);

        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $addcraft = new Craft();
            $addcraft->setName($craft->getName());
            $addcraft->setJob($craft->getJob());
            if ($rawCraft1->getQuantity() > 0) {
                $rawCraft1->setCraft($addcraft);
                $manager->persist($rawCraft1);
            }
            if ($rawCraft2->getQuantity() > 0) {
                $rawCraft2->setCraft($addcraft);
                $manager->persist($rawCraft2);
            }
            if ($rawCraft3->getQuantity() > 0) {
                $rawCraft3->setCraft($addcraft);
                $manager->persist($rawCraft3);
            }


            $manager->persist($addcraft);
            $manager->flush();
            $this->redirectToRoute('job', ['id' => $addcraft->getJob()->getID()]);
        }

        return $this->render('craft/addCraft.html.twig', [
            'raws' => $repoRaw->findAll(),
            'jobs' => $repoJob->findAll(),
            'Craft' => $form->createView(),
        ]);
    }


}
