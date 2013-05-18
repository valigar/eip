<?php

namespace User\BlocNoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityRepository;

use Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle;
use User\BlocNoteBundle\Entity\BlocNote;
use User\BlocNoteBundle\Form\BlocNoteType;
use User\BlocNoteBundle\Entity\report;

class DefaultController extends Controller
{
    /**
     * @Route("/bloc_note")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $securityContext = $this->container->get('security.context');

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserBlocNoteBundle:BlocNote');

        $noteExist = $repository->findOneBy(array('userId' => $user->getId()));

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        if ($request->getMethod() == 'GET') {

            $noteExist = $repository->findOneBy(array('userId' => $user->getId()));

            if ($noteExist) {

                $query = $em->createQuery(
                    'SELECT p.noteContent FROM UserBlocNoteBundle:BlocNote p WHERE p.userId = ' . $user->getId());
                $content = $query->getResult();
                //var_dump($content[0]['noteContent']);

                if ($content) {

                    $form = $this->createForm(
                        new BlocNoteType()
                    );
                    return array('user' => $user->getId(), 'form' => $form->createView(), 'content' => $content[0]['noteContent']);
                }
            }
        }

        if ($noteExist) {

            $form = $this->createForm(
                new BlocNoteType(),
                $noteExist
            );


            $form->bindRequest($request);

            if ('POST' == $request->getMethod()) {

                $editorContent = $this->getRequest('post')->get("user_blocnotebundle_blocnotetype");

                $noteExist->setUpdatedAt(new \DateTime('now'));
                $noteExist->setNoteContent($editorContent['noteContent']);

                $em->flush();

            }
            return array('user' => $user->getId(), 'form' => $form->createView());
        }

        $note = new BlocNote();


        $note->setCreatedAt(new \DateTime('now'));
        $note->setUserId($user->getId());

        $form = $this->createForm(
            new BlocNoteType(),
            $note
        );

        $request = $this->getRequest();


        $form->bindRequest($request);

        if ('POST' == $request->getMethod()) {
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }

        return array('user' => $user->getId(), 'form' => $form->createView());
    }

    /**
     * @Route("/bloc_note/show/{id}", name="user_blocnote_default_show")
     * @Template()
     */
    public function showAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserBlocNoteBundle:BlocNote');

        if ($request->getMethod() == 'GET') {

            $id = $request->get('id');

            $query = $em->createQuery(
                'SELECT p.noteContent, p.id FROM UserBlocNoteBundle:BlocNote p WHERE p.userId = ' . $id);
            $content = $query->getResult();

            $noteId = $content[0]['id'];
        }

        return $this->render('UserBlocNoteBundle:Default:show.html.twig', array('content' => $content[0]['noteContent'], 'user' =>$id));
    }

    /**
     * @Route("/bloc_note/report/{id}", name="user_blocnote_default_report")
     * @Template()
     */
    public function reportAction($id)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserBlocNoteBundle:BlocNote');

        if ($request->getMethod() == 'GET') {

            //$id = $request->get('id');

            $query = $em->createQuery(
                'SELECT p.noteContent, p.id FROM UserBlocNoteBundle:BlocNote p WHERE p.userId = ' . $id);
            $content = $query->getResult();

            $noteId = $content[0]['id'];

            //$report = $em->getRepository('UserBlocNoteBundle:Report');

            $report = new Report();

            $report->setUserId($id);
            $report->setNoteId($noteId);
            $report->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($report);
            $em->flush();

            $this->get('session')->setFlash(
                'notice',
                '<br />Votre Rapport à bien été envoyé.'
            );
        }
        return $this->render('UserBlocNoteBundle:Default:show.html.twig', array('content' => $content[0]['noteContent'], 'user' =>$id));
    }
}
