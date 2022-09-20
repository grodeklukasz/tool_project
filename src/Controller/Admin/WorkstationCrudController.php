<?php

namespace App\Controller\Admin;

use App\Entity\Workstation;
use App\Repository\ItemStatusRepository;
use App\Repository\HddTypesRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class WorkstationCrudController extends AbstractCrudController
{
    private $allStatus;
    private $allHDDTypes;

    public function __construct(ItemStatusRepository $itemStatusRepository, HddTypesRepository $hddTypesRepository) 
    {
        $status = $itemStatusRepository->findAll();
        $arrayStatus = array();
        foreach($status as $s){
            $arrayStatus[$s->getStatus()] = $s->getStatus();
        }
        $this->allStatus = $arrayStatus;

       
        $this->allHDDTypes = $hddTypesRepository->getAllAsArray();

    }
    public static function getEntityFqcn(): string
    {
        return Workstation::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Item')
            ->setEntityLabelInPlural('Items')
            ->setSearchFields(['inventarnummer','seriennummer','model'])
            ->setDefaultSort(['inventarnummer'=>'DESC']);
    }

    public function configureFilters(Filters $filters): Filters 
    {
        return $filters
            ->add(TextFilter::new('inventarnummer'))
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
        yield FormField::addPanel('Basic details')->setIcon('fa fa-desktop');
        yield TextField::new('Inventarnummer')->setRequired(True);
        yield ChoiceField::new('Status')->setChoices($this->allStatus)->hideOnIndex()->setRequired(True);
        yield AssociationField::new('producer','Hersteller');
        yield TextField::new('model')->setRequired(True);
        yield TextField::new('seriennummer')->setRequired(True);
        yield FormField::addTab('Specification');

        yield FormField::addPanel('Specification');
        yield TextField::new('computername')->setRequired(True);
        yield TextField::new('os','Betriebssystem')->setRequired(True);
        yield TextField::new('processor')->setRequired(True);
        yield TextField::new('ram')->setRequired(True);
        yield TextField::new('hdd1', 'Festplatte')->setRequired(True);
        yield TextField::new('hdd1_capacity','Festplatte 1 Kapazität')->hideOnIndex();
        yield ChoiceField::new('hdd1_type','Festplatte 1 Typ')->setChoices($this->allHDDTypes)->hideOnIndex();

        yield TextField::new('hdd2', 'Festplatte 2 (optional)')->hideOnIndex();
        yield TextField::new('hdd2_capacity','Festplatte 2 Kapazität')->hideOnIndex();
        yield ChoiceField::new('hdd2_type','Festplatte 2 Typ')->setChoices($this->allHDDTypes)->hideOnIndex();


        yield TextField::new('hdd3', 'Festplatte 3 (optional)')->hideOnIndex();
        yield TextField::new('hdd3_capacity','Festplatte 3 Kapazität')->hideOnIndex();
        yield ChoiceField::new('hdd3_type','Festplatte 3 Typ')->setChoices($this->allHDDTypes)->hideOnIndex();


        yield TextField::new('opticaldrive','DVD/CD Laufwerk')->hideOnIndex();
        yield TextField::new('mac1','MAC Adresse 1')->hideOnIndex();
        yield TextField::new('mac2','MAC Adresse 2')->hideOnIndex();
        yield TextField::new('ports','Anschlüsse')->setRequired(True)->hideOnIndex();
        yield TextField::new('graphiccard', 'Grafik')->setRequired(True)->hideOnIndex();
        yield TextField::new('musiccard','Sound Card')->setRequired(True)->hideOnIndex();
        yield FormField::addTab('Another information');

        yield FormField::addPanel('Another information');
        yield AssociationField::new('benutzer')->setRequired(True);
        yield AssociationField::new('location','Standort')->hideOnIndex()->setRequired(True);
    }
    
}
