<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Module\User
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="user_users")
 */
class User
{
    /**
     * @ORM\Column(type="user_user_id")
     * @ORM\Id
     */
    private Id $id;

    /**
     * @ORM\Column(type="user_user_email", unique=true)
     */
    private Email $email;

    /**
     * @ORM\Embedded(class="Name")
     */
    private Name $name;

    /**
     * @ORM\Column(type="user_user_status", length=16)
     */
    private Status $status;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeImmutable $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private string $passwordHash;

    /**
     * @ORM\Column(type="user_user_token")
     */
    private ?Token $token = null;

    /**
     * User constructor.
     * @param Id $id
     * @param Email $email
     * @param Name $name
     * @param $date
     * @param $hash
     * @param Token $token
     */
    public function __construct(
        Id $id,
        Email $email,
        Name $name,
        $date, $hash,
        Token $token
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->date = $date;
        $this->passwordHash = $hash;
        $this->token = $token;
        $this->status = Status::active();
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @return Token|null
     */
    public function getToken(): ?Token
    {
        return $this->token;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status->isActive();
    }
}
