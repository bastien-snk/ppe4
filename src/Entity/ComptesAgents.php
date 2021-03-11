<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComptesAgents
 *
 * @ORM\Table(name="comptes_agents", indexes={@ORM\Index(name="idProfil", columns={"idProfil"})})
 * @ORM\Entity
 */
class ComptesAgents
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAgent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=75, nullable=true)
     */
    private $password;

    /**
     * @var \Profils
     *
     * @ORM\ManyToOne(targetEntity="Profils")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProfil", referencedColumnName="idProfil")
     * })
     */
    private $idprofil;

    public function getIdagent(): ?int
    {
        return $this->idagent;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIdprofil(): ?Profils
    {
        return $this->idprofil;
    }

    public function setIdprofil(?Profils $idprofil): self
    {
        $this->idprofil = $idprofil;

        return $this;
    }


}
