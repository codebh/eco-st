<?php

// return [

//     /*
//     |--------------------------------------------------------------------------
//     | Validation Language Lines
//     |--------------------------------------------------------------------------
//     |
//     | The following language lines contain the default error messages used by
//     | the validator class. Some of these rules have multiple versions such
//     | as the size rules. Feel free to tweak each of these messages here.
//     |
//     */

//     'accepted' => 'The :attribute must be accepted.',
//     'active_url' => 'The :attribute is not a valid URL.',
//     'after' => 'The :attribute must be a date after :date.',
//     'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
//     'alpha' => 'The :attribute may only contain letters.',
//     'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
//     'alpha_num' => 'The :attribute may only contain letters and numbers.',
//     'array' => 'The :attribute must be an array.',
//     'before' => 'The :attribute must be a date before :date.',
//     'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
//     'between' => [
//         'numeric' => 'The :attribute must be between :min and :max.',
//         'file' => 'The :attribute must be between :min and :max kilobytes.',
//         'string' => 'The :attribute must be between :min and :max characters.',
//         'array' => 'The :attribute must have between :min and :max items.',
//     ],
//     'boolean' => 'The :attribute field must be true or false.',
//     'confirmed' => 'The :attribute confirmation does not match.',
//     'date' => 'The :attribute is not a valid date.',
//     'date_equals' => 'The :attribute must be a date equal to :date.',
//     'date_format' => 'The :attribute does not match the format :format.',
//     'different' => 'The :attribute and :other must be different.',
//     'digits' => 'The :attribute must be :digits digits.',
//     'digits_between' => 'The :attribute must be between :min and :max digits.',
//     'dimensions' => 'The :attribute has invalid image dimensions.',
//     'distinct' => 'The :attribute field has a duplicate value.',
//     'email' => 'The :attribute must be a valid email address.',
//     'ends_with' => 'The :attribute must end with one of the following: :values.',
//     'exists' => 'The selected :attribute is invalid.',
//     'file' => 'The :attribute must be a file.',
//     'filled' => 'The :attribute field must have a value.',
//     'gt' => [
//         'numeric' => 'The :attribute must be greater than :value.',
//         'file' => 'The :attribute must be greater than :value kilobytes.',
//         'string' => 'The :attribute must be greater than :value characters.',
//         'array' => 'The :attribute must have more than :value items.',
//     ],
//     'gte' => [
//         'numeric' => 'The :attribute must be greater than or equal :value.',
//         'file' => 'The :attribute must be greater than or equal :value kilobytes.',
//         'string' => 'The :attribute must be greater than or equal :value characters.',
//         'array' => 'The :attribute must have :value items or more.',
//     ],
//     'image' => 'The :attribute must be an image.',
//     'in' => 'The selected :attribute is invalid.',
//     'in_array' => 'The :attribute field does not exist in :other.',
//     'integer' => 'The :attribute must be an integer.',
//     'ip' => 'The :attribute must be a valid IP address.',
//     'ipv4' => 'The :attribute must be a valid IPv4 address.',
//     'ipv6' => 'The :attribute must be a valid IPv6 address.',
//     'json' => 'The :attribute must be a valid JSON string.',
//     'lt' => [
//         'numeric' => 'The :attribute must be less than :value.',
//         'file' => 'The :attribute must be less than :value kilobytes.',
//         'string' => 'The :attribute must be less than :value characters.',
//         'array' => 'The :attribute must have less than :value items.',
//     ],
//     'lte' => [
//         'numeric' => 'The :attribute must be less than or equal :value.',
//         'file' => 'The :attribute must be less than or equal :value kilobytes.',
//         'string' => 'The :attribute must be less than or equal :value characters.',
//         'array' => 'The :attribute must not have more than :value items.',
//     ],
//     'max' => [
//         'numeric' => 'The :attribute may not be greater than :max.',
//         'file' => 'The :attribute may not be greater than :max kilobytes.',
//         'string' => 'The :attribute may not be greater than :max characters.',
//         'array' => 'The :attribute may not have more than :max items.',
//     ],
//     'mimes' => 'The :attribute must be a file of type: :values.',
//     'mimetypes' => 'The :attribute must be a file of type: :values.',
//     'min' => [
//         'numeric' => 'The :attribute must be at least :min.',
//         'file' => 'The :attribute must be at least :min kilobytes.',
//         'string' => 'The :attribute must be at least :min characters.',
//         'array' => 'The :attribute must have at least :min items.',
//     ],
//     'multiple_of' => 'The :attribute must be a multiple of :value',
//     'not_in' => 'The selected :attribute is invalid.',
//     'not_regex' => 'The :attribute format is invalid.',
//     'numeric' => 'The :attribute must be a number.',
//     'password' => 'The password is incorrect.',
//     'present' => 'The :attribute field must be present.',
//     'regex' => 'The :attribute format is invalid.',
//     'required' => 'The :attribute field is required.',
//     'required_if' => 'The :attribute field is required when :other is :value.',
//     'required_unless' => 'The :attribute field is required unless :other is in :values.',
//     'required_with' => 'The :attribute field is required when :values is present.',
//     'required_with_all' => 'The :attribute field is required when :values are present.',
//     'required_without' => 'The :attribute field is required when :values is not present.',
//     'required_without_all' => 'The :attribute field is required when none of :values are present.',
//     'same' => 'The :attribute and :other must match.',
//     'size' => [
//         'numeric' => 'The :attribute must be :size.',
//         'file' => 'The :attribute must be :size kilobytes.',
//         'string' => 'The :attribute must be :size characters.',
//         'array' => 'The :attribute must contain :size items.',
//     ],
//     'starts_with' => 'The :attribute must start with one of the following: :values.',
//     'string' => 'The :attribute must be a string.',
//     'timezone' => 'The :attribute must be a valid zone.',
//     'unique' => 'The :attribute has already been taken.',
//     'uploaded' => 'The :attribute failed to upload.',
//     'url' => 'The :attribute format is invalid.',
//     'uuid' => 'The :attribute must be a valid UUID.',

