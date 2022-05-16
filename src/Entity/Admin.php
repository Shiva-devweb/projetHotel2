<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: Manager::class, orphanRemoval: true)]
    private $admin;

    public function __construct()
    {
        $this->admin = new ArrayCollection();
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

    /**
     * @return Collection<int, Manager>
     */
    public function getAdmin(): Collection
    {
        return $this->admin;
    }

    public function addAdmin(Manager $admin): self
    {
        if (!$this->admin->contains($admin)) {
            $this->admin[] = $admin;
            $admin->setAdmin($this);
        }

        return $this;
    }

    public function removeAdmin(Manager $admin): self
    {
        if ($this->admin->removeElement($admin)) {
            // set the owning side to null (unless already changed)
            if ($admin->getAdmin() === $this) {
                $admin->setAdmin(null);
            }
        }

        return $this;
    }
}
