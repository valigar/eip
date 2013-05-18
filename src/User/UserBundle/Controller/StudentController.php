<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use User\UserBundle\Entity\Classroom;
use User\UserBundle\Form\ClassroomType;
use User\UserBundle\Entity\Student;

class StudentController extends Controller
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
     * @Route("/student/classroom_list", name="user_student_classroom_list")
     * @Template()
     */
    public function ClassroomListAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserUserBundle:Classroom');

        $classrooms = $repository->findAll();

        $repository = $em->getRepository('UserUserBundle:Student');

        $student = $repository->findBy(array('userStudentId' => $user->getId()));

        $user_classrooms = $student[0]->getClassroomId();


        $test = explode (',', $user_classrooms);

        foreach ($classrooms as $classroom) {
            foreach ($test as $tst){
                if ($classroom->getId() == $tst)
                    array_shift($classrooms);
            }
        }

        return $this->render('UserUserBundle:Student:classroomList.html.twig', array("classroom_list" => $classrooms));
    }

    /**
     * @Route("/student/join_classroom/{classId}", name="user_student_join_classroom")
     * @Template()
     */
    public function JoinClassroomAction($classId)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserUserBundle:Student');

        $student = $repository->findBy(array('userStudentId' => $user->getId()));

        if (empty($student)) {
            $joinClass = new student();

            $joinClass->setCreatedAt(new \DateTime('now'));
            $joinClass->setUserStudentId($user->getId());
            $joinClass->setClassroomId($classId);

            $em = $this->getDoctrine()->getManager();
            $em->persist($joinClass);
            $em->flush();
            die();
        }
        else {
            $student[0]->setClassroomId($student[0]->getClassroomId() . ',' . $classId);
            $em->persist($student[0]);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_student_classroom_list'));
    }

    /**
     * @Route("/student/quit_classroom_list", name="user_student_quit_classroom_list")
     * @Template()
     */
    public function quitClassroomListAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getEntityManager();

        $repository = $em->getRepository('UserUserBundle:Classroom');
        $classrooms = $repository->findAll();

        $repository = $em->getRepository('UserUserBundle:Student');
        $student = $repository->findBy(array('userStudentId' => $user->getId()));

        $test = explode(',', $student[0]->getClassroomId());

        $classroom_list = array();
        foreach($test as $tst) {
            foreach ($classrooms as $key=>$classroom) {
                if ($classroom->getId() == $tst)
                    $classroom_list[] = $classrooms[$key];
            }
        }

        return $this->render('UserUserBundle:Student:quitClassroomList.html.twig', array("classroom_list" => $classroom_list));
    }

    /**
     * @Route("/student/quit_classroom/{classId}", name="user_student_quit_classroom")
     * @Template()
     */
    public function quitClassroomAction($classId)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            throw $this->createNotFoundException('The page does not exist');

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('UserUserBundle:Student');

        $student = $repository->findBy(array('userStudentId' => $user->getId()));

        $ids = explode(',', $student[0]->getclassroomId());

        foreach ($ids as $key=>$id) {
            if ($id == $classId) {
                $classroom_list = array_splice($ids, $key);
            }
        }
        $student[0]->setClassroomId(implode(',', $ids));
        $em->persist($student[0]);
        $em->flush();

        return $this->redirect($this->generateUrl('user_student_quit_classroom_list'));
    }
}