<?php

namespace BaotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boat
 *
 * @ORM\Table(name="boat")
 * @ORM\Entity(repositoryClass="BaotBundle\Repository\BoatRepository")
 */
class Boat
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, unique=true)
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="longeur", type="integer")
     */
    private $longeur;

    /**
     * @var int
     *
     * @ORM\Column(name="largeur", type="integer")
     */
    private $largeur;

    /**
     * @var int
     *
     * @ORM\Column(name="place", type="integer")
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255)
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=true)
     */
    private $image;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Boat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Boat
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set longeur
     *
     * @param integer $longeur
     *
     * @return Boat
     */
    public function setLongeur($longeur)
    {
        $this->longeur = $longeur;

        return $this;
    }

    /**
     * Get longeur
     *
     * @return int
     */
    public function getLongeur()
    {
        return $this->longeur;
    }

    /**
     * Set largeur
     *
     * @param integer $largeur
     *
     * @return Boat
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return int
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set place
     *
     * @param integer $place
     *
     * @return Boat
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return Boat
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Boat
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}

