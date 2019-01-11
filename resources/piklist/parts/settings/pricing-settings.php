<?php
/*
Title: Pricing Settings
Setting: dancefloor_settings
Tab: Pricing
Flow: Dancefloor Workflow
*/


// https://gist.github.com/champsupertramp/95493faa7ba12b61bf6e
piklist('field', [
  'type'    => 'select',
  'field'   => 'df_currency',
  'value'   => 'CHF',
  'label'   => __('Currency','sage'),
  'columns'   => 5,
  'choices' => array (
    // 'ALL' => 'Albania Lek',
    // 'AFN' => 'Afghanistan Afghani',
    // 'ARS' => 'Argentina Peso',
    // 'AWG' => 'Aruba Guilder',
    // 'AUD' => 'Australia Dollar',
    // 'AZN' => 'Azerbaijan New Manat',
    // 'BSD' => 'Bahamas Dollar',
    // 'BBD' => 'Barbados Dollar',
    // 'BDT' => 'Bangladeshi taka',
    // 'BYR' => 'Belarus Ruble',
    // 'BZD' => 'Belize Dollar',
    // 'BMD' => 'Bermuda Dollar',
    // 'BOB' => 'Bolivia Boliviano',
    'BAM' => 'Bosnia and Herzegovina Convertible Marka (BAM)',
    // 'BWP' => 'Botswana Pula',
    // 'BGN' => 'Bulgaria Lev',
    // 'BRL' => 'Brazil Real',
    // 'BND' => 'Brunei Darussalam Dollar',
    // 'KHR' => 'Cambodia Riel',
    // 'CAD' => 'Canada Dollar (CAD)',
    // 'KYD' => 'Cayman Islands Dollar',
    // 'CLP' => 'Chile Peso',
    // 'CNY' => 'China Yuan Renminbi',
    // 'COP' => 'Colombia Peso',
    // 'CRC' => 'Costa Rica Colon',
    'HRK' => 'Croatia Kuna',
    // 'CUP' => 'Cuba Peso',
    // 'CZK' => 'Czech Republic Koruna',
    // 'DKK' => 'Denmark Krone',
    // 'DOP' => 'Dominican Republic Peso',
    // 'XCD' => 'East Caribbean Dollar',
    // 'EGP' => 'Egypt Pound',
    // 'SVC' => 'El Salvador Colon',
    // 'EEK' => 'Estonia Kroon',
    'EUR' => 'Euro (EUR)',
    // 'FKP' => 'Falkland Islands (Malvinas) Pound',
    // 'FJD' => 'Fiji Dollar',
    // 'GHC' => 'Ghana Cedis',
    // 'GIP' => 'Gibraltar Pound',
    // 'GTQ' => 'Guatemala Quetzal',
    // 'GGP' => 'Guernsey Pound',
    // 'GYD' => 'Guyana Dollar',
    // 'HNL' => 'Honduras Lempira',
    // 'HKD' => 'Hong Kong Dollar',
    // 'HUF' => 'Hungary Forint',
    // 'ISK' => 'Iceland Krona',
    // 'INR' => 'India Rupee',
    // 'IDR' => 'Indonesia Rupiah',
    // 'IRR' => 'Iran Rial',
    // 'IMP' => 'Isle of Man Pound',
    // 'ILS' => 'Israel Shekel',
    // 'JMD' => 'Jamaica Dollar',
    // 'JPY' => 'Japan Yen',
    // 'JEP' => 'Jersey Pound',
    // 'KZT' => 'Kazakhstan Tenge',
    // 'KPW' => 'Korea (North) Won',
    // 'KRW' => 'Korea (South) Won',
    // 'KGS' => 'Kyrgyzstan Som',
    // 'LAK' => 'Laos Kip',
    // 'LVL' => 'Latvia Lat',
    // 'LBP' => 'Lebanon Pound',
    // 'LRD' => 'Liberia Dollar',
    // 'LTL' => 'Lithuania Litas',
    // 'MKD' => 'Macedonia Denar',
    // 'MYR' => 'Malaysia Ringgit',
    // 'MUR' => 'Mauritius Rupee',
    // 'MXN' => 'Mexico Peso',
    // 'MNT' => 'Mongolia Tughrik',
    // 'MZN' => 'Mozambique Metical',
    // 'NAD' => 'Namibia Dollar',
    // 'NPR' => 'Nepal Rupee',
    // 'ANG' => 'Netherlands Antilles Guilder',
    // 'NZD' => 'New Zealand Dollar',
    // 'NIO' => 'Nicaragua Cordoba',
    // 'NGN' => 'Nigeria Naira',
    // 'NOK' => 'Norway Krone',
    // 'OMR' => 'Oman Rial',
    // 'PKR' => 'Pakistan Rupee',
    // 'PAB' => 'Panama Balboa',
    // 'PYG' => 'Paraguay Guarani',
    // 'PEN' => 'Peru Nuevo Sol',
    // 'PHP' => 'Philippines Peso',
    // 'PLN' => 'Poland Zloty',
    // 'QAR' => 'Qatar Riyal',
    // 'RON' => 'Romania New Leu',
    // 'RUB' => 'Russia Ruble',
    // 'SHP' => 'Saint Helena Pound',
    // 'SAR' => 'Saudi Arabia Riyal',
    'RSD' => 'Serbia Dinar (RSD)',
    // 'SCR' => 'Seychelles Rupee',
    // 'SGD' => 'Singapore Dollar',
    // 'SBD' => 'Solomon Islands Dollar',
    // 'SOS' => 'Somalia Shilling',
    // 'ZAR' => 'South Africa Rand',
    // 'LKR' => 'Sri Lanka Rupee',
    'SEK' => 'Sweden Krona (SEK)',
    'CHF' => 'Swiss Franc (CHF)',
    // 'SRD' => 'Suriname Dollar',
    // 'SYP' => 'Syria Pound',
    // 'TWD' => 'Taiwan New Dollar',
    // 'THB' => 'Thailand Baht',
    // 'TTD' => 'Trinidad and Tobago Dollar',
    // 'TRY' => 'Turkey Lira',
    // 'TRL' => 'Turkey Lira',
    // 'TVD' => 'Tuvalu Dollar',
    // 'UAH' => 'Ukraine Hryvna',
    'GBP' => 'United Kingdom Pound (GBP)',
    'USD' => 'United States Dollar (USD)',
    // 'UYU' => 'Uruguay Peso',
    // 'UZS' => 'Uzbekistan Som',
    // 'BSF' => 'Venezuela Bolivar',
    // 'VND' => 'Viet Nam Dong',
    // 'YER' => 'Yemen Rial',
    // 'ZWD' => 'Zimbabwe Dollar'
  )
]);

