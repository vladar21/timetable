<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AddressModel;
use App\Models\ContactModel;
use App\Models\PatientModel;

class Auth extends ResourceController
{
    use ResponseTrait;

    // create
    public function create() {
        $modelAddress = new AddressModel();
        $dataAddress = [
            'zipcode' => $this->request->getVar('zipcode'),
            'country'  => $this->request->getVar('country'),
            'region' => $this->request->getVar('region'),
            'locality'  => $this->request->getVar('locality'),
            'street'  => $this->request->getVar('street'),
            'house'  => $this->request->getVar('house'),
            'apartment'  => $this->request->getVar('apartment'),
        ];
        $modelAddress->insert($dataAddress);

        $address_id = $modelAddress->insertID;

        $modelContact = new ContactModel();
        $dataContact = [
            'address_id' => $address_id,
            'first_name'  => $this->request->getVar('first_name'),
            'middle_name' => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'phone'  => $this->request->getVar('phone'),
            'email'  => $this->request->getVar('email'),
            'birthday'  => $this->request->getVar('birthday'),
        ];
        $modelContact->insert($dataContact);

        $contact_id = $modelContact->insertID;

        $modelPatient = new PatientModel();
        $dataPatient = [
            'contact_id' => $contact_id,
            'medical_history'  => $this->request->getVar('medical_history'),
        ];
        $modelPatient->insert($dataPatient);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Ви все зробили чудово. Реєстрація пройшла успішно.'
            ]
        ];
        return $this->respondCreated($response);
    }

}
