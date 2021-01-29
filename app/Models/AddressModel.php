<?php namespace App\Models;

use CodeIgniter\Model;


class AddressModel extends BaseModel
{
    protected $table      = 'address';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['zipcode', 'country', 'region', 'locality', 'street', 'house', 'apartment'];

    protected $useTimestamps = false;

    protected $validationRules    = [
        'zipcode'   => 'required|numeric|min_length[5]|max_length[5]',
        'country'   => 'required',
        'region'    => 'required',
        'locality'  => 'required',
        'street'    => 'required',
        'house'     => 'required',
        'apartment' => 'required'
    ];

    protected $validationMessages = [
        'zipcode' => [
            'required'   => 'Поштовий індекс адреси прописки обов\'язковий.',
            'numeric'    => 'Поштовий індекс адреси прописки має містити тільки цифри.',
            'min_length' => 'Поштовий індекс адреси прописки має містити тільки п\'ять цифр.',
            'max_length' => 'Поштовий індекс адреси прописки має містити тільки п\'ять цифр.'
        ],
        'country' => [
            'required' => 'Страна адреси прописки обов\'язкова.'
        ],
        'region' => [
            'required' => 'Область адреси прописки обов\'язкова.'
        ],
        'locality' => [
            'required' => 'Населений пункт адреси прописки обов\'язковий.'
        ],
        'street' => [
            'required' => 'Вулиця адреси прописки обов\'язкова.'
        ],
        'house' => [
            'required' => 'Номер будинка (помещкання) адреси прописки обов\'язковий.'
        ],
        'apartment' => [
            'required' => 'Квартира адреси прописки обов\'язкова.'
        ],

    ];
    protected $skipValidation     = false;




}
