<?php

namespace App\Entity;

use App\Repository\UserEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserEntityRepository::class)]
#[ORM\Table(name: '`user`')]
class UserEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $importTmFileId = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isDeleted = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $createdBy = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $updatedBy = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $oldSysId = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column(type: Types::JSON)]
    private array $roles = [];

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $rolesAllowed = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $types = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 180)]
    private ?string $firstName = null;

    #[ORM\Column(length: 180)]
    private ?string $lastName = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $fullName = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isActive = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllCompany = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllBranch = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllBU = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllDivision = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllDept = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllDeptUnit = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $isAccessAllEmpType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImportTmFileId(): ?string
    {
        return $this->importTmFileId;
    }

    public function setImportTmFileId(?string $importTmFileId): static
    {
        $this->importTmFileId = $importTmFileId;

        return $this;
    }

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): static
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getOldSysId(): ?string
    {
        return $this->oldSysId;
    }

    public function setOldSysId(?string $oldSysId): static
    {
        $this->oldSysId = $oldSysId;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getRolesAllowed(): ?array
    {
        return $this->rolesAllowed;
    }

    public function setRolesAllowed(?array $rolesAllowed): static
    {
        $this->rolesAllowed = $rolesAllowed;

        return $this;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }

    public function setTypes(?array $types): static
    {
        $this->types = $types;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isAccessAllCompany(): ?bool
    {
        return $this->isAccessAllCompany;
    }

    public function setIsAccessAllCompany(?bool $isAccessAllCompany): static
    {
        $this->isAccessAllCompany = $isAccessAllCompany;

        return $this;
    }

    public function isAccessAllBranch(): ?bool
    {
        return $this->isAccessAllBranch;
    }

    public function setIsAccessAllBranch(?bool $isAccessAllBranch): static
    {
        $this->isAccessAllBranch = $isAccessAllBranch;

        return $this;
    }

    public function isAccessAllBU(): ?bool
    {
        return $this->isAccessAllBU;
    }

    public function setIsAccessAllBU(?bool $isAccessAllBU): static
    {
        $this->isAccessAllBU = $isAccessAllBU;

        return $this;
    }

    public function isAccessAllDivision(): ?bool
    {
        return $this->isAccessAllDivision;
    }

    public function setIsAccessAllDivision(?bool $isAccessAllDivision): static
    {
        $this->isAccessAllDivision = $isAccessAllDivision;

        return $this;
    }

    public function isAccessAllDept(): ?bool
    {
        return $this->isAccessAllDept;
    }

    public function setIsAccessAllDept(?bool $isAccessAllDept): static
    {
        $this->isAccessAllDept = $isAccessAllDept;

        return $this;
    }

    public function isAccessAllDeptUnit(): ?bool
    {
        return $this->isAccessAllDeptUnit;
    }

    public function setIsAccessAllDeptUnit(?bool $isAccessAllDeptUnit): static
    {
        $this->isAccessAllDeptUnit = $isAccessAllDeptUnit;

        return $this;
    }

    public function isAccessAllEmpType(): ?bool
    {
        return $this->isAccessAllEmpType;
    }

    public function setIsAccessAllEmpType(?bool $isAccessAllEmpType): static
    {
        $this->isAccessAllEmpType = $isAccessAllEmpType;

        return $this;
    }
}
