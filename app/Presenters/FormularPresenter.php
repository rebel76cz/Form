<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Forms\FormularForm;
use Nette\Application\UI\Presenter;

class FormularPresenter extends Presenter
{
    protected function createComponentFormularForm(): FormularForm
    {
        $form = new FormularForm;
        $form->createForm();
        return $form;
    }
}
