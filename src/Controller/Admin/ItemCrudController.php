<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Repository\TypeRepository;
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
    private $allTypes;

    public function __construct(TypeRepository $typeRepository)
    {
        $types = $typeRepository->findAll();
        
        foreach($types as $type){
            $arrayTable[$type->getTypename()]=$type->getTypename();
        }

        $this->allTypes = $arrayTable;              
                    
    }
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
            ->add(ChoiceFilter::new('type')->setChoices($this->allTypes))
            ->add(TextFilter::new('inventarnummer','Inventarnummer'))
            ->add(TextFilter::new('model','Model'))
            ;
    }
    
    public function configureFields(string $pageName): iterable
    {
      yield TextField::new('Inventarnummer')->setRequired(True);
      yield ChoiceField::new('Type')->setChoices($this->allTypes)->setRequired(True);
      yield TextField::new('Model')->setRequired(True);
      yield ChoiceField::new('Status')
      ->setChoices(['neues Gerät'=>'neues Gerät','gebrauchtes Gerät'=>'gebrauchtes Gerät','geschrottet'=>'geschrottet'])
      ->setRequired(True);
      yield TextField::new('Seriennummer')->setRequired(True);
      yield TextareaField::new('Bemerkung')->hideOnIndex()->setRequired(True);
      yield AssociationField::new('hersteller');
      yield AssociationField::new('benutzer');
      yield AssociationField::new('location')->hideOnIndex()->setRequired(True);

    }
    
}
