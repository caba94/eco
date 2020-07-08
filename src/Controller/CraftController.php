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
        $craft = new Craft();
        if ($req->request->count() > 0) {
           
            $craft->setName($req->request->get('craftName'));
            if ($req->request->get('raw1') != "") {
                $craft->setRaw1($repoRaw->findOneBy(['name' => $req->request->get('raw1')]));
                $craft->setQraw1($req->request->get('q1'));
            }
            // if ($req->request->get('raw2') != "") {
            //     $craft->setRaw2($repoRaw->findOneBy(['name' => $req->request->get('raw2')]));
            //     $craft->setQraw2($req->request->get('q3'));
            // }
            // if ($req->request->get('raw3') != "") {
            //     $craft->setRaw3($repoRaw->findOneBy(['name' => $req->request->get('raw3')]));
            //     $craft->setQraw3($req->request->get('q2'));
            // }
            $craft->setJob($repoJob->findOneBy(['name' => $req->request->get('job')]));
            
            $manager->persist($craft);
            $manager->flush();
        }

        $form = $this->createForm(CraftType::class,$craft);
        return $this->render('craft/addCraft.html.twig', [
            'raws' => $repoRaw->findAll(),
            'jobs' => $repoJob->findAll(),
            'Craft' => $form->createView(),
        ]);
    }
}
