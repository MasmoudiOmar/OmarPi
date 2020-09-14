<?php
// src/AppBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use MembershipBundle\Entity\Plan;

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
     * @ORM\Column(type="string",length=255)
     *
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    private $prenom;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param Plan $plan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    /**
     * @var Plan
     *
     * @ORM\ManyToOne(targetEntity="MembershipBundle\Entity\Plan")
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     */
    private $plan;

   /** public function addPlan(Plan $plan)
    {

        if (!$this->plans->contains($plan)) {
            $this->plans->add($plan);
        }

        return $this;
    }**/
    /**
     * @ORM\OneToMany(targetEntity="MembershipBundle\Entity\Ads", mappedBy="user")
     */
    private $advertisments;
    public function __construct()
    {
        parent::__construct();
       // $this->plans = new ArrayCollection();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getAdvertisments()
    {
        return $this->advertisments;
    }

    /**
     * @param mixed $advertisments
     */
    public function setAdvertisments($advertisments)
    {
        $this->advertisments = $advertisments;
    }
}


