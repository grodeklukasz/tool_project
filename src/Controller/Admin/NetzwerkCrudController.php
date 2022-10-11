<?php

namespace App\Controller\Admin;

use Doctrine\Persistence\ManagerRegistry;
use App\Service\OptionGenerator;
use App\Entity\Netzwerk;
use App\Entity\Hersteller;
use App\Repository\ItemStatusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class NetzwerkCrudController extends AbstractCrudController
{
    private $allStatus;
    private $allTypes;
    
    
    public function __construct(ItemStatusRepository $itemStatusRepository, OptionGenerator $optionGenerator, ManagerRegistry $doctrine)
    {
        $this->allStatus = $optionGenerator->getAllAsArray($itemStatusRepository);

        $this->allTypes = [
            'Switch' => 'Switch',
            'Router' => 'Router',
            'AP' => 'AP',
            'NAS' => 'NAS',
            'Sophos RED' => 'Sophos RED'
        ];

        
    }
    public static function getEntityFqcn(): string
    {
        return Netzwerk::class;
    }
    public function configureCrud(Crud $crud): Crud 
    {
        return $crud 
            ->setEntityLabelInSingular("Netzwerk")
            ->setEntityLabelInPlural("Netzwerks")
            ->setSearchFields(['inventarnummer','seriennummer','model'])
            ->setDefaultSort(['inventarnummer'=>'DESC'])
            ->setPaginatorPageSize(21);
    }
    public function configureFilters(Filters $filters): Filters 
    {
        return $filters 
            ->add(TextFilter::new('inventarnummer'))
            ->add(EntityFilter::new('hersteller'))
            ;
    }
    public function configureActions(Actions $actions): Actions 
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Basic details');
        yield FormField::addPanel('Basic details')->setIcon('fa fa-server');
        yield TextField::new('Inventarnummer')->setRequired(True);
        yield ChoiceField::new('Status')->setChoices($this->allStatus)->hideOnIndex()->setRequired(True);
        //yield AssociationField::new('hersteller');       
        yield AssociationField::new('hersteller')->setCrudController(HerstellerCrudController::class);       

        yield TextField::new('model')->setRequired(True);
        yield TextField::new('seriennummer')->setRequired(True);

        yield FormField::addTab('Specification');
        yield FormField::addPanel('Specification');

        yield ChoiceField::new('Type')->setChoices($this->allTypes)->setRequired(True);
        yield TextField::new('mac_addr','MAC')->hideOnIndex();
        yield TextField::new('ip_addr','IP')->hideOnIndex();

        yield FormField::addTab('Another Information');
        yield FormField::addPanel('Another Information');
        
        yield AssociationField::new('user')->setRequired(True);
        yield AssociationField::new('location')->hideOnIndex()->setRequired(True);

        
    }
    
}
