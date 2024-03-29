<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => 'Polje :attribute mora biti prihvaćeno.',
    'active_url'           => 'Polje :attribute nije validan URL.',
    'after'                => 'Polje :attribute mora biti datum posle :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'Polje :attribute može sadržati samo slova.',
    'alpha_dash'           => 'Polje :attribute može sadržati samo slova, brojeve i povlake.',
    'alpha_num'            => 'Polje :attribute može sadržati samo slova i brojeve.',
    'array'                => 'Polje :attribute mora sadržati nekih niz stavki.',
    'before'               => 'Polje :attribute mora biti datum pre :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Polje :attribute mora biti između :min - :max.',
        'file'    => 'Fajl :attribute mora biti između :min - :max kilobajta.',
        'string'  => 'Polje :attribute mora biti između :min - :max karaktera.',
        'array'   => 'Polje :attribute mora biti između :min - :max stavki.',
    ],
    'boolean'              => 'Polje :attribute mora biti tačno ili netačno',
    'confirmed'            => 'Potvrda polja :attribute se ne poklapa.',
    'date'                 => 'Polje :attribute nije važeći datum.',
    'date_format'          => 'Polje :attribute ne odgovora prema formatu :format.',
    'different'            => 'Polja :attribute i :other moraju biti različita.',
    'digits'               => 'Polje :attribute mora sadržati :digits šifri.',
    'digits_between'       => 'Polje :attribute mora biti izemđu :min i :max šifri.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'Format polja :attribute nije validan.',
    'exists'               => 'Odabrano polje :attribute nije validno.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'Polje :attribute je obavezno.',
    'image'                => 'Polje :attribute mora biti slika.',
    'in'                   => 'Odabrano polje :attribute nije validno.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Polje :attribute mora biti broj.',
    'ip'                   => 'Polje :attribute mora biti validna IP adresa.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Polje :attribute mora biti manje od :max.',
        'file'    => 'Polje :attribute mora biti manje od :max kilobajta.',
        'string'  => 'Polje :attribute mora sadržati manje od :max karaktera.',
        'array'   => 'Polje :attribute ne smije da image više od :max stavki.',
    ],
    'mimes'                => 'Polje :attribute mora biti fajl tipa: :values.',
    'mimetypes'            => 'Polje :attribute mora biti fajl tipa: :values.',
    'min'                  => [
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
        'file'    => 'Fajl :attribute mora biti najmanje :min kilobajta.',
        'string'  => 'Polje :attribute mora sadržati najmanje :min karaktera.',
        'array'   => 'Polje :attribute mora sadrzati najmanje :min stavku.',
    ],
    'not_in'               => 'Odabrani element polja :attribute nije validan.',
    'numeric'              => 'Polje :attribute mora biti broj.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'Format polja :attribute nije validan.',
    'required'             => 'Polje :attribute je obavezno.',
    'required_if'          => 'Polje :attribute je potrebno kada polje :other sadrži :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'Polje :attribute je potrebno kada polje :values je prisutan.',
    'required_with_all'    => 'Polje :attribute je obavezno kada je :values prikazano.',
    'required_without'     => 'Polje :attribute je potrebno kada polje :values nije prisutan.',
    'required_without_all' => 'Polje :attribute je potrebno kada nijedan od sledeći polja :values nisu prisutni.',
    'same'                 => 'Polja :attribute i :other se moraju poklapati.',
    'size'                 => [
        'numeric' => 'Polje :attribute mora biti :size.',
        'file'    => 'Fajl :attribute mora biti :size kilobajta.',
        'string'  => 'Polje :attribute mora biti :size karaktera.',
        'array'   => 'Polje :attribute mora sadržati :size stavki.',
    ],
    'string'               => 'Polje :attribute mora sadržati slova.',
    'timezone'             => 'Polje :attribute mora biti ispravna vremenska zona.',
    'unique'               => 'Polje :attribute već postoji.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'Format polja :attribute ne važi.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'g-recaptcha-response' =>[
               'required' => 'Polje google recaptcha je obavezno.',
               'captcha' => 'Polje recaptcha - došlo je do greške.',
        ],
        'name' => [
            'required' => 'Polje ime je obavezno.',
            'max' => 'Polje ime mora sadržati manje od 50 karaktera.',
        ],
        'phone' => [
            'required' => 'Polje telefon je obavezno.',
             'max' => 'Polje telefon mora sadržati manje od 20 cifara.',
        ],
        'theme' => [
            'required' => 'Polje tema je obavezno.',
             'max' => 'Tema mora sadržati manje od 50 karaktera.',
        ],
        'question'=> [
            'required' => 'Polje pitanje je obavezno.',
             'max' => 'Pitanje može da sadrži maksimalno do 1500 karaktera.',
        ],
         'post_title' => [
            'required' => 'Naslov je obavezn.',
            'max' => 'Naslov mora sadržati manje od 200 karaktera.',
        ],
        'post_desc' => [
            'required' => 'Kratak opis je obavezan.',
            'max' => 'Kratak opis može sadržati maksimalno do 160 karaktera.',
        ],
         'slug' => [
            'required' => 'Url slug je obavezan.',
            'unique' => 'Url slug mora biti unikatan.',
        ],
         'post_body' => [
            'required' => 'Sadžaj je obavezan.',
            'max' => 'Sadžaj može sadržati maksimalno  do 10000 karaktera.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        //
    ],

];
