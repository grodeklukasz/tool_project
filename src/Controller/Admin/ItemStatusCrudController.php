<?php

namespace App\Controller\Admin;

use App\Entity\ItemStatus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ItemStatusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ItemStatus::class;
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
