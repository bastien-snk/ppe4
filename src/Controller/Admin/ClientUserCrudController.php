<?php

namespace App\Controller\Admin;

use App\Entity\ClientUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ClientUser::class;
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
