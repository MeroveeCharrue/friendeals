<?php

namespace Friendeals\Entity;

use DateTimeInterface;
use Friendeals\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ExpenseRepository::class)
 */
class Expense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="datetime")
     */
    private $paymentDate;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $paymentType;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPaymentDate(): DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(DateTimeInterface $paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    public function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAuthor(): ?Player
    {
        return $this->author;
    }

    public function setAuthor(?Player $author): void
    {
        $this->author = $author;
    }
}
