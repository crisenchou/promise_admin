<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute不合法',
    'active_url' => ':attribute不是合法的url',
    'after' => ':attribute必须超过:date.',
    'after_or_equal' => ':attribute不能小于:date',
    'alpha' => ':attribute必须是字母',
    'alpha_dash' => ':attribute只能是字母,数字,或者下划线',
    'alpha_num' => ':attribute只能是字母或数字',
    'array' => ':attribute必须是数组',
    'before' => ':attribute必须在:date之前',
    'before_or_equal' => ':attribute不能超过:date',
    'between' => [
        'numeric' => ':attribute必须介于:min和:max之间',
        'file' => ':attribute的大小必须介于:min字节和 :max 字节',
        'string' => ':attribute必须介于:min 字母和:max个字母之间',
        'array' => ':attribute必须介于:min项和 :max项之间',
    ],
    'boolean' => ':attribute必须是布尔类型',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'max' => [
        'numeric' => 'The :attribute不能超过:max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute最少是:min',
        'file' => ':attribute最少:min字节.',
        'string' => ':attribute最少是:min个字母.',
        'array' => ':attribute最少是:min项.',
    ],
    'not_in' => ':attribute不合法',
    'numeric' => ':attribute必须是数字',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':attribute必须填写',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values is present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => ':attribute和:other必须一致.',
    'size' => [
        'numeric' => 'The :attribute必须是:size',
        'file' => ':attribute必须是:size字节.',
        'string' => ':attribute必须是:size个字母.',
        'array' => ':attribute必须是:size项',
    ],
    'string' => ':attribute必须是字符串',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute已存在',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',

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

    'custom' => [
        'phone' => [
            'phone' => '手机号格式不正确',
            'size' => '手机号格式不正确'
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

    'attributes' => [
   
    ],

];
