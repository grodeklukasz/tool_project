<?php

namespace App\Controller\Admin;

use App\Entity\Kst;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KstCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kst::class;
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
