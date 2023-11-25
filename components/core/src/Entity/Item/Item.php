<?php

declare(strict_types=1);

namespace App\Entity\Item;

use App\Repository\Item\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item implements \Serializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private float $price;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dataSheetUrl = null;

    #[ORM\Column]
    private bool $newArticle = true;

    #[ORM\Column]
    private bool $topArticle = false;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'items')]
    private ?Category $category = null;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getDataSheetUrl(): ?string
    {
        return $this->dataSheetUrl;
    }

    public function setDataSheetUrl(?string $dataSheetUrl): self
    {
        $this->dataSheetUrl = $dataSheetUrl;

        return $this;
    }

    public function isNewArticle(): ?bool
    {
        return $this->newArticle;
    }

    public function setNewArticle(bool $newArticle): self
    {
        $this->newArticle = $newArticle;

        return $this;
    }

    public function isTopArticle(): ?bool
    {
        return $this->topArticle;
    }

    public function setTopArticle(bool $topArticle): self
    {
        $this->topArticle = $topArticle;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function serialize(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'dataSheetUrl' => $this->getDataSheetUrl(),
            'imageUrl' => $this->getImageUrl(),
            'newArticle' => $this->isNewArticle(),
            'topArticle' => $this->isTopArticle(),
        ];
    }

    public function unserialize(string $data): void
    {
        $this->title = $data['title'];
        $this->price = (float) $data['price'];
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->title = $data['title'];
        $this->price = $data['price'];
    }
}
