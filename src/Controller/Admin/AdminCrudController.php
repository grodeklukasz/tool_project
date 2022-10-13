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
        $addNewAdmin = Action::new('editAdmin', 'Edit', 'fa fa-user-circle-o')
        ->linkToRoute('app_edit_admin',
        function(Admin $admin):array 
        {
            return [
                'admin_id' => $admin->getId()
            ];
        }
        );

        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_DETAIL, $addNewAdmin)
        ->disable(Action::NEW)
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
