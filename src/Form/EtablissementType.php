<?php

namespace App\Form;


use App\Entity\Etablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;




class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false
            ]);
         }
    public function configureOptions(OptionsResolver $resolver)
         {
             $resolver->setDefaults([
                 'data_class' => Etablissement::class,
             ]);
         }
}