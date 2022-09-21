<?php

namespace App\Controller\Admin;

use App\Entity\Handy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HandyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Handy::class;
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
