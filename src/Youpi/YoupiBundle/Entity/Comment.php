<?php

namespace Youpi\YoupiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Youpi\YoupiBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
      * @ORM\ManyToOne(targetEntity="Youpi\UserBundle\Entity\User")
      * @ORM\JoinColumn(name="comments_user_id", referencedColumnName="id")
      */
     private $user;

     /**
       * @ORM\ManyToOne(targetEntity="Youpi\YoupiBundle\Entity\Link")
       * @ORM\JoinColumn(name="link_id", referencedColumnName="id")
       */
      private $link;

      /**
        * @ORM\ManyToMany(targetEntity="Youpi\YoupiBundle\Entity\Comment")
        * @ORM\JoinTable(name="com_a_com",
        *      joinColumns={@ORM\JoinColumn(name="comments_id", referencedColumnName="id")},
        *      inverseJoinColumns={@ORM\JoinColumn(name="comments_id", referencedColumnName="id")}
        *      )
        */
       private $com_a_com;


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
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Comment
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set user
     *
     * @param \Youpi\UserBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\Youpi\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Youpi\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set link
     *
     * @param \Youpi\YoupiBundle\Entity\Link $link
     * @return Comment
     */
    public function setLink(\Youpi\YoupiBundle\Entity\Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return \Youpi\YoupiBundle\Entity\Link
     */
    public function getLink()
    {
        return $this->link;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->com_a_com = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add com_a_com
     *
     * @param \Youpi\YoupiBundle\Entity\Comments $comACom
     * @return Comment
     */
    public function addComACom(\Youpi\YoupiBundle\Entity\Comments $comACom)
    {
        $this->com_a_com[] = $comACom;

        return $this;
    }

    /**
     * Remove com_a_com
     *
     * @param \Youpi\YoupiBundle\Entity\Comments $comACom
     */
    public function removeComACom(\Youpi\YoupiBundle\Entity\Comments $comACom)
    {
        $this->com_a_com->removeElement($comACom);
    }

    /**
     * Get com_a_com
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComACom()
    {
        return $this->com_a_com;
    }
}
