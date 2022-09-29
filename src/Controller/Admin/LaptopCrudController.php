<?php

namespace App\Controller\Admin;

use App\Entity\Laptop;
use App\Repository\ItemStatusRepository;
use App\Repository\HddTypesRepository;
use App\Service\OptionGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class LaptopCrudController extends AbstractCrudController
{
    private $allStatus;
    private $allHDDTypes;

    public function __construct(ItemStatusRepository $itemStatusRepository, HddTypesRepository $hddTypesRepository, OptionGenerator $optionGenerator)
    {

        $this->allStatus = $optionGenerator->getAllAsArray($itemStatusRepository);

        $this->allHDDTypes = $optionGenerator->getAllAsArray($hddTypesRepository);


    }
    public static function getEntityFqcn(): string
    {
        return Laptop::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Laptop')
            ->setEntityLabelInPlural('Laptops')
            ->setSearchFields(['inventarnummer','seriennummer','model'])
            ->setDefaultSort(['inventarnummer'=>'DESC'])
            ->setPaginatorPageSize(21);
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
        yield FormField::addPanel('Basic details')->setIcon('fa fa-laptop');
        yield TextField::new('inventarnummer','Inventarnummer')->setRequired(True);
        yield TextField::new('model','Modell')->setRequired(True);
        yield ChoiceField::new('Status')->setChoices($this->allStatus)->setRequired(True)->hideOnIndex();
        yield AssociationField::new('producer','Hersteller')->setSortable(true);
        yield TextField::new('seriennummer','Seriennummer')->setRequired(True);

        yield FormField::addTab('Specification');
        yield FormField::addPanel('Specification');

        yield TextField::new('computername','Computername')->setRequired(True);
        yield TextField::new('os','Betriebssystem')->setRequired(True)->hideOnIndex();

        yield TextField::new('processor','Processor')->setRequired(True)->hideOnIndex();
        yield TextField::new('ram','RAM')->setRequired(True);
        
        yield TextField::new('hdd1','Festplatte 1')->setRequired(True)->hideOnIndex();
        yield TextField::new('hdd1_capacity','Festplatte 1 Kapazität')->setRequired(True);
        yield ChoiceField::new('hdd1_type','Festplatte 1 Typ')->setChoices($this->allHDDTypes)->setRequired(True)->hideOnIndex();

        yield TextField::new('hdd2','Festplatte 2 (optional)')->hideOnIndex();
        yield TextField::new('hdd2_capacity','Festplatte 2 Kapazität')->hideOnIndex();
        yield ChoiceField::new('hdd2_type','Festplatte 2 Typ')->setChoices($this->allHDDTypes)->hideOnIndex();

        yield TextField::new('opticaldrive','DVD/CD Laufwerk')->hideOnIndex();

        yield TextField::new('mac1','MAC Adresse 1')->setRequired(True)->hideOnIndex();
        yield TextField::new('mac2','MAC Adresse 2')->setRequired(True)->hideOnIndex();

        yield TextField::new('ports','Anschlüsse')->setRequired(True)->hideOnIndex();

        yield TextField::new('graphiccard', 'Grafikkarte')->setRequired(True)->hideOnIndex();
        yield TextField::new('musiccard','Soundkarte')->setRequired(True)->hideOnIndex();

        yield FormField::addTab('Other information');
        yield FormField::addPanel('Other information');

        yield TextField::new('note','Bemerkung')->hideOnIndex();
        yield AssociationField::new('benutzer')->setRequired(True);
        yield AssociationField::new('location')->setRequired(True);


    }
    
}
