<?php namespace App\Controllers;

use App\Models\AddressModel;
use App\Models\ContactModel;
use App\Models\PatientModel;

class Auth extends BaseController
{

    public function login()
    {
        $modelContact = new ContactModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $modelContact->getContactByEmail($email);
        $ses_data['msg'] = '';
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $user_FIO = $modelContact->userFIO($data['id']);
                $patientModel = new PatientModel();
                $patient_id = $patientModel->getPatientByContactId($data['id']);
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_FIO'      => $user_FIO,
                    'patient_id'    => $patient_id,
                    'user_name'     => $data['last_name'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE,
                    'msg'           => 'Ласкаво просимо! Нагадуемо, що: <br> Зелений колір - цей час вільний для запису, помаранчевий - це ваші записи, червоний - зайнято.'
                ];
                $this->session->set($ses_data);
                return redirect()->to('/calendar/index');
            }else{
                $ses_data = [
                    'msg' => 'Помилковий пароль.'
                ];
            }
        }else{
            $ses_data = [
                'msg' => 'Email не знайдено.'
            ];

        }
        $this->session->set($ses_data);
        return redirect()->to('/home/login');
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/home/login');
    }

    // create
    public function create() {

        helper(['form']);

        $this->db->transBegin();

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

        if ($modelAddress->save($dataAddress) === false)
        {
            $data = [
                'errors' => $modelAddress->errors(),
            ];
            $this->session->set($data);
            return redirect()->to('/home/register')->withInput();
        }

        $address_id = $modelAddress->insertID;

        $modelContact = new ContactModel();
        $dataContact = [
            'address_id' => $address_id,
            'first_name'  => $this->request->getVar('first_name'),
            'middle_name' => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'phone'  => $this->request->getVar('phone'),
            'email'  => $this->request->getVar('email'),
            'password' => ($this->request->getVar('password')) ? password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) : '',
            'birthday'  => $this->request->getVar('birthday'),
        ];

        if ($modelContact->save($dataContact) === false)
        {
            $data = [
                'errors' => $modelContact->errors(),
            ];
            $this->session->set($data);
            return redirect()->to('/home/register')->withInput();
        }

        $contact_id = $modelContact->insertID;

        $modelPatient = new PatientModel();
        $dataPatient = [
            'contact_id' => $contact_id,
            'medical_history'  => $this->request->getVar('medical_history'),
        ];

        if ($modelPatient->save($dataPatient) === false)
        {
            $data = [
                'errors' => $modelPatient->errors(),
            ];
            $this->session->set($data);
            return redirect()->to('/home/register')->withInput();
        }

        if ($this->db->transStatus() === FALSE)
        {
            $data = [
                'errors' => $this->db->errors(),
            ];
            $this->db->transRollback();

            $this->session->set($data);
            return redirect()->to('/home/register')->withInput();
        }
        else
        {
            $this->db->transCommit();
        }

        $patient_id = $modelPatient->insertID;
        $user_FIO = $modelContact->userFIO($contact_id);

        $data = [
            'msg'           => 'Ви все зробили чудово. Реєстрація пройшла успішно. <br> Зелений колір - цей час вільний для запису, помаранчевий - це ваші записи, червоний - час зайнято.',
            'user_id'       => $contact_id,
            'user_FIO'      => $user_FIO,
            'patient_id'    => $patient_id,
            'user_name'     => $dataContact['last_name'],
            'user_email'    => $dataContact['email'],
            'logged_in'     => TRUE
        ];

        $this->session->set($data);

        return redirect()->to('/calendar');
    }



}
