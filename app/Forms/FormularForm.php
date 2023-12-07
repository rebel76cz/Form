<?php

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;

class FormularForm extends Form
{
    public function createForm(): Form
    {
        $this->addText('firstname', 'First Name');
        $this->addText('lastname', 'Last Name');
        $this->addText('phone', 'Phone');
        $this->addDate('date', 'Date');

        $addressContainer = $this->addContainer('addressContainer');
        $addressContainer->addText('street', 'Street');
        $addressContainer->addText('city', 'City');
        $addressContainer->addText('country', 'Country');

        $this->addSubmit('send', 'Send');

        $this->onSuccess[] = [$this, 'processForm'];

        return $this;
    }

    private function getAddressContainerData(\stdClass $addressContainer): \stdClass
    {
        $data = new \stdClass();
        $data->street = $addressContainer->street;
        $data->city = $addressContainer->city;
        $data->country = $addressContainer->country;

        return $data;
    }

    public function processForm(Form $form, \stdClass $values): void
    {
        $firstname = $values->firstname;
        $lastname = $values->lastname;
        $phone = $values->phone;

        $date = isset($values->date) ? $values->date->format('Y-m-d') : null;

        $addressData = $this->getAddressContainerData($values->addressContainer);

        $formData = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'date' => $date,
            'street' => $addressData->street,
            'city' => $addressData->city,
            'country' => $addressData->country,
        ];

        $this->getPresenter()->redirect('Answer:answer', ['formData' => $formData]);
    }
}
