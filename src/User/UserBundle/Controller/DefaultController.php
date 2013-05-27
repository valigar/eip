<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use User\UserBundle\Entity\Classroom;
use User\UserBundle\Form\ClassroomType;
use User\UserBundle\Entity\ClassFiles;

class DefaultController extends Controller
{
    /*/**
     * @Route("/hello/{name}")
     * @Template()
     */
    /*public function indexAction($name)
    {
        return array('name' => $name);
    }*/

    /**
     * @Route("/professor/classroom/create", name="user_user_create_classroom")
     * @Template()
     */
    public function createClassroomAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();

        $classroom = new Classroom();

        $classroom->setCreatedAt(new \DateTime('now'));
        $classroom->setProfessorUserId($user->getId());

        $form = $this->createForm(
            new ClassroomType(),
            $classroom
        );

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $data = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
            }
        }

        return $this->render('UserUserBundle:Default:createClassroom.html.twig', array('user' => $user->getId(), 'form' => $form->createView()));
    }

    /**
     * @Route("/professor/classroom/edit/{classId}", name="user_user_edit_classroom")
     * @Template()
     */
    public function editClassroomAction($classId)
    {
        $classroom = $this->getDoctrine()->getRepository('UserUserBundle:Classroom')->find($classId);
        $request = $this->getRequest();

        $form = $this->createForm(
            new ClassroomType(),
            $classroom
        );

        $classroom->setUpdatedAt(new \DateTime('now'));

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirect($this->generateUrl('user_user_classroom'));
            }
        }

        return $this->render('UserUserBundle:Default:editClassroom.html.twig', array('form' => $form->createView(), 'classroomId' => $classId));
    }

    /**
     * @Route("/professor/classroom/list", name="user_user_classroom")
     * @Template()
     */
    public function showClassroomAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();

        $classrooms = $this->getDoctrine()
                      ->getRepository('UserUserBundle:Classroom')
                      ->findBy(array('professorUserId' => $user->getId()));

        return $this->render("UserUserBundle:Default:showClassroom.html.twig", array('classrooms' => $classrooms));
    }

    /**
     * @Route("/professor/classroom/{classId}/content", name="user_user_classroom_content")
     * @Template()
     */
    public function classroomContentAction($classId)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $allCourse = $this->getDoctrine()
            ->getRepository('UserUserBundle:ClassFiles')
            ->findBy(array('idClassroom' => $classId));

        $course = new ClassFiles();
        $form = $this->createFormBuilder($course)
            ->add('filename')
            ->add('file')
            ->getForm()
        ;

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $course->setIdClassroom($classId);
                $course->setCreatedAt(new \DateTime('now'));
                $course->setIsActivated('false');
                $em->persist($course);
                $em->flush();

                return $this->render('UserUserBundle:Default:classroomContent.html.twig',
                    array('form' => $form->createView(), 'classId' => $classId, 'allCourse' => $allCourse));
            }
        }

        return $this->render('UserUserBundle:Default:classroomContent.html.twig',
            array('form' => $form->createView(), 'classId' => $classId, 'allCourse' => $allCourse));
    }

    /**
     * @Route("/professor/classroom/{courseId}/{isActivated}", name="user_user_course_activate_desactivate")
     * @Template()
     */
    public function activateDesactivateCourseAction($courseId, $isActivated)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('UserUserBundle:ClassFiles')->find($courseId);

        if (!$course) {
            throw $this->createNotFoundException(
                'No course found for id '.$courseId
            );
        }

        $course->setIsActivated($isActivated);

        $em->flush();

        $classId = $course->getIdClassroom();

        return $this->redirect($this->generateUrl('user_user_classroom_content', array('classId' => $classId)));
    }

    /**
     * @Route("/professor/classroom/{courseId}/delete", name="user_user_course_delete")
     * @Template()
     */
    /*public function deleteCourse($courseId)
    {
       /* $em = $this->getDoctrine()->getManager();

        $course = $em->getRepository('UserUserBundle:ClassFiles')->find($courseId);

        $course->storeFilenameForRemove();
        $em->remove($course);
        $course->removeUpload();
        $em->flush();

        return $this->redirect($this->generateUrl('user_user_classroom_content', array('classId' => $course->getIdClassroom())));
    }       */

}
