<?php

namespace App\Controller\Admin;

use App\Entity\Benutzer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class BenutzerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Benutzer::class;
    }
    public function configurateCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Benutzer Item')
            ->setEntityLabelInPlural('Benutzer Items')
            ->setDefaultSort(['createdAt'=>'DESC']);
    }
    public function configureFilters(Filters $filters): Filters 
    {
        return $filters->add(EntityFilter::new('kst'));
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('kst');
        yield TextField::new('Vorname')->setRequired(True);
        yield TextField::new('Nachname')->setRequired(True);
        yield TextField::new('Mobiltelefon');
        yield TextField::new('Mail')->setRequired(True);
        yield TextField::new('Festnetznummer');
    }
    
}
