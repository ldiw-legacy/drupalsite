<?php
function letsdoitworld_preprocess_page(&$variables) {
 
  if ($variables['language']->language == 'ru') {
    header("Location: http://sdelaem.info/");
    exit;
 }
  if (isset($variables['node'] -> type) && $variables['node'] -> type != '') {
    $variables['template_files'][] = 'page-node-' . $variables['node'] -> type;
  }
// makes online request, not suggested:
//   list($variables['country_iso2code'],$variables['latitude'],$variables['longitude']) = return_country_location();
  // from local DB:
  $geoip_result=geoip_city();
  if ($geoip_result && isset($geoip_result->longitude) &&
  		isset($geoip_result->latitude)) {
  	$variables['country_iso2code'] = $geoip_result->country_code;
  	$variables['longitude'] = $geoip_result->longitude;
  	$variables['latitude'] = $geoip_result->latitude;
  }

   $variables['country_name'] = country_code_to_country($variables['country_iso2code']);

}
function return_country_location() {
  include('ip2locationlite.class.php');
  $ipLite = new ip2location_lite;
  //$ipLite->setKey('0474402d95aa5179cd8a502df05228cc9f8b9005e9317518d53058093827939e');
  $ipLite->setKey('5869ad56a8b492659cf31eb8c5f663ab15726403f478ace5ebb2c38221514627');
  // get location code based on user IP

  if($_SERVER['REMOTE_ADDR'] == "127.0.0.1"){
  	$local_countryCodeISO2 = 'EE';
  }else{
  	$visitorGeolocation = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
  	if ($visitorGeolocation['statusCode'] == 'OK') {
  		$local_countryCodeISO2 = $visitorGeolocation['countryCode'];
  	} else {
  		// fall back to Estonia if there's a problem
  		$local_countryCodeISO2 = 'EE';
  	}
  }

  return Array(
  		strtolower($local_countryCodeISO2),
  		$visitorGeolocation['latitude'],
  		$visitorGeolocation['longitude']
  		);
}

function front_flag_url($local_county_iso2code){
  return base_path() . path_to_theme() . "/images/flags/mini/".strtolower($local_county_iso2code).".png";

}
function get_country_website($local_county_iso2code){
  $local_country_name = strtolower(country_code_to_country($local_county_iso2code));
  return "/country/$local_country_name";

}

function get_country_date($local_country_iso2code) {
    $local_country_iso2code = strtoupper($local_country_iso2code);

    if( $local_county_iso2code == 'BJ' ) $cleanup_date = '17.11.2012';
    if( $local_county_iso2code == 'MK' ) $cleanup_date = '06.10.2012';
    if( $local_county_iso2code == 'IT' ) $cleanup_date = '30.09.2012';
    if( $local_county_iso2code == 'CY' ) $cleanup_date = '29.09.2012';
    if( $local_county_iso2code == 'KZ' ) $cleanup_date = '24.09.2012';
    if( $local_county_iso2code == 'AL' ) $cleanup_date = '23.09.2012';
    if( $local_county_iso2code == 'FR' ) $cleanup_date = '22.09.2012';
    if( $local_county_iso2code == 'BE' ) $cleanup_date = '22.09.2012';
    if( $local_county_iso2code == 'NL' ) $cleanup_date = '21.09.2012';
    if( $local_county_iso2code == 'DE' ) $cleanup_date = '21.09.2012';
    if( $local_county_iso2code == 'PH' ) $cleanup_date = '15.09.2012';
    if( $local_county_iso2code == 'AM' ) $cleanup_date = '15.09.2012';
    if( $local_county_iso2code == 'BY' ) $cleanup_date = '15.09.2012';
    if( $local_county_iso2code == 'RU' ) $cleanup_date = '15.09.2012';
    if( $local_county_iso2code == 'ZA' ) $cleanup_date = '10.09.2012';
    if( $local_county_iso2code == 'BA' ) $cleanup_date = '09.09.2012';
    if( $local_county_iso2code == 'LB' ) $cleanup_date = '08.09.2012';
    if( $local_county_iso2code == 'SA' ) $cleanup_date = '30.08.2012';
    if( $local_county_iso2code == 'KH' ) $cleanup_date = '28.08.2012';
    if( $local_county_iso2code == 'SV' ) $cleanup_date = '25.08.2012';
    if( $local_county_iso2code == 'TT' ) $cleanup_date = '18.08.2012';
    if( $local_county_iso2code == 'LC' ) $cleanup_date = '29.07.2012';
    if( $local_county_iso2code == 'VE' ) $cleanup_date = '08.07.2012';
    if( $local_county_iso2code == 'MY' ) $cleanup_date = '01.07.2012';
    if( $local_county_iso2code == 'GH' ) $cleanup_date = '30.06.2012';
    if( $local_county_iso2code == 'AZ' ) $cleanup_date = '23.06.2012';
    if( $local_county_iso2code == 'NG' ) $cleanup_date = '23.06.2012';
    if( $local_county_iso2code == 'CA' ) $cleanup_date = '08.06.2012';
    if( $local_county_iso2code == 'CM' ) $cleanup_date = '06.06.2012';
    if( $local_county_iso2code == 'BD' ) $cleanup_date = '05.06.2012';
    if( $local_county_iso2code == 'NP' ) $cleanup_date = '05.06.2012';
    if( $local_county_iso2code == 'IN' ) $cleanup_date = '05.06.2012';
    if( $local_county_iso2code == 'HU' ) $cleanup_date = '02.06.2012';
    if( $local_county_iso2code == 'FI' ) $cleanup_date = '29.05.2012';
    if ( $cleanup_date == '' ) $cleanup_date = '05.05.2012';
    return $cleanup_date;
}

