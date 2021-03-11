<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClient", type="string", length=50, nullable=false)
     */
    private $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClient", type="string", length=50, nullable=false)
     */
    private $prenomclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailClient", type="string", length=50, nullable=true)
     */
    private $emailclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephoneClient", type="string", length=50, nullable=true)
     */
    private $telephoneclient;

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function getNomclient(): ?string
    {
        return $this->nomclient;
    }

    public function setNomclient(string $nomclient): self
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    public function getPrenomclient(): ?string
    {
        return $this->prenomclient;
    }

    public function setPrenomclient(string $prenomclient): self
    {
        $this->prenomclient = $prenomclient;

        return $this;
    }

    public function getEmailclient(): ?string
    {
        return $this->emailclient;
    }

    public function setEmailclient(?string $emailclient): self
    {
        $this->emailclient = $emailclient;

        return $this;
    }

    public function getTelephoneclient(): ?string
    {
        return $this->telephoneclient;
    }

    public function setTelephoneclient(?string $telephoneclient): self
    {
        $this->telephoneclient = $telephoneclient;

        return $this;
    }


}
