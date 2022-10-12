<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Benutzer;
use App\Entity\Workstation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class BenutzerCrudController extends AbstractCrudController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }
    public static function getEntityFqcn(): string
    {
        return Benutzer::class;
    }
    public function configurateCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInSingular('Benutzer Item')
            ->setEntityLabelInPlural('Benutzer Items')
            ->setDefaultSort(['nachname'=>'DESC']);
    }
    public function configureFilters(Filters $filters): Filters 
    {
        return $filters
        ->add(EntityFilter::new('kst'))
        ->add(TextFilter::new('nachname'));
    }

    public function configureActions(Actions $actions): Actions 
    {
        $viewItems = Action::new('viewItems','All Items', 'fa fa-files-o')
            ->linkToRoute('app_user', 
                function(Benutzer $benutzer):array
                {
                    return [
                        'userid' => $benutzer->getId(),
                    ];
                }
        );

        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_DETAIL, $viewItems)
            ->disable(Action::DELETE);
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
