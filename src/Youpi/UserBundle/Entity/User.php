<?php

namespace Youpi\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
      * @ORM\ManyToMany(targetEntity="Youpi\YoupiBundle\Entity\Link")
      * @ORM\JoinTable(name="link_follow",
      *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id")}
      *      )
      */
     private $link_follow;

     /**
       * @ORM\ManyToMany(targetEntity="Youpi\YoupiBundle\Entity\Link")
       * @ORM\JoinTable(name="link_point_give",
       *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
       *      inverseJoinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id")}
       *      )
       */
      private $link_point_give;

      /**
        * @ORM\ManyToMany(targetEntity="Youpi\YoupiBundle\Entity\Comment")
        * @ORM\JoinTable(name="com_point_give",
        *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
        *      inverseJoinColumns={@ORM\JoinColumn(name="comments_id", referencedColumnName="id")}
        *      )
        */
       private $com_point_give;



    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add link_follow
     *
     * @param \Youpi\YoupiBundle\Entity\Link $linkFollow
     * @return User
     */
    public function addLinkFollow(\Youpi\YoupiBundle\Entity\Link $linkFollow)
    {
        $this->link_follow[] = $linkFollow;

        return $this;
    }

    /**
     * Remove link_follow
     *
     * @param \Youpi\YoupiBundle\Entity\Link $linkFollow
     */
    public function removeLinkFollow(\Youpi\YoupiBundle\Entity\Link $linkFollow)
    {
        $this->link_follow->removeElement($linkFollow);
    }

    /**
     * Get link_follow
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinkFollow()
    {
        return $this->link_follow;
    }

    /**
     * Add link_point_give
     *
     * @param \Youpi\YoupiBundle\Entity\Link $linkPointGive
     * @return User
     */
    public function addLinkPointGive(\Youpi\YoupiBundle\Entity\Link $linkPointGive)
    {
        $this->link_point_give[] = $linkPointGive;

        return $this;
    }

    /**
     * Remove link_point_give
     *
     * @param \Youpi\YoupiBundle\Entity\Link $linkPointGive
     */
    public function removeLinkPointGive(\Youpi\YoupiBundle\Entity\Link $linkPointGive)
    {
        $this->link_point_give->removeElement($linkPointGive);
    }

    /**
     * Get link_point_give
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinkPointGive()
    {
        return $this->link_point_give;
    }
}
