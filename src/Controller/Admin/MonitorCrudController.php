<?php

namespace App\Controller\Admin;

use App\Service\OptionGenerator;
use App\Entity\Monitor;
use App\Repository\ItemStatusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;


class MonitorCrudController extends AbstractCrudController
{
    private $allStatus;

    public function __construct(ItemStatusRepository $itemStatusRepository, OptionGenerator $optionGenerator)
    {
        $this->allStatus = $optionGenerator->getAllAsArray($itemStatusRepository);
    }
    public static function getEntityFqcn(): string
    {
        return Monitor::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Monitor')
            ->setEntityLabelInPlural('Monitors')
            ->setSearchFields(['inventarnummer','seriennummer','modell'])
            ->setDefaultSort(['inventarnummer'=>'DESC'])
            ->setPaginatorPageSIze(21);
    }

    public function configureFilters(Filters $filters): Filters 
    {
        return $filters
            ->add(TextFilter::new('inventarnummer'))
            ->add(EntityFilter::new('hersteller'));
    }

    public function configureActions(Actions $actions): Actions 
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }



    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Basic details');
        yield FormField::addPanel('Basic details')->setIcon('fa fa-television');
        yield TextField::new('Inventarnummer')->setRequired(True);
        yield ChoiceField::new('Status')->setChoices($this->allStatus)->setRequired(True);
        yield AssociationField::new('hersteller')->setRequired(True);
        yield TextField::new('modell')->setRequired(True);
        yield TextField::new('seriennummer')->setRequired(True);

        yield FormField::addTab('Specification');
        yield FormField::addPanel('Specification');
        yield TextField::new('size','Größe');
        yield TextField::new('ports','Anschlüsse');

        yield FormField::addTab('Other Information');
        yield FormField::addPanel('Other Information');
        yield AssociationField::new('user','Benutzer')->setRequired(True);
        yield AssociationField::new('location')->setRequired(True);

    }

}
