<?php

namespace App\Controller\Admin;

use App\Entity\HddTypes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HddTypesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HddTypes::class;
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
