<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Controller\UploadImageAction;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
/**
 * @ApiResource(
 *  attributes={
 *      "formats"={"json","jsonld","form"={"multipart/form-data"}}
 *              }
 *  ,
 *  collectionOperations={
 *                  "get",
 *                   "post"={
 *                      "method"="POST",
 *                      "path"="/images",
 *                      "controller"=UploadImageAction::class,
 *                      "defaults"={"_api_receive"=false}
 *                          }
 * 
 * 
 * 
 *                    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable()
 */
class Image
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
     /**
     * @Vich\UploadableField(mapping="clients", fileNameProperty="url")
     * @Assert\NotNull()
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client",inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }
    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
