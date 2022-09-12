<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class ItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }
    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Item')
            ->setEntityLabelInPlural('Items')
            ->setSearchFields(['Inventarnummer','Seriennummer','Model'])
            ->setDefaultSort(['inventarnummer' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters 
    {
        return $filters 
            ->add(EntityFilter::new('hersteller'))
            ->add(EntityFilter::new('standort'))
            ->add(EntityFilter::new('benutzer'))
            ->add(ChoiceFilter::new('type')->setChoices(['Handy'=>'Handy','PC'=>'PC','Laptop'=>'Laptop']))
            ->add(TextFilter::new('inventarnummer','Inventarnummer'))
            ->add(TextFilter::new('model','Model'))
            ;
    }
    
    public function configureFields(string $pageName): iterable
    {
      yield AssociationField::new('hersteller');
      yield AssociationField::new('benutzer');
      yield AssociationField::new('location')->setRequired(True);
      yield ChoiceField::new('Type')->setChoices(['Handy'=>'Handy','PC'=>'PC','Laptop'=>'Laptop'])->setRequired(True);
      yield TextField::new('Inventarnummer')->setRequired(True);
      yield TextField::new('Model')->setRequired(True);
      yield ChoiceField::new('Status')
      ->setChoices(['neues Gerät'=>'neues Gerät','gebrauchtes Gerät'=>'gebrauchtes Gerät','geschrottet'=>'geschrottet'])
      ->setRequired(True);
      yield TextField::new('Seriennummer')->setRequired(True);
      yield TextareaField::new('Bemerkung')->hideOnIndex()->setRequired(True);

    }
    
}