// (MANUAL LABOR WTF)
function country_code_to_country($county_iso2code){
    $country = '';
    $county_iso2code = strtoupper($county_iso2code);
    if( $county_iso2code == 'AF' ) $country = 'Afghanistan';
    if( $county_iso2code == 'AX' ) $country = 'Aland Islands';
    if( $county_iso2code == 'AL' ) $country = 'Albania';
    if( $county_iso2code == 'DZ' ) $country = 'Algeria';
    if( $county_iso2code == 'AS' ) $country = 'American Samoa';
    if( $county_iso2code == 'AD' ) $country = 'Andorra';
    if( $county_iso2code == 'AO' ) $country = 'Angola';
    if( $county_iso2code == 'AI' ) $country = 'Anguilla';
    if( $county_iso2code == 'AQ' ) $country = 'Antarctica';
    if( $county_iso2code == 'AG' ) $country = 'Antigua and Barbuda';
    if( $county_iso2code == 'AR' ) $country = 'Argentina';
    if( $county_iso2code == 'AM' ) $country = 'Armenia';
    if( $county_iso2code == 'AW' ) $country = 'Aruba';
    if( $county_iso2code == 'AU' ) $country = 'Australia';
    if( $county_iso2code == 'AT' ) $country = 'Austria';
    if( $county_iso2code == 'AZ' ) $country = 'Azerbaijan';
    if( $county_iso2code == 'BS' ) $country = 'Bahamas';
    if( $county_iso2code == 'BH' ) $country = 'Bahrain';
    if( $county_iso2code == 'BD' ) $country = 'Bangladesh';
    if( $county_iso2code == 'BB' ) $country = 'Barbados';
    if( $county_iso2code == 'BY' ) $country = 'Belarus';
    if( $county_iso2code == 'BE' ) $country = 'Belgium';
    if( $county_iso2code == 'BZ' ) $country = 'Belize';
    if( $county_iso2code == 'BJ' ) $country = 'Benin';
    if( $county_iso2code == 'BM' ) $country = 'Bermuda';
    if( $county_iso2code == 'BT' ) $country = 'Bhutan';
    if( $county_iso2code == 'BO' ) $country = 'Bolivia';
    if( $county_iso2code == 'BA' ) $country = 'Bosnia and Herzegovina';
    if( $county_iso2code == 'BW' ) $country = 'Botswana';
    if( $county_iso2code == 'BV' ) $country = 'Bouvet Island';
    if( $county_iso2code == 'BR' ) $country = 'Brazil';
    if( $county_iso2code == 'IO' ) $country = 'British Indian Ocean Territory (Chagos Archipelago)';
    if( $county_iso2code == 'VG' ) $country = 'British Virgin Islands';
    if( $county_iso2code == 'BN' ) $country = 'Brunei Darussalam';
    if( $county_iso2code == 'BG' ) $country = 'Bulgaria';
    if( $county_iso2code == 'BF' ) $country = 'Burkina Faso';
    if( $county_iso2code == 'BI' ) $country = 'Burundi';
    if( $county_iso2code == 'KH' ) $country = 'Cambodia';
    if( $county_iso2code == 'CM' ) $country = 'Cameroon';
    if( $county_iso2code == 'CA' ) $country = 'Canada';
    if( $county_iso2code == 'CV' ) $country = 'Cape Verde';
    if( $county_iso2code == 'KY' ) $country = 'Cayman Islands';
    if( $county_iso2code == 'CF' ) $country = 'Central African Republic';
    if( $county_iso2code == 'TD' ) $country = 'Chad';
    if( $county_iso2code == 'CL' ) $country = 'Chile';
    if( $county_iso2code == 'CN' ) $country = 'China';
    if( $county_iso2code == 'CX' ) $country = 'Christmas Island';
    if( $county_iso2code == 'CC' ) $country = 'Cocos (Keeling) Islands';
    if( $county_iso2code == 'CO' ) $country = 'Colombia';
    if( $county_iso2code == 'KM' ) $country = 'Comoros';
    if( $county_iso2code == 'CD' ) $country = 'Congo';
    if( $county_iso2code == 'CG' ) $country = 'Congo';
    if( $county_iso2code == 'CK' ) $country = 'Cook Islands';
    if( $county_iso2code == 'CR' ) $country = 'Costa Rica';
    if( $county_iso2code == 'CI' ) $country = 'Cote d\'Ivoire';
    if( $county_iso2code == 'HR' ) $country = 'Croatia';
    if( $county_iso2code == 'CU' ) $country = 'Cuba';
    if( $county_iso2code == 'CY' ) $country = 'Cyprus';
    if( $county_iso2code == 'CZ' ) $country = 'Czech Republic';
    if( $county_iso2code == 'DK' ) $country = 'Denmark';
    if( $county_iso2code == 'DJ' ) $country = 'Djibouti';
    if( $county_iso2code == 'DM' ) $country = 'Dominica';
    if( $county_iso2code == 'DO' ) $country = 'Dominican Republic';
    if( $county_iso2code == 'EC' ) $country = 'Ecuador';
    if( $county_iso2code == 'EG' ) $country = 'Egypt';
    if( $county_iso2code == 'SV' ) $country = 'El Salvador';
    if( $county_iso2code == 'GQ' ) $country = 'Equatorial Guinea';
    if( $county_iso2code == 'ER' ) $country = 'Eritrea';
    if( $county_iso2code == 'EE' ) $country = 'Estonia';
    if( $county_iso2code == 'ET' ) $country = 'Ethiopia';
    if( $county_iso2code == 'FO' ) $country = 'Faroe Islands';
    if( $county_iso2code == 'FK' ) $country = 'Falkland Islands';
    if( $county_iso2code == 'FJ' ) $country = 'Fiji the Fiji Islands';
    if( $county_iso2code == 'FI' ) $country = 'Finland';
    if( $county_iso2code == 'FR' ) $country = 'France';
    if( $county_iso2code == 'GF' ) $country = 'French Guiana';
    if( $county_iso2code == 'PF' ) $country = 'French Polynesia';
    if( $county_iso2code == 'TF' ) $country = 'French Southern Territories';
    if( $county_iso2code == 'GA' ) $country = 'Gabon';
    if( $county_iso2code == 'GM' ) $country = 'Gambia';
    if( $county_iso2code == 'GE' ) $country = 'Georgia';
    if( $county_iso2code == 'DE' ) $country = 'Germany';
    if( $county_iso2code == 'GH' ) $country = 'Ghana';
    if( $county_iso2code == 'GI' ) $country = 'Gibraltar';
    if( $county_iso2code == 'GR' ) $country = 'Greece';
    if( $county_iso2code == 'GL' ) $country = 'Greenland';
    if( $county_iso2code == 'GD' ) $country = 'Grenada';
    if( $county_iso2code == 'GP' ) $country = 'Guadeloupe';
    if( $county_iso2code == 'GU' ) $country = 'Guam';
    if( $county_iso2code == 'GT' ) $country = 'Guatemala';
    if( $county_iso2code == 'GG' ) $country = 'Guernsey';
    if( $county_iso2code == 'GN' ) $country = 'Guinea';
    if( $county_iso2code == 'GW' ) $country = 'Guinea-Bissau';
    if( $county_iso2code == 'GY' ) $country = 'Guyana';
    if( $county_iso2code == 'HT' ) $country = 'Haiti';
    if( $county_iso2code == 'HM' ) $country = 'Heard Island and McDonald Islands';
    if( $county_iso2code == 'VA' ) $country = 'Holy See (Vatican City State)';
    if( $county_iso2code == 'HN' ) $country = 'Honduras';
    if( $county_iso2code == 'HK' ) $country = 'Hong Kong';
    if( $county_iso2code == 'HU' ) $country = 'Hungary';
    if( $county_iso2code == 'IS' ) $country = 'Iceland';
    if( $county_iso2code == 'IN' ) $country = 'India';
    if( $county_iso2code == 'ID' ) $country = 'Indonesia';
    if( $county_iso2code == 'IR' ) $country = 'Iran';
    if( $county_iso2code == 'IQ' ) $country = 'Iraq';
    if( $county_iso2code == 'IE' ) $country = 'Ireland';
    if( $county_iso2code == 'IM' ) $country = 'Isle of Man';
    if( $county_iso2code == 'IL' ) $country = 'Israel';
    if( $county_iso2code == 'IT' ) $country = 'Italy';
    if( $county_iso2code == 'JM' ) $country = 'Jamaica';
    if( $county_iso2code == 'JP' ) $country = 'Japan';
    if( $county_iso2code == 'JE' ) $country = 'Jersey';
    if( $county_iso2code == 'JO' ) $country = 'Jordan';
    if( $county_iso2code == 'KZ' ) $country = 'Kazakhstan';
    if( $county_iso2code == 'KE' ) $country = 'Kenya';
    if( $county_iso2code == 'KI' ) $country = 'Kiribati';
    if( $county_iso2code == 'KP' ) $country = 'Korea';
    if( $county_iso2code == 'KR' ) $country = 'Korea';
    if( $county_iso2code == 'XK' ) $country = 'Kosovo';
    if( $county_iso2code == 'KW' ) $country = 'Kuwait';
    if( $county_iso2code == 'KG' ) $country = 'Kyrgyz Republic';
    if( $county_iso2code == 'LA' ) $country = 'Lao';
    if( $county_iso2code == 'LV' ) $country = 'Latvia';
    if( $county_iso2code == 'LB' ) $country = 'Lebanon';
    if( $county_iso2code == 'LS' ) $country = 'Lesotho';
    if( $county_iso2code == 'LR' ) $country = 'Liberia';
    if( $county_iso2code == 'LY' ) $country = 'Libyan Arab Jamahiriya';
    if( $county_iso2code == 'LI' ) $country = 'Liechtenstein';
    if( $county_iso2code == 'LT' ) $country = 'Lithuania';
    if( $county_iso2code == 'LU' ) $country = 'Luxembourg';
    if( $county_iso2code == 'MO' ) $country = 'Macao';
    if( $county_iso2code == 'MK' ) $country = 'Macedonia';
    if( $county_iso2code == 'MG' ) $country = 'Madagascar';
    if( $county_iso2code == 'MW' ) $country = 'Malawi';
    if( $county_iso2code == 'MY' ) $country = 'Malaysia';
    if( $county_iso2code == 'MV' ) $country = 'Maldives';
    if( $county_iso2code == 'ML' ) $country = 'Mali';
    if( $county_iso2code == 'MT' ) $country = 'Malta';
    if( $county_iso2code == 'MH' ) $country = 'Marshall Islands';
    if( $county_iso2code == 'MQ' ) $country = 'Martinique';
    if( $county_iso2code == 'MR' ) $country = 'Mauritania';
    if( $county_iso2code == 'MU' ) $country = 'Mauritius';
    if( $county_iso2code == 'YT' ) $country = 'Mayotte';
    if( $county_iso2code == 'MX' ) $country = 'Mexico';
    if( $county_iso2code == 'FM' ) $country = 'Micronesia';
    if( $county_iso2code == 'MD' ) $country = 'Moldova';
    if( $county_iso2code == 'MC' ) $country = 'Monaco';
    if( $county_iso2code == 'MN' ) $country = 'Mongolia';
    if( $county_iso2code == 'ME' ) $country = 'Montenegro';
    if( $county_iso2code == 'MS' ) $country = 'Montserrat';
    if( $county_iso2code == 'MA' ) $country = 'Morocco';
    if( $county_iso2code == 'MZ' ) $country = 'Mozambique';
    if( $county_iso2code == 'MM' ) $country = 'Myanmar';
    if( $county_iso2code == 'NA' ) $country = 'Namibia';
    if( $county_iso2code == 'NR' ) $country = 'Nauru';
    if( $county_iso2code == 'NP' ) $country = 'Nepal';
    if( $county_iso2code == 'AN' ) $country = 'Netherlands Antilles';
    if( $county_iso2code == 'NL' ) $country = 'Netherlands';
    if( $county_iso2code == 'NC' ) $country = 'New Caledonia';
    if( $county_iso2code == 'NZ' ) $country = 'New Zealand';
    if( $county_iso2code == 'NI' ) $country = 'Nicaragua';
    if( $county_iso2code == 'NE' ) $country = 'Niger';
    if( $county_iso2code == 'NG' ) $country = 'Nigeria';
    if( $county_iso2code == 'NU' ) $country = 'Niue';
    if( $county_iso2code == 'NF' ) $country = 'Norfolk Island';
    if( $county_iso2code == 'MP' ) $country = 'Northern Mariana Islands';
    if( $county_iso2code == 'NO' ) $country = 'Norway';
    if( $county_iso2code == 'OM' ) $country = 'Oman';
    if( $county_iso2code == 'PK' ) $country = 'Pakistan';
    if( $county_iso2code == 'PW' ) $country = 'Palau';
    if( $county_iso2code == 'PS' ) $country = 'Palestinian Territory';
    if( $county_iso2code == 'PA' ) $country = 'Panama';
    if( $county_iso2code == 'PG' ) $country = 'Papua New Guinea';
    if( $county_iso2code == 'PY' ) $country = 'Paraguay';
    if( $county_iso2code == 'PE' ) $country = 'Peru';
    if( $county_iso2code == 'PH' ) $country = 'Philippines';
    if( $county_iso2code == 'PN' ) $country = 'Pitcairn Islands';
    if( $county_iso2code == 'PL' ) $country = 'Poland';
    if( $county_iso2code == 'PT' ) $country = 'Portugal';
    if( $county_iso2code == 'PR' ) $country = 'Puerto Rico';
    if( $county_iso2code == 'QA' ) $country = 'Qatar';
    if( $county_iso2code == 'RE' ) $country = 'Reunion';
    if( $county_iso2code == 'RO' ) $country = 'Romania';
    if( $county_iso2code == 'RU' ) $country = 'Russia';
    if( $county_iso2code == 'RW' ) $country = 'Rwanda';
    if( $county_iso2code == 'BL' ) $country = 'Saint Barthelemy';
    if( $county_iso2code == 'SH' ) $country = 'Saint Helena';
    if( $county_iso2code == 'KN' ) $country = 'Saint Kitts and Nevis';
    if( $county_iso2code == 'LC' ) $country = 'Saint Lucia';
    if( $county_iso2code == 'MF' ) $country = 'Saint Martin';
    if( $county_iso2code == 'PM' ) $country = 'Saint Pierre and Miquelon';
    if( $county_iso2code == 'VC' ) $country = 'Saint Vincent and the Grenadines';
    if( $county_iso2code == 'WS' ) $country = 'Samoa';
    if( $county_iso2code == 'SM' ) $country = 'San Marino';
    if( $county_iso2code == 'ST' ) $country = 'Sao Tome and Principe';
    if( $county_iso2code == 'SA' ) $country = 'Saudi Arabia';
    if( $county_iso2code == 'SN' ) $country = 'Senegal';
    if( $county_iso2code == 'RS' ) $country = 'Serbia';
    if( $county_iso2code == 'SC' ) $country = 'Seychelles';
    if( $county_iso2code == 'SL' ) $country = 'Sierra Leone';
    if( $county_iso2code == 'SG' ) $country = 'Singapore';
    if( $county_iso2code == 'SK' ) $country = 'Slovakia';
    if( $county_iso2code == 'SI' ) $country = 'Slovenia';
    if( $county_iso2code == 'SB' ) $country = 'Solomon Islands';
    if( $county_iso2code == 'SO' ) $country = 'Somalia';
    if( $county_iso2code == 'ZA' ) $country = 'South Africa';
    if( $county_iso2code == 'GS' ) $country = 'South Georgia and the South Sandwich Islands';
    if( $county_iso2code == 'ES' ) $country = 'Spain';
    if( $county_iso2code == 'LK' ) $country = 'Sri Lanka';
    if( $county_iso2code == 'SD' ) $country = 'Sudan';
    if( $county_iso2code == 'SR' ) $country = 'Suriname';
    if( $county_iso2code == 'SJ' ) $country = 'Svalbard & Jan Mayen Islands';
    if( $county_iso2code == 'SZ' ) $country = 'Swaziland';
    if( $county_iso2code == 'SE' ) $country = 'Sweden';
    if( $county_iso2code == 'CH' ) $country = 'Switzerland';
    if( $county_iso2code == 'SY' ) $country = 'Syrian Arab Republic';
    if( $county_iso2code == 'TW' ) $country = 'Taiwan';
    if( $county_iso2code == 'TJ' ) $country = 'Tajikistan';
    if( $county_iso2code == 'TZ' ) $country = 'Tanzania';
    if( $county_iso2code == 'TH' ) $country = 'Thailand';
    if( $county_iso2code == 'TL' ) $country = 'Timor-Leste';
    if( $county_iso2code == 'TG' ) $country = 'Togo';
    if( $county_iso2code == 'TK' ) $country = 'Tokelau';
    if( $county_iso2code == 'TO' ) $country = 'Tonga';
    if( $county_iso2code == 'TT' ) $country = 'Trinidad and Tobago';
    if( $county_iso2code == 'TN' ) $country = 'Tunisia';
    if( $county_iso2code == 'TR' ) $country = 'Turkey';
    if( $county_iso2code == 'TM' ) $country = 'Turkmenistan';
    if( $county_iso2code == 'TC' ) $country = 'Turks and Caicos Islands';
    if( $county_iso2code == 'TV' ) $country = 'Tuvalu';
    if( $county_iso2code == 'UG' ) $country = 'Uganda';
    if( $county_iso2code == 'UA' ) $country = 'Ukraine';
    if( $county_iso2code == 'AE' ) $country = 'United Arab Emirates';
    if( $county_iso2code == 'GB' ) $country = 'United Kingdom';
    if( $county_iso2code == 'US' ) $country = 'United States of America';
    if( $county_iso2code == 'UM' ) $country = 'United States Minor Outlying Islands';
    if( $county_iso2code == 'VI' ) $country = 'United States Virgin Islands';
    if( $county_iso2code == 'UY' ) $country = 'Uruguay';
    if( $county_iso2code == 'UZ' ) $country = 'Uzbekistan';
    if( $county_iso2code == 'VU' ) $country = 'Vanuatu';
    if( $county_iso2code == 'VE' ) $country = 'Venezuela';
    if( $county_iso2code == 'VN' ) $country = 'Vietnam';
    if( $county_iso2code == 'WF' ) $country = 'Wallis and Futuna';
    if( $county_iso2code == 'EH' ) $country = 'Western Sahara';
    if( $county_iso2code == 'YE' ) $country = 'Yemen';
    if( $county_iso2code == 'ZM' ) $country = 'Zambia';
    if( $county_iso2code == 'ZW' ) $country = 'Zimbabwe';
    if( $country == '') $country = $county_iso2code;
    return $country;
}

// wastemap counter
function letsdoitworld_waistpoint_counter($country_iso) {
	if($country_iso){
		$result = db_fetch_array(db_query("SELECT count(DISTINCT nid) count FROM ho4p_content_type_waste_point WHERE field_geo_areas_json_value = '%s'","{\"Country\":\"".country_code_to_country($country_iso)."\"}"));
	}else{
		$result = db_fetch_array(db_query("SELECT count(DISTINCT nid) count FROM ho4p_content_type_waste_point"));
	}
  echo $result['count'];
}

// country counter
function letsdoitworld_country_counter() {
  $result = db_fetch_array(db_query("SELECT count(nid) count FROM ho4p_content_type_country"));
  echo $result['count'];
}

function letsoitworld_facebook_count($username) {
  $url = "https://graph.facebook.com/" . $username;
  $fbData = json_decode(file_get_contents($url, 0, null, null), true);
  return intval($fbData['likes']);
}

function letsoitworld_countdown($month, $day, $year) {
  // subtract desired date from current date and give an answer in terms of days
  $remain = ceil((mktime(0, 0, 0, $month, $day, $year) - time()) / 86400);
  // show the number of days left
  if ($remain > 0) {
    return $remain;
  } else {
    return 0;
  }
}
