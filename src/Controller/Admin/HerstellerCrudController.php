<?php

namespace App\Controller\Admin;

use App\Entity\Hersteller;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HerstellerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hersteller::class;
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
