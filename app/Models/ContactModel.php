<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\I18n\TimeDifference;
use CodeIgniter\Model;

class ContactModel extends BaseModel
{
    protected $table      = 'contacts';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['address_id', 'first_name', 'middle_name', 'last_name', 'phone', 'email', 'birthday', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'first_name'    => 'required',
        'middle_name'   => 'required',
        'last_name'     => 'required',
        'phone'         => 'required|numeric|max_length[12]',
        'email'         => 'required|valid_email|is_unique[contacts.email]',
        'birthday'      => 'required|valid_date|callback_birthday',
        'password'      => 'required',
    ];

    protected $validationMessages = [
        'first_name'      => [
            'required'        => 'Ваше ім\'я обов\'язкове.'
        ],
        'middle_name'     => [
            'required'        => 'Ваше по батькові обов\'язкове.'
        ],
        'last_name'       => [
            'required'        => 'Ваша фамілія обов\'язкова.'
        ],
        'phone'           => [
            'required'         => 'Ваш контактний телефон обов\'язковий.',
            'numeric'          => 'В цьщму полі можуть бути введені тільки цифри.',
            'max_length'       => 'Максимальна кідлькість цифр у цьщму полі 12.'
        ],
        'email'           => [
            'required'          => 'Ваш контактний email обов\'язковий.',
            'valid_email'       => 'Помилка в синтаксисі email',
            'is_unique'         => 'Такий email вже є у базі даних.'
        ],
        'birthday'         => [
            'required'          => 'Дата вашого народження обов\'язкова.',
            'valid_date'        => 'Помилка в синтаксисі, скористуйтеся календарем.',
            'callback_birthday' => 'Для користування сервісом, Вам має бути 18 або бльше років.'
        ],
        'password'         => [
            'required'          => 'Пароль обов\'язковий.'
        ]
    ];
    protected $skipValidation     = false;

    function getContactById($contact_id){
        $result = $this->where('id', $contact_id)->first();
        return $result;
    }

    function getContactByEmail($email){
        $result = $this->where('email', $email)->first();
        return $result;
    }

    function userFIO ($id)
    {
        if ($id >= 0){
            $user = $this->find($id);
            if ($user){
                $lastname = (isset($user['last_name'])) ? $user['last_name'] : '';
                $firstname = (isset($user['first_name'])) ? $user['first_name'] : '  ';
                $middlename = (isset($user['middle_name'])) ? $user['middle_name'] : '  ';
                $F = strtoupper(substr($firstname, 0, 2));
                $M = strtoupper(substr($middlename, 0, 2));
                $userFIO = $lastname.'&nbsp;'.$F.'.'.$M.'.';
                return $userFIO;
            }
        }

        return -1;
    }
}
