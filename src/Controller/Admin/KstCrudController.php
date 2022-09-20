<?php

namespace App\Controller\Admin;

use App\Entity\Kst;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class KstCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kst::class;
    }

    public function configureActions(Actions $actions): Actions 
    {
        return $actions->disable(Action::DELETE);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