//     /*
//     |--------------------------------------------------------------------------
//     | Custom Validation Language Lines
//     |--------------------------------------------------------------------------
//     |
//     | Here you may specify custom validation messages for attributes using the
//     | convention "attribute.rule" to name the lines. This makes it quick to
//     | specify a specific custom language line for a given attribute rule.
//     |
//     */

//     'custom' => [
//         'attribute-name' => [
//             'rule-name' => 'custom-message',
//         ],
//     ],

//     /*
//     |--------------------------------------------------------------------------
//     | Custom Validation Attributes
//     |--------------------------------------------------------------------------
//     |
//     | The following language lines are used to swap our attribute placeholder
//     | with something more reader friendly such as "E-Mail Address" instead
//     | of "email". This simply helps us make our message more expressive.
//     |
//     */

//     'attributes' => [],

// ];


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

    'accepted'             => 'يجب قبول الحقل :attribute',
    'active_url'           => 'الحقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على الحقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => 'الحقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي الحقل :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي الحقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون الحقل :attribute ًمصفوفة',
    'before'               => 'يجب على الحقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => 'الحقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة الحقل :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => 'الحقل :attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق الحقل :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي الحقل :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي الحقل :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'يجب أن تكون أبعاد :attribute  و حجمها أقل من 10 ميجابايت.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'الحقل :attribute لاغٍ',
    'file'                 => 'الـ :attribute يجب أن يكون من ملفا.',
    'filled'               => 'الحقل :attribute إجباري',
    'image'                => 'يجب أن يكون الحقل :attribute صورةً',
    'in'                   => 'الحقل :attribute لاغٍ',
    'in_array'             => 'الحقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون الحقل :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون الحقل :attribute عنوان IP ذا بُنية صحيحة',
    'ipv4'                 => 'يجب أن يكون الحقل :attribute عنوان IPv4 ذا بنية صحيحة.',
    'ipv6'                 => 'يجب أن يكون الحقل :attribute عنوان IPv6 ذا بنية صحيحة.',
    'json'                 => 'يجب أن يكون الحقل :attribute نصا من نوع JSON.',
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أصغر لـ :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول نص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي الحقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أكبر لـ :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول نص :attribute على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي الحقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => 'الحقل :attribute لاغٍ',
    'numeric'              => 'يجب على الحقل :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم الحقل :attribute',
    'regex'                => 'صيغة الحقل :attribute .غير صحيحة',
    'required'             => 'حقل :attribute مطلوب.',
    'required_if'          => 'الحقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => 'الحقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => 'الحقل :attribute إذا توفّر :values.',
    'required_with_all'    => 'الحقل :attribute إذا توفّر :values.',
    'required_without'     => 'الحقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق الحقل :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array'   => 'يجب أن يحتوي الحقل :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'string'               => 'يجب أن يكون الحقل :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة الحقل :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
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
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'price'                 => 'السعر',
        'desc'                  => 'نبذه',
        'title'                 => 'العنوان',
        'q'                     => 'البحث',
        'link'                  => ' ',
        'slug'                  => ' ',
    ],

];
