<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
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
    private $book_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $book_publisher;

    /**
     * @ORM\Column(type="integer")
     */
    private $book_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookName(): ?string
    {
        return $this->book_name;
    }

    public function setBookName(string $book_name): self
    {
        $this->book_name = $book_name;

        return $this;
    }

    public function getBookPublisher(): ?string
    {
        return $this->book_publisher;
    }

    public function setBookPublisher(string $book_publisher): self
    {
        $this->book_publisher = $book_publisher;

        return $this;
    }

    public function getBookPrice(): ?int
    {
        return $this->book_price;
    }

    public function setBookPrice(int $book_price): self
    {
        $this->book_price = $book_price;

        return $this;
    }
}
