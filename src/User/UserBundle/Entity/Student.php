<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="User\UserBundle\Entity\StudentRepository")
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="classroomId", type="string")
     */
    private $classroomId;

    /**
     * @var integer
     *
     * @ORM\Column(name="userStudentId", type="integer")
     */
    private $userStudentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set classroomId
     *
     * @param integer $classroomId
     * @return Student
     */
    public function setClassroomId($classroomId)
    {
        $this->classroomId = $classroomId;

        return $this;
    }

    /**
     * Get classroomId
     *
     * @return integer 
     */
    public function getClassroomId()
    {
        return $this->classroomId;
    }

    /**
     * Set userStudentId
     *
     * @param integer $userStudentId
     * @return Student
     */
    public function setUserStudentId($userStudentId)
    {
        $this->userStudentId = $userStudentId;

        return $this;
    }

    /**
     * Get userStudentId
     *
     * @return integer 
     */
    public function getUserStudentId()
    {
        return $this->userStudentId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Student
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Student
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
