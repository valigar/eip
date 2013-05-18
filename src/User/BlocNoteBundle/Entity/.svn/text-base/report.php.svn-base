<?php

namespace User\BlocNoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * report
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="User\BlocNoteBundle\Entity\reportRepository")
 */
class report
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
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="noteId", type="integer")
     */
    private $noteId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;


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
     * Set userId
     *
     * @param integer $userId
     * @return report
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set noteId
     *
     * @param integer $noteId
     * @return report
     */
    public function setNoteId($noteId)
    {
        $this->noteId = $noteId;
    
        return $this;
    }

    /**
     * Get noteId
     *
     * @return integer 
     */
    public function getNoteId()
    {
        return $this->noteId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BlocNote
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
}
