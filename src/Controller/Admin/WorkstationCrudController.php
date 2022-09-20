<?php

namespace App\Controller\Admin;

use App\Entity\Workstation;
use App\Repository\ItemStatusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
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

    public function __construct(ItemStatusRepository $itemStatusRepository) 
    {
        $status = $itemStatusRepository->findAll();
        $arrayStatus = array();
        foreach($status as $s){
            $arrayStatus[$s->getStatus()] = $s->getStatus();
        }
        $this->allStatus = $arrayStatus;
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
        yield TextField::new('os','Betriebssystem')->setRequired(True);
        yield TextField::new('processor')->setRequired(True);
        yield TextField::new('ram')->setRequired(True);
        yield TextField::new('hdd1', 'Festplatte')->setRequired(True);
        yield TextField::new('hdd1_capacity','HDD1 Kapazität')->hideOnIndex();

        yield TextField::new('hdd2', 'Festplatte 2 (optional)')->hideOnIndex();
        yield TextField::new('hdd2_capacity','HDD2 Kapazität')->hideOnIndex();


        yield TextField::new('hdd3', 'Festplatte 3 (optional)')->hideOnIndex();
        yield TextField::new('hdd3_capacity','HDD3 Kapazität')->hideOnIndex();


        yield TextField::new('opticaldrive','DVD/CD Laufwerk')->hideOnIndex();
        yield TextField::new('mac1','MAC Adresse 1')->hideOnIndex();
        yield TextField::new('mac2','MAC Adresse 2')->hideOnIndex();
        yield TextField::new('ports','Anschlüsse')->setRequired(True)->hideOnIndex();
        yield TextField::new('graphiccard', 'Grafik')->setRequired(True)->hideOnIndex();
        yield TextField::new('musiccard','Sound Card')->setRequired(True)->hideOnIndex();
        yield FormField::addTab('Another information');
        yield AssociationField::new('benutzer')->setRequired(True);
        yield AssociationField::new('location','Standort')->hideOnIndex()->setRequired(True);
    }
    
}
