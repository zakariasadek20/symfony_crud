<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface as ValidatorValidatorInterface;
use App\Entity\Client;
use App\Entity\Image;
use App\Form\ClientType;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class UploadImageAction
{
    private $formFactory;
    private $entityManger;
    private $validator;
    public function __construct(FormFactoryInterface $formFActory
                        ,EntityManagerInterface $entityManager,
                        ValidatorValidatorInterface $validator
                        )
    {
        $this->formFactory=$formFActory;
        $this->entityManger=$entityManager;
        $this->validator=$validator;
    }

   public function __invoke(Request $request)
   {
       
        //create new image instance
        $image =new Image();

        //validate form
        $form=$this->formFactory->create(ImageType::class,$image);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $this->entityManger->persist($image);
            $this->entityManger->flush();
            return  $image;
        }

        throw new ValidationException(
            $this->validator->validate($image)
            );
        
        

   }




}