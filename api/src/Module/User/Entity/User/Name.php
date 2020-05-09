<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

/**
 * Class Name
 * @package App\Module\User
 *
 * @ORM\Embeddable
 */
class Name
{
    /**
     * @ORM\Column(type="string")
     */
    private string $first;

    /**
     * @ORM\Column(type="string")
     */
    private string $last;

    /**
     * Name constructor.
     * @param string $first
     * @param string $last
     */
    public function __construct(string $first, string $last)
    {
        Assert::notEmpty($first);
        Assert::notEmpty($last);

        $this->first = $first;
        $this->last = $last;
    }

    /**
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return $this->first . ' ' . $this->last;
    }
}
