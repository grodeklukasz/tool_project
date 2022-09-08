<?php

namespace App\Controller\Admin;

use App\Entity\Benutzer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BenutzerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Benutzer::class;
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
