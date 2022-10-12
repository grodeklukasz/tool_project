<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class AdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureActions(Actions $actions): Actions 
    {
        $addNewAdmin = Action::new('addNewAdmin', 'Add new', 'fa fa-user-plus')
        ->linkToRoute('app_add_user',
        function():array 
        {
            return [
                ''
            ];
        }
        );

        return $actions
        ->disable(Action::NEW)
        ->disable(Action::DELETE)
        ->disable(Action::EDIT)
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Information');
        yield FormField::addPanel('Information');
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('email');
        //yield TextField::new('password')->hideOnIndex();
        yield TextField::new('password','Kennwort')
        ->setFormType(PasswordType::class)
        ->setRequired($pageName==Crud::PAGE_NEW)
        ->onlyOnForms();
    }
    
}
