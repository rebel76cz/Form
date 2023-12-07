<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Application\UI\Presenter;

class AnswerPresenter extends Presenter
{
    private array $formData;

    public function actionAnswer(array $formData)
    {
        $this->formData = $formData;
        $this->template->formData = $this->formData;
    }
}
