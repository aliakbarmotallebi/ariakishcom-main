<?php

namespace App\Entity;

use App\Entity\Traits\TimableTrait;
use App\Enum\Status;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: '`products`')]
#[ORM\HasLifecycleCallbacks]
class Product
{
    use TimableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ProductCategory $category = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Admin $author = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductComment $productComment = null;

    #[ORM\Column(type: Types::STRING, enumType: Status::class)]
    private Status $status;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductImage::class)]
    private Collection $image;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductCatalogure::class)]
    private Collection $catalogure;

    public function __construct()
    {
        $this->status = Status::Published;
        $this->image = new ArrayCollection();
        $this->catalogure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCategory(): ?ProductCategory
    {
        return $this->category;
    }

    public function setCategory(?ProductCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): ?Admin
    {
        return $this->author;
    }

    public function setAuthor(?Admin $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getProductComment(): ?ProductComment
    {
        return $this->productComment;
    }

    public function setProductComment(?ProductComment $productComment): static
    {
        $this->productComment = $productComment;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): self {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(ProductImage $image): static
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(ProductImage $image): static
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductCatalogure>
     */
    public function getCatalogure(): Collection
    {
        return $this->catalogure;
    }

    public function addCatalogure(ProductCatalogure $catalogure): static
    {
        if (!$this->catalogure->contains($catalogure)) {
            $this->catalogure->add($catalogure);
            $catalogure->setProduct($this);
        }

        return $this;
    }

    public function removeCatalogure(ProductCatalogure $catalogure): static
    {
        if ($this->catalogure->removeElement($catalogure)) {
            // set the owning side to null (unless already changed)
            if ($catalogure->getProduct() === $this) {
                $catalogure->setProduct(null);
            }
        }

        return $this;
    }

}