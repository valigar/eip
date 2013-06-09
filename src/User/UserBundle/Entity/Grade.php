<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="User\UserBundle\Entity\GradeRepository")
 */
class Grade
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
     * @var integer
     *
     * @ORM\Column(name="classroomId", type="integer")
     */
    private $classroomId;

    /**
     * @var string
     *
     * @ORM\Column(name="gradeName", type="string", length=255)
     */
    private $gradeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="gradeTotal", type="integer")
     */
    private $gradeTotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
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
     * @return Grade
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
     * Set gradeName
     *
     * @param string $gradeName
     * @return Grade
     */
    public function setGradeName($gradeName)
    {
        $this->gradeName = $gradeName;

        return $this;
    }

    /**
     * Get gradeName
     *
     * @return string 
     */
    public function getGradeName()
    {
        return $this->gradeName;
    }

    /**
     * Set gradeTotal
     *
     * @param integer $gradeTotal
     * @return Grade
     */
    public function setGradeTotal($gradeTotal)
    {
        $this->gradeTotal = $gradeTotal;

        return $this;
    }

    /**
     * Get gradeTotal
     *
     * @return integer 
     */
    public function getGradeTotal()
    {
        return $this->gradeTotal;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Grade
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
     * @return Grade
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
