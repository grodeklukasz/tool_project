<?php

namespace App\Controller\Admin;

use App\Entity\Handy;
use App\Repository\ItemStatusRepository;
use App\Repository\HddTypesRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class HandyCrudController extends AbstractCrudController
{
    private $allStatus;
    private $allHDDTypes;

    public function __construct(ItemStatusRepository $itemStatusRepository, HddTypesRepository $hddTypesRepository)
    {
        $this->allStatus = $itemStatusRepository->getAllAsArray();
        $this->allHDDTypes = $hddTypesRepository->getAllAsArray();
    }

    public static function getEntityFqcn(): string
    {
        return Handy::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Handy')
            ->setEntityLabelInPlural('Handy')
            ->setSearchFields(['Inventarnummer','seriennummer','model'])
            ->setDefaultSort(['Inventarnummer'=>'DESC'])
            ->setPaginatorPageSize(21)
            ;
    }

    public function configureFilters(Filters $filters): Filters 
    {
        return $filters
            ->add(TextFilter::new('Inventarnummer'))
            ->add(EntityFilter::new('producer'))
            ;
    }

    public function configureActions(Actions $actions): Actions 
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Basic details');
        yield FormField::addPanel('Basic details')->setIcon('fa fa-mobile');
        yield TextField::new('Inventarnummer')->setRequired(True);
        yield ChoiceField::new('Status')->setChoices($this->allStatus)->setRequired(True);
        yield AssociationField::new('producer','Hersteller');
        yield TextField::new('model','Modell')->setRequired(True);
        yield TextField::new('seriennummer')->setRequired(True)->hideOnIndex();
        
        yield FormField::addTab('Specification');
        yield FormField::addPanel('Specification');

        yield TextField::new('imei1','IMEI 1')->setRequired(True);
        yield TextField::new('imei2','IMEI 2')->setRequired(False);

        yield FormField::addTab('Another information');
        yield FormField::addPanel('Another information');

        yield AssociationField::new('benutzer');
        yield AssociationField::new('location')->hideOnIndex();

    }
    
}
