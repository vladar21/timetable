<?php namespace App\Controllers;

use CodeIgniter\Controller;

//use CodeIgniter\RESTful\ResourceController;
//use CodeIgniter\API\ResponseTrait;
use App\Models\AddressModel;
use App\Models\ContactModel;
use App\Models\PatientModel;

//class Auth extends ResourceController
class Auth extends BaseController
{
    //use ResponseTrait;

    public function login()
    {

        //$session = session();
        $session = session();
        $model = new ContactModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['last_name'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                var_dump($ses_data);
                return redirect()->to('/calendar');
            }else{
                $session->setFlashdata('msg', 'Помилковий пароль');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email не знайдено');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    // create
    public function create() {

        helper(['form']);

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
        //$modelAddress->insert($dataAddress);
        $modelAddress->save($dataAddress);

        $address_id = $modelAddress->insertID;

        $modelContact = new ContactModel();
        $dataContact = [
            'address_id' => $address_id,
            'first_name'  => $this->request->getVar('first_name'),
            'middle_name' => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'phone'  => $this->request->getVar('phone'),
            'email'  => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'birthday'  => $this->request->getVar('birthday'),
        ];
        //$modelContact->insert($dataContact);
        $modelContact->save($dataContact);

        $contact_id = $modelContact->insertID;

        $modelPatient = new PatientModel();
        $dataPatient = [
            'contact_id' => $contact_id,
            'medical_history'  => $this->request->getVar('medical_history'),
        ];
        //$modelPatient->insert($dataPatient);
        $modelPatient->save($dataPatient);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Ви все зробили чудово. Реєстрація пройшла успішно.'
            ]
        ];
        //return $this->respondCreated($response);
        return redirect()->to('/calendar');
    }



}