piklist('field',[
  'type'      => 'number',
  'field'     => 'df_default_regular_price',
  'label'     => 'Price',
  'help'      => 'Please enter the default regular price',
  'columns'   => 1
]);

piklist('field',[
  'type'      => 'number',
  'field'     => 'df_default_reduced_price',
  'label'     => 'Reduced Price',
  'help'      => 'Please enter the default reduced price',
  'columns'   => 1
]);

$price_title = [
  'type'      => 'text',
  'field'     => 'df_price_title',
  'label'     => 'Price Title',
  'columns'   => 4
];

$price_nb_hours = [
  'type'      => 'text',
  'field'     => 'df_price_nb_hours',
  'label'     => 'Hours/class',
  'columns'   => 2
];

$number_of_sessions = [
  'type'      => 'number',
  'field'     => 'df_price_nb_sessions',
  'label'     => 'Total lessons',
  'columns'   => 2
];

$is_reduced = [
  'type'      => 'select',
  'field'     => 'df_price_is_reduced',
  'label'     => 'Reduced ?',
  'help'      => 'Reduced refers to students and unemployed',
  'columns'   => 2,
  'value'     => 'regular',
  'choices'   => [
    'normal'  => 'Normal',
    'reduced' => 'Reduced'
  ]
];

$normal_price = [
  'type'      => 'number',
  'field'     => 'df_price_normal',
  'label'     => 'Price',
  'columns'   => 1
];

$discount_price = [
  'type'      => 'number',
  'field'     => 'df_price_discount',
  'label'     => 'Discount',
  'columns'   => 1
];

$price_description = [
  'type'      => 'text',
  'field'     => 'df_price_description',
  'label'     => 'Description',
  'columns'   => 12
];

piklist('field',array(
  'type'      => 'group',
  'label'     => __('Class Price','sage'),
  'add_more'  => true,
  'fields'    => array(
    $price_title,
    $price_nb_hours,
    $number_of_sessions,
    $is_reduced,
    $normal_price,
    $discount_price,
    $price_description,
  )
));
