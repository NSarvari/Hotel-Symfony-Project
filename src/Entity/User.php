<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Accommodation", mappedBy="author")
     */
    private $accommodations;

    public function __construct()
    {
        $this->accommodations=new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getSalt()
    {
        //
    }

    public function eraseCredentials()
    {
       //
    }

    /**
     * @return ArrayCollection
     */
    public function getAccommodations(): ArrayCollection
    {
        return $this->accommodations;
    }

    /**
     * @param Accommodation $accommodation
     * @return User
     */
    public function addAccommodations(Accommodation $accommodation)
    {
        $this->accommodations[] = $accommodation;
        return $this;
    }

}
