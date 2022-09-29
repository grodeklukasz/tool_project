<?php

namespace App\Controller\Admin;

use App\Entity\Printer;
use App\Repository\ItemStatusRepository;
use App\Repository\HddTypesRepository;
use App\Service\OptionGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class PrinterCrudController extends AbstractCrudController
{
    private $allStatus;
    private $allHDDTypes;
    private $optionsYN;

    public function __construct(ItemStatusRepository $itemStatusRepository, HddTypesRepository $hddTypesRepository, OptionGenerator $optionGenerator)
    {
        $this->allStatus = $optionGenerator->getAllAsArray($itemStatusRepository);
        $this->allHDDTypes = $optionGenerator->getAllAsArray($hddTypesRepository);
        $this->optionsYN = [
            "Ja" => "Ja",
            "Nein" => "Nein"
        ];
    }

    public static function getEntityFqcn(): string
    {
        return Printer::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Printer')
            ->setEntityLabelInPlural('Printers')
            ->setSearchFields(['inventarnummer','seriennummer','model'])
            ->setDefaultSort(['inventarnummer'=>'DESC'])
            ->setPaginatorPageSize(21)
            ;
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
        yield FormField::addPanel('Basic details')->setIcon('fa fa-print');
        yield TextField::new('inventarnummer')->setRequired(True);
        yield ChoiceField::new('status')->setChoices($this->allStatus)->setRequired(True);
        yield AssociationField::new('producer','Hersteller')->setRequired(True);
        yield TextField::new('model')->setRequired(True);
        yield TextField::new('seriennummer')->setRequired(True);

        yield FormField::addTab('Specification');
        yield FormField::addPanel('Specification');
        yield ChoiceField::new('Duplex')->setChoices($this->optionsYN)->setRequired(True);
        yield ChoiceField::new('drucktechnik')->setChoices([
            "Laser" => "Laser",
            "Tinte" => "Tinte",
            "Thermo" => "Thermo",
        ])->setRequired(True);
        yield ChoiceField::new('farbtone')->setChoices([
            'Kolor'=>'Kolor',
            'S/W' => 'S/W'
        ])->setRequired(True);
        yield ChoiceField::new('netzwerk')->setChoices($this->optionsYN)->setRequired(True);
        yield ChoiceField::new('kopieren')->setChoices($this->optionsYN)->setRequired(True)->hideOnIndex();
        yield ChoiceField::new('fax')->setChoices($this->optionsYN)->setRequired(True)->hideOnIndex();
        yield TextField::new('mac1','MAC Adresse')->hideOnIndex();
        yield TextField::new('mac2','MAC Adresse 2')->hideOnIndex();
        yield TextareaField::new('note')->hideOnIndex();

        yield FormField::addTab('Other information');
        yield FormField::addPanel('Other information');

        yield AssociationField::new('benutzer')->setRequired(True);
        yield AssociationField::new('location')->setRequired(True);
    }
    
}
