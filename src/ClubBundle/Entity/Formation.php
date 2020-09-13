<?php


namespace ClubBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */

class Formation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Ref;

    /**
     * @ORM\Column(type = "string", length = 255)
     * @Assert\NotBlank(message="Le champ Titre est obligatoire")
     * @Assert\Length(
     *     min=5,
     *     max=20,
     *     minMessage="Le Titre doit contenir au moin 5 caractères",
     *     maxMessage="Le titre doit contenir au plus 20 caractères")
     */
    private $Titre;

    /**
     * @ORM\Column(type = "string", length = 255)
     */
    private $Description;

    /**
     * @ORM\Column(type = "date")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type = "date")
     */
    private $DateFin;

    /**
     * @ORM\Column(type = "integer")
     */
    private $nbParticipant;

    /**
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumn(name="idClub")
     * referencedColumnName="id"
     */
    private $idClub;

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->Ref;
    }

    /**
     * @param mixed $Ref
     */
    public function setRef($Ref)
    {
        $this->Ref = $Ref;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param mixed $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * @param mixed $DateDebut
     */
    public function setDateDebut($DateDebut)
    {
        $this->DateDebut = $DateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * @param mixed $DateFin
     */
    public function setDateFin($DateFin)
    {
        $this->DateFin = $DateFin;
    }

    /**
     * @return mixed
     */
    public function getNbParticipant()
    {
        return $this->nbParticipant;
    }

    /**
     * @param mixed $nbParticipant
     */
    public function setNbParticipant($nbParticipant)
    {
        $this->nbParticipant = $nbParticipant;
    }

    /**
     * @return mixed
     */
    public function getIdClub()
    {
        return $this->idClub;
    }

    /**
     * @param mixed $idClub
     */
    public function setIdClub($idClub)
    {
        $this->idClub = $idClub;
    }




}