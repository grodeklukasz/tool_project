<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

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
            ->add(EntityFilter::new('benutzer'));
    }
    
    public function configureFields(string $pageName): iterable
    {
      yield AssociationField::new('hersteller');
      yield AssociationField::new('benutzer');
      yield AssociationField::new('location')->setRequired(True);
      yield TextField::new('Inventarnummer')->setRequired(True);
      yield TextField::new('Model')->setRequired(True);
      yield TextField::new('Status')->setRequired(True);
      yield TextField::new('Seriennummer')->setRequired(True);
      yield TextareaField::new('Bemerkung')->hideOnIndex();

    }
    
}
