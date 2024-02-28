<?php

namespace App\Http\Controllers;

use App\Helper\GlobalHelper;
use App\Models\Contact;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class WebController extends Controller
{

    public function index()
    {
        $packages = Package::where('active', 1)->get();
        $dialCodes = [
            'Afghanistan' => ['code' => '93', 'iso' => 'AF'],
            'Albania' => ['code' => '355', 'iso' => 'AL'],
            'Algeria' => ['code' => '213', 'iso' => 'DZ'],
            'American Samoa' => ['code' => '1-684', 'iso' => 'AS'],
            'Andorra' => ['code' => '376', 'iso' => 'AD'],
            'Angola' => ['code' => '244', 'iso' => 'AO'],
            'Anguilla' => ['code' => '1-264', 'iso' => 'AI'],
            'Antarctica' => ['code' => '672', 'iso' => 'AQ'],
            'Antigua and Barbuda' => ['code' => '1-268', 'iso' => 'AG'],
            'Argentina' => ['code' => '54', 'iso' => 'AR'],
            'Armenia' => ['code' => '374', 'iso' => 'AM'],
            'Aruba' => ['code' => '297', 'iso' => 'AW'],
            'Australia' => ['code' => '61', 'iso' => 'AU'],
            'Austria' => ['code' => '43', 'iso' => 'AT'],
            'Azerbaijan' => ['code' => '994', 'iso' => 'AZ'],
            'Bahamas' => ['code' => '1-242', 'iso' => 'BS'],
            'Bahrain' => ['code' => '973', 'iso' => 'BH'],
            'Bangladesh' => ['code' => '880', 'iso' => 'BD'],
            'Barbados' => ['code' => '1-246', 'iso' => 'BB'],
            'Belarus' => ['code' => '375', 'iso' => 'BY'],
            'Belgium' => ['code' => '32', 'iso' => 'BE'],
            'Belize' => ['code' => '501', 'iso' => 'BZ'],
            'Benin' => ['code' => '229', 'iso' => 'BJ'],
            'Bermuda' => ['code' => '1-441', 'iso' => 'BM'],
            'Bhutan' => ['code' => '975', 'iso' => 'BT'],
            'Bolivia' => ['code' => '591', 'iso' => 'BO'],
            'Bosnia and Herzegovina' => ['code' => '387', 'iso' => 'BA'],
            'Botswana' => ['code' => '267', 'iso' => 'BW'],
            'Brazil' => ['code' => '55', 'iso' => 'BR'],
            'British Indian Ocean Territory' => ['code' => '246', 'iso' => 'IO'],
            'British Virgin Islands' => ['code' => '1-284', 'iso' => 'VG'],
            'Brunei' => ['code' => '673', 'iso' => 'BN'],
            'Bulgaria' => ['code' => '359', 'iso' => 'BG'],
            'Burkina Faso' => ['code' => '226', 'iso' => 'BF'],
            'Burundi' => ['code' => '257', 'iso' => 'BI'],
            'Cambodia' => ['code' => '855', 'iso' => 'KH'],
            'Cameroon' => ['code' => '237', 'iso' => 'CM'],
            'Canada' => ['code' => '1', 'iso' => 'CA'],
            'Cape Verde' => ['code' => '238', 'iso' => 'CV'],
            'Cayman Islands' => ['code' => '1-345', 'iso' => 'KY'],
            'Central African Republic' => ['code' => '236', 'iso' => 'CF'],
            'Chad' => ['code' => '235', 'iso' => 'TD'],
            'Chile' => ['code' => '56', 'iso' => 'CL'],
            'China' => ['code' => '86', 'iso' => 'CN'],
            'Christmas Island' => ['code' => '61', 'iso' => 'CX'],
            'Cocos Islands' => ['code' => '61', 'iso' => 'CC'],
            'Colombia' => ['code' => '57', 'iso' => 'CO'],
            'Comoros' => ['code' => '269', 'iso' => 'KM'],
            'Cook Islands' => ['code' => '682', 'iso' => 'CK'],
            'Costa Rica' => ['code' => '506', 'iso' => 'CR'],
            'Croatia' => ['code' => '385', 'iso' => 'HR'],
            'Cuba' => ['code' => '53', 'iso' => 'CU'],
            'Curacao' => ['code' => '599', 'iso' => 'CW'],
            'Cyprus' => ['code' => '357', 'iso' => 'CY'],
            'Czech Republic' => ['code' => '420', 'iso' => 'CZ'],
            'Democratic Republic of the Congo' => ['code' => '243', 'iso' => 'CD'],
            'Denmark' => ['code' => '45', 'iso' => 'DK'],
            'Djibouti' => ['code' => '253', 'iso' => 'DJ'],
            'Dominica' => ['code' => '1-767', 'iso' => 'DM'],
            'Dominican Republic' => ['code' => '1-809, 1-829, 1-849', 'iso' => 'DO'],
            'East Timor' => ['code' => '670', 'iso' => 'TL'],
            'Ecuador' => ['code' => '593', 'iso' => 'EC'],
            'Egypt' => ['code' => '20', 'iso' => 'EG'],
            'El Salvador' => ['code' => '503', 'iso' => 'SV'],
            'Equatorial Guinea' => ['code' => '240', 'iso' => 'GQ'],
            'Eritrea' => ['code' => '291', 'iso' => 'ER'],
            'Estonia' => ['code' => '372', 'iso' => 'EE'],
            'Ethiopia' => ['code' => '251', 'iso' => 'ET'],
            'Falkland Islands' => ['code' => '500', 'iso' => 'FK'],
            'Faroe Islands' => ['code' => '298', 'iso' => 'FO'],
            'Fiji' => ['code' => '679', 'iso' => 'FJ'],
            'Finland' => ['code' => '358', 'iso' => 'FI'],
            'France' => ['code' => '33', 'iso' => 'FR'],
            'French Polynesia' => ['code' => '689', 'iso' => 'PF'],
            'Gabon' => ['code' => '241', 'iso' => 'GA'],
            'Gambia' => ['code' => '220', 'iso' => 'GM'],
            'Georgia' => ['code' => '995', 'iso' => 'GE'],
            'Germany' => ['code' => '49', 'iso' => 'DE'],
            'Ghana' => ['code' => '233', 'iso' => 'GH'],
            'Gibraltar' => ['code' => '350', 'iso' => 'GI'],
            'Greece' => ['code' => '30', 'iso' => 'GR'],
            'Greenland' => ['code' => '299', 'iso' => 'GL'],
            'Grenada' => ['code' => '1-473', 'iso' => 'GD'],
            'Guam' => ['code' => '1-671', 'iso' => 'GU'],
            'Guatemala' => ['code' => '502', 'iso' => 'GT'],
            'Guernsey' => ['code' => '44-1481', 'iso' => 'GG'],
            'Guinea' => ['code' => '224', 'iso' => 'GN'],
            'Guinea-Bissau' => ['code' => '245', 'iso' => 'GW'],
            'Guyana' => ['code' => '592', 'iso' => 'GY'],
            'Haiti' => ['code' => '509', 'iso' => 'HT'],
            'Honduras' => ['code' => '504', 'iso' => 'HN'],
            'Hong Kong' => ['code' => '852', 'iso' => 'HK'],
            'Hungary' => ['code' => '36', 'iso' => 'HU'],
            'Iceland' => ['code' => '354', 'iso' => 'IS'],
            'India' => ['code' => '91', 'iso' => 'IN'],
            'Indonesia' => ['code' => '62', 'iso' => 'ID'],
            'Iran' => ['code' => '98', 'iso' => 'IR'],
            'Iraq' => ['code' => '964', 'iso' => 'IQ'],
            'Ireland' => ['code' => '353', 'iso' => 'IE'],
            'Isle of Man' => ['code' => '44-1624', 'iso' => 'IM'],
            'Israel' => ['code' => '972', 'iso' => 'IL'],
            'Italy' => ['code' => '39', 'iso' => 'IT'],
            'Ivory Coast' => ['code' => '225', 'iso' => 'CI'],
            'Jamaica' => ['code' => '1-876', 'iso' => 'JM'],
            'Japan' => ['code' => '81', 'iso' => 'JP'],
            'Jersey' => ['code' => '44-1534', 'iso' => 'JE'],
            'Jordan' => ['code' => '962', 'iso' => 'JO'],
            'Kazakhstan' => ['code' => '7', 'iso' => 'KZ'],
            'Kenya' => ['code' => '254', 'iso' => 'KE'],
            'Kiribati' => ['code' => '686', 'iso' => 'KI'],
            'Kosovo' => ['code' => '383', 'iso' => 'XK'],
            'Kuwait' => ['code' => '965', 'iso' => 'KW'],
            'Kyrgyzstan' => ['code' => '996', 'iso' => 'KG'],
            'Laos' => ['code' => '856', 'iso' => 'LA'],
            'Latvia' => ['code' => '371', 'iso' => 'LV'],
            'Lebanon' => ['code' => '961', 'iso' => 'LB'],
            'Lesotho' => ['code' => '266', 'iso' => 'LS'],
            'Liberia' => ['code' => '231', 'iso' => 'LR'],
            'Libya' => ['code' => '218', 'iso' => 'LY'],
            'Liechtenstein' => ['code' => '423', 'iso' => 'LI'],
            'Lithuania' => ['code' => '370', 'iso' => 'LT'],
            'Luxembourg' => ['code' => '352', 'iso' => 'LU'],
            'Macao' => ['code' => '853', 'iso' => 'MO'],
            'Macedonia' => ['code' => '389', 'iso' => 'MK'],
            'Madagascar' => ['code' => '261', 'iso' => 'MG'],
            'Malawi' => ['code' => '265', 'iso' => 'MW'],
            'Malaysia' => ['code' => '60', 'iso' => 'MY'],
            'Maldives' => ['code' => '960', 'iso' => 'MV'],
            'Mali' => ['code' => '223', 'iso' => 'ML'],
            'Malta' => ['code' => '356', 'iso' => 'MT'],
            'Marshall Islands' => ['code' => '692', 'iso' => 'MH'],
            'Mauritania' => ['code' => '222', 'iso' => 'MR'],
            'Mauritius' => ['code' => '230', 'iso' => 'MU'],
            'Mayotte' => ['code' => '262', 'iso' => 'YT'],
            'Mexico' => ['code' => '52', 'iso' => 'MX'],
            'Micronesia' => ['code' => '691', 'iso' => 'FM'],
            'Moldova' => ['code' => '373', 'iso' => 'MD'],
            'Monaco' => ['code' => '377', 'iso' => 'MC'],
            'Mongolia' => ['code' => '976', 'iso' => 'MN'],
            'Montenegro' => ['code' => '382', 'iso' => 'ME'],
            'Montserrat' => ['code' => '1-664', 'iso' => 'MS'],
            'Morocco' => ['code' => '212', 'iso' => 'MA'],
            'Mozambique' => ['code' => '258', 'iso' => 'MZ'],
            'Myanmar' => ['code' => '95', 'iso' => 'MM'],
            'Namibia' => ['code' => '264', 'iso' => 'NA'],
            'Nauru' => ['code' => '674', 'iso' => 'NR'],
            'Nepal' => ['code' => '977', 'iso' => 'NP'],
            'Netherlands' => ['code' => '31', 'iso' => 'NL'],
            'Netherlands Antilles' => ['code' => '599', 'iso' => 'AN'],
            'New Caledonia' => ['code' => '687', 'iso' => 'NC'],
            'New Zealand' => ['code' => '64', 'iso' => 'NZ'],
            'Nicaragua' => ['code' => '505', 'iso' => 'NI'],
            'Niger' => ['code' => '227', 'iso' => 'NE'],
            'Nigeria' => ['code' => '234', 'iso' => 'NG'],
            'Niue' => ['code' => '683', 'iso' => 'NU'],
            'North Korea' => ['code' => '850', 'iso' => 'KP'],
            'Northern Mariana Islands' => ['code' => '1-670', 'iso' => 'MP'],
            'Norway' => ['code' => '47', 'iso' => 'NO'],
            'Oman' => ['code' => '968', 'iso' => 'OM'],
            'Pakistan' => ['code' => '92', 'iso' => 'PK'],
            'Palau' => ['code' => '680', 'iso' => 'PW'],
            'Palestine' => ['code' => '970', 'iso' => 'PS'],
            'Panama' => ['code' => '507', 'iso' => 'PA'],
            'Papua New Guinea' => ['code' => '675', 'iso' => 'PG'],
            'Paraguay' => ['code' => '595', 'iso' => 'PY'],
            'Peru' => ['code' => '51', 'iso' => 'PE'],
            'Philippines' => ['code' => '63', 'iso' => 'PH'],
            'Pitcairn' => ['code' => '64', 'iso' => 'PN'],
            'Poland' => ['code' => '48', 'iso' => 'PL'],
            'Portugal' => ['code' => '351', 'iso' => 'PT'],
            'Puerto Rico' => ['code' => '1-787, 1-939', 'iso' => 'PR'],
            'Qatar' => ['code' => '974', 'iso' => 'QA'],
            'Republic of the Congo' => ['code' => '242', 'iso' => 'CG'],
            'Reunion' => ['code' => '262', 'iso' => 'RE'],
            'Romania' => ['code' => '40', 'iso' => 'RO'],
            'Russia' => ['code' => '7', 'iso' => 'RU'],
            'Rwanda' => ['code' => '250', 'iso' => 'RW'],
            'Saint Barthelemy' => ['code' => '590', 'iso' => 'BL'],
            'Saint Helena' => ['code' => '290', 'iso' => 'SH'],
            'Saint Kitts and Nevis' => ['code' => '1-869', 'iso' => 'KN'],
            'Saint Lucia' => ['code' => '1-758', 'iso' => 'LC'],
            'Saint Martin' => ['code' => '590', 'iso' => 'MF'],
            'Saint Pierre and Miquelon' => ['code' => '508', 'iso' => 'PM'],
            'Saint Vincent and the Grenadines' => ['code' => '1-784', 'iso' => 'VC'],
            'Samoa' => ['code' => '685', 'iso' => 'WS'],
            'San Marino' => ['code' => '378', 'iso' => 'SM'],
            'Sao Tome and Principe' => ['code' => '239', 'iso' => 'ST'],
            'Saudi Arabia' => ['code' => '966', 'iso' => 'SA'],
            'Senegal' => ['code' => '221', 'iso' => 'SN'],
            'Serbia' => ['code' => '381', 'iso' => 'RS'],
            'Seychelles' => ['code' => '248', 'iso' => 'SC'],
            'Sierra Leone' => ['code' => '232', 'iso' => 'SL'],
            'Singapore' => ['code' => '65', 'iso' => 'SG'],
            'Sint Maarten' => ['code' => '1-721', 'iso' => 'SX'],
            'Slovakia' => ['code' => '421', 'iso' => 'SK'],
            'Slovenia' => ['code' => '386', 'iso' => 'SI'],
            'Solomon Islands' => ['code' => '677', 'iso' => 'SB'],
            'Somalia' => ['code' => '252', 'iso' => 'SO'],
            'South Africa' => ['code' => '27', 'iso' => 'ZA'],
            'South Korea' => ['code' => '82', 'iso' => 'KR'],
            'South Sudan' => ['code' => '211', 'iso' => 'SS'],
            'Spain' => ['code' => '34', 'iso' => 'ES'],
            'Sri Lanka' => ['code' => '94', 'iso' => 'LK'],
            'Sudan' => ['code' => '249', 'iso' => 'SD'],
            'Suriname' => ['code' => '597', 'iso' => 'SR'],
            'Svalbard and Jan Mayen' => ['code' => '47', 'iso' => 'SJ'],
            'Swaziland' => ['code' => '268', 'iso' => 'SZ'],
            'Sweden' => ['code' => '46', 'iso' => 'SE'],
            'Switzerland' => ['code' => '41', 'iso' => 'CH'],
            'Syria' => ['code' => '963', 'iso' => 'SY'],
            'Taiwan' => ['code' => '886', 'iso' => 'TW'],
            'Tajikistan' => ['code' => '992', 'iso' => 'TJ'],
            'Tanzania' => ['code' => '255', 'iso' => 'TZ'],
            'Thailand' => ['code' => '66', 'iso' => 'TH'],
            'Togo' => ['code' => '228', 'iso' => 'TG'],
            'Tokelau' => ['code' => '690', 'iso' => 'TK'],
            'Tonga' => ['code' => '676', 'iso' => 'TO'],
            'Trinidad and Tobago' => ['code' => '1-868', 'iso' => 'TT'],
            'Tunisia' => ['code' => '216', 'iso' => 'TN'],
            'Turkey' => ['code' => '90', 'iso' => 'TR'],
            'Turkmenistan' => ['code' => '993', 'iso' => 'TM'],
            'Turks and Caicos Islands' => ['code' => '1-649', 'iso' => 'TC'],
            'Tuvalu' => ['code' => '688', 'iso' => 'TV'],
            'U.S. Virgin Islands' => ['code' => '1-340', 'iso' => 'VI'],
            'Uganda' => ['code' => '256', 'iso' => 'UG'],
            'Ukraine' => ['code' => '380', 'iso' => 'UA'],
            'United Arab Emirates' => ['code' => '971', 'iso' => 'AE'],
            'United Kingdom' => ['code' => '44', 'iso' => 'GB'],
            'United States' => ['code' => '1', 'iso' => 'US'],
            'Uruguay' => ['code' => '598', 'iso' => 'UY'],
            'Uzbekistan' => ['code' => '998', 'iso' => 'UZ'],
            'Vanuatu' => ['code' => '678', 'iso' => 'VU'],
            'Vatican' => ['code' => '379', 'iso' => 'VA'],
            'Venezuela' => ['code' => '58', 'iso' => 'VE'],
            'Vietnam' => ['code' => '84', 'iso' => 'VN'],
            'Wallis and Futuna' => ['code' => '681', 'iso' => 'WF'],
            'Western Sahara' => ['code' => '212', 'iso' => 'EH'],
            'Yemen' => ['code' => '967', 'iso' => 'YE'],
            'Zambia' => ['code' => '260', 'iso' => 'ZM'],
            'Zimbabwe' => ['code' => '263', 'iso' => 'ZW'],
        ];
        return view('index', compact('packages','dialCodes'));
    }

    public function packageDetails($id)
    {
        $package = Package::findOrFail($id);
        $packages = Package::where('active', 1)->get();
        $dialCodes = [
            'Afghanistan' => ['code' => '93', 'iso' => 'AF'],
            'Albania' => ['code' => '355', 'iso' => 'AL'],
            'Algeria' => ['code' => '213', 'iso' => 'DZ'],
            'American Samoa' => ['code' => '1-684', 'iso' => 'AS'],
            'Andorra' => ['code' => '376', 'iso' => 'AD'],
            'Angola' => ['code' => '244', 'iso' => 'AO'],
            'Anguilla' => ['code' => '1-264', 'iso' => 'AI'],
            'Antarctica' => ['code' => '672', 'iso' => 'AQ'],
            'Antigua and Barbuda' => ['code' => '1-268', 'iso' => 'AG'],
            'Argentina' => ['code' => '54', 'iso' => 'AR'],
            'Armenia' => ['code' => '374', 'iso' => 'AM'],
            'Aruba' => ['code' => '297', 'iso' => 'AW'],
            'Australia' => ['code' => '61', 'iso' => 'AU'],
            'Austria' => ['code' => '43', 'iso' => 'AT'],
            'Azerbaijan' => ['code' => '994', 'iso' => 'AZ'],
            'Bahamas' => ['code' => '1-242', 'iso' => 'BS'],
            'Bahrain' => ['code' => '973', 'iso' => 'BH'],
            'Bangladesh' => ['code' => '880', 'iso' => 'BD'],
            'Barbados' => ['code' => '1-246', 'iso' => 'BB'],
            'Belarus' => ['code' => '375', 'iso' => 'BY'],
            'Belgium' => ['code' => '32', 'iso' => 'BE'],
            'Belize' => ['code' => '501', 'iso' => 'BZ'],
            'Benin' => ['code' => '229', 'iso' => 'BJ'],
            'Bermuda' => ['code' => '1-441', 'iso' => 'BM'],
            'Bhutan' => ['code' => '975', 'iso' => 'BT'],
            'Bolivia' => ['code' => '591', 'iso' => 'BO'],
            'Bosnia and Herzegovina' => ['code' => '387', 'iso' => 'BA'],
            'Botswana' => ['code' => '267', 'iso' => 'BW'],
            'Brazil' => ['code' => '55', 'iso' => 'BR'],
            'British Indian Ocean Territory' => ['code' => '246', 'iso' => 'IO'],
            'British Virgin Islands' => ['code' => '1-284', 'iso' => 'VG'],
            'Brunei' => ['code' => '673', 'iso' => 'BN'],
            'Bulgaria' => ['code' => '359', 'iso' => 'BG'],
            'Burkina Faso' => ['code' => '226', 'iso' => 'BF'],
            'Burundi' => ['code' => '257', 'iso' => 'BI'],
            'Cambodia' => ['code' => '855', 'iso' => 'KH'],
            'Cameroon' => ['code' => '237', 'iso' => 'CM'],
            'Canada' => ['code' => '1', 'iso' => 'CA'],
            'Cape Verde' => ['code' => '238', 'iso' => 'CV'],
            'Cayman Islands' => ['code' => '1-345', 'iso' => 'KY'],
            'Central African Republic' => ['code' => '236', 'iso' => 'CF'],
            'Chad' => ['code' => '235', 'iso' => 'TD'],
            'Chile' => ['code' => '56', 'iso' => 'CL'],
            'China' => ['code' => '86', 'iso' => 'CN'],
            'Christmas Island' => ['code' => '61', 'iso' => 'CX'],
            'Cocos Islands' => ['code' => '61', 'iso' => 'CC'],
            'Colombia' => ['code' => '57', 'iso' => 'CO'],
            'Comoros' => ['code' => '269', 'iso' => 'KM'],
            'Cook Islands' => ['code' => '682', 'iso' => 'CK'],
            'Costa Rica' => ['code' => '506', 'iso' => 'CR'],
            'Croatia' => ['code' => '385', 'iso' => 'HR'],
            'Cuba' => ['code' => '53', 'iso' => 'CU'],
            'Curacao' => ['code' => '599', 'iso' => 'CW'],
            'Cyprus' => ['code' => '357', 'iso' => 'CY'],
            'Czech Republic' => ['code' => '420', 'iso' => 'CZ'],
            'Democratic Republic of the Congo' => ['code' => '243', 'iso' => 'CD'],
            'Denmark' => ['code' => '45', 'iso' => 'DK'],
            'Djibouti' => ['code' => '253', 'iso' => 'DJ'],
            'Dominica' => ['code' => '1-767', 'iso' => 'DM'],
            'Dominican Republic' => ['code' => '1-809, 1-829, 1-849', 'iso' => 'DO'],
            'East Timor' => ['code' => '670', 'iso' => 'TL'],
            'Ecuador' => ['code' => '593', 'iso' => 'EC'],
            'Egypt' => ['code' => '20', 'iso' => 'EG'],
            'El Salvador' => ['code' => '503', 'iso' => 'SV'],
            'Equatorial Guinea' => ['code' => '240', 'iso' => 'GQ'],
            'Eritrea' => ['code' => '291', 'iso' => 'ER'],
            'Estonia' => ['code' => '372', 'iso' => 'EE'],
            'Ethiopia' => ['code' => '251', 'iso' => 'ET'],
            'Falkland Islands' => ['code' => '500', 'iso' => 'FK'],
            'Faroe Islands' => ['code' => '298', 'iso' => 'FO'],
            'Fiji' => ['code' => '679', 'iso' => 'FJ'],
            'Finland' => ['code' => '358', 'iso' => 'FI'],
            'France' => ['code' => '33', 'iso' => 'FR'],
            'French Polynesia' => ['code' => '689', 'iso' => 'PF'],
            'Gabon' => ['code' => '241', 'iso' => 'GA'],
            'Gambia' => ['code' => '220', 'iso' => 'GM'],
            'Georgia' => ['code' => '995', 'iso' => 'GE'],
            'Germany' => ['code' => '49', 'iso' => 'DE'],
            'Ghana' => ['code' => '233', 'iso' => 'GH'],
            'Gibraltar' => ['code' => '350', 'iso' => 'GI'],
            'Greece' => ['code' => '30', 'iso' => 'GR'],
            'Greenland' => ['code' => '299', 'iso' => 'GL'],
            'Grenada' => ['code' => '1-473', 'iso' => 'GD'],
            'Guam' => ['code' => '1-671', 'iso' => 'GU'],
            'Guatemala' => ['code' => '502', 'iso' => 'GT'],
            'Guernsey' => ['code' => '44-1481', 'iso' => 'GG'],
            'Guinea' => ['code' => '224', 'iso' => 'GN'],
            'Guinea-Bissau' => ['code' => '245', 'iso' => 'GW'],
            'Guyana' => ['code' => '592', 'iso' => 'GY'],
            'Haiti' => ['code' => '509', 'iso' => 'HT'],
            'Honduras' => ['code' => '504', 'iso' => 'HN'],
            'Hong Kong' => ['code' => '852', 'iso' => 'HK'],
            'Hungary' => ['code' => '36', 'iso' => 'HU'],
            'Iceland' => ['code' => '354', 'iso' => 'IS'],
            'India' => ['code' => '91', 'iso' => 'IN'],
            'Indonesia' => ['code' => '62', 'iso' => 'ID'],
            'Iran' => ['code' => '98', 'iso' => 'IR'],
            'Iraq' => ['code' => '964', 'iso' => 'IQ'],
            'Ireland' => ['code' => '353', 'iso' => 'IE'],
            'Isle of Man' => ['code' => '44-1624', 'iso' => 'IM'],
            'Israel' => ['code' => '972', 'iso' => 'IL'],
            'Italy' => ['code' => '39', 'iso' => 'IT'],
            'Ivory Coast' => ['code' => '225', 'iso' => 'CI'],
            'Jamaica' => ['code' => '1-876', 'iso' => 'JM'],
            'Japan' => ['code' => '81', 'iso' => 'JP'],
            'Jersey' => ['code' => '44-1534', 'iso' => 'JE'],
            'Jordan' => ['code' => '962', 'iso' => 'JO'],
            'Kazakhstan' => ['code' => '7', 'iso' => 'KZ'],
            'Kenya' => ['code' => '254', 'iso' => 'KE'],
            'Kiribati' => ['code' => '686', 'iso' => 'KI'],
            'Kosovo' => ['code' => '383', 'iso' => 'XK'],
            'Kuwait' => ['code' => '965', 'iso' => 'KW'],
            'Kyrgyzstan' => ['code' => '996', 'iso' => 'KG'],
            'Laos' => ['code' => '856', 'iso' => 'LA'],
            'Latvia' => ['code' => '371', 'iso' => 'LV'],
            'Lebanon' => ['code' => '961', 'iso' => 'LB'],
            'Lesotho' => ['code' => '266', 'iso' => 'LS'],
            'Liberia' => ['code' => '231', 'iso' => 'LR'],
            'Libya' => ['code' => '218', 'iso' => 'LY'],
            'Liechtenstein' => ['code' => '423', 'iso' => 'LI'],
            'Lithuania' => ['code' => '370', 'iso' => 'LT'],
            'Luxembourg' => ['code' => '352', 'iso' => 'LU'],
            'Macao' => ['code' => '853', 'iso' => 'MO'],
            'Macedonia' => ['code' => '389', 'iso' => 'MK'],
            'Madagascar' => ['code' => '261', 'iso' => 'MG'],
            'Malawi' => ['code' => '265', 'iso' => 'MW'],
            'Malaysia' => ['code' => '60', 'iso' => 'MY'],
            'Maldives' => ['code' => '960', 'iso' => 'MV'],
            'Mali' => ['code' => '223', 'iso' => 'ML'],
            'Malta' => ['code' => '356', 'iso' => 'MT'],
            'Marshall Islands' => ['code' => '692', 'iso' => 'MH'],
            'Mauritania' => ['code' => '222', 'iso' => 'MR'],
            'Mauritius' => ['code' => '230', 'iso' => 'MU'],
            'Mayotte' => ['code' => '262', 'iso' => 'YT'],
            'Mexico' => ['code' => '52', 'iso' => 'MX'],
            'Micronesia' => ['code' => '691', 'iso' => 'FM'],
            'Moldova' => ['code' => '373', 'iso' => 'MD'],
            'Monaco' => ['code' => '377', 'iso' => 'MC'],
            'Mongolia' => ['code' => '976', 'iso' => 'MN'],
            'Montenegro' => ['code' => '382', 'iso' => 'ME'],
            'Montserrat' => ['code' => '1-664', 'iso' => 'MS'],
            'Morocco' => ['code' => '212', 'iso' => 'MA'],
            'Mozambique' => ['code' => '258', 'iso' => 'MZ'],
            'Myanmar' => ['code' => '95', 'iso' => 'MM'],
            'Namibia' => ['code' => '264', 'iso' => 'NA'],
            'Nauru' => ['code' => '674', 'iso' => 'NR'],
            'Nepal' => ['code' => '977', 'iso' => 'NP'],
            'Netherlands' => ['code' => '31', 'iso' => 'NL'],
            'Netherlands Antilles' => ['code' => '599', 'iso' => 'AN'],
            'New Caledonia' => ['code' => '687', 'iso' => 'NC'],
            'New Zealand' => ['code' => '64', 'iso' => 'NZ'],
            'Nicaragua' => ['code' => '505', 'iso' => 'NI'],
            'Niger' => ['code' => '227', 'iso' => 'NE'],
            'Nigeria' => ['code' => '234', 'iso' => 'NG'],
            'Niue' => ['code' => '683', 'iso' => 'NU'],
            'North Korea' => ['code' => '850', 'iso' => 'KP'],
            'Northern Mariana Islands' => ['code' => '1-670', 'iso' => 'MP'],
            'Norway' => ['code' => '47', 'iso' => 'NO'],
            'Oman' => ['code' => '968', 'iso' => 'OM'],
            'Pakistan' => ['code' => '92', 'iso' => 'PK'],
            'Palau' => ['code' => '680', 'iso' => 'PW'],
            'Palestine' => ['code' => '970', 'iso' => 'PS'],
            'Panama' => ['code' => '507', 'iso' => 'PA'],
            'Papua New Guinea' => ['code' => '675', 'iso' => 'PG'],
            'Paraguay' => ['code' => '595', 'iso' => 'PY'],
            'Peru' => ['code' => '51', 'iso' => 'PE'],
            'Philippines' => ['code' => '63', 'iso' => 'PH'],
            'Pitcairn' => ['code' => '64', 'iso' => 'PN'],
            'Poland' => ['code' => '48', 'iso' => 'PL'],
            'Portugal' => ['code' => '351', 'iso' => 'PT'],
            'Puerto Rico' => ['code' => '1-787, 1-939', 'iso' => 'PR'],
            'Qatar' => ['code' => '974', 'iso' => 'QA'],
            'Republic of the Congo' => ['code' => '242', 'iso' => 'CG'],
            'Reunion' => ['code' => '262', 'iso' => 'RE'],
            'Romania' => ['code' => '40', 'iso' => 'RO'],
            'Russia' => ['code' => '7', 'iso' => 'RU'],
            'Rwanda' => ['code' => '250', 'iso' => 'RW'],
            'Saint Barthelemy' => ['code' => '590', 'iso' => 'BL'],
            'Saint Helena' => ['code' => '290', 'iso' => 'SH'],
            'Saint Kitts and Nevis' => ['code' => '1-869', 'iso' => 'KN'],
            'Saint Lucia' => ['code' => '1-758', 'iso' => 'LC'],
            'Saint Martin' => ['code' => '590', 'iso' => 'MF'],
            'Saint Pierre and Miquelon' => ['code' => '508', 'iso' => 'PM'],
            'Saint Vincent and the Grenadines' => ['code' => '1-784', 'iso' => 'VC'],
            'Samoa' => ['code' => '685', 'iso' => 'WS'],
            'San Marino' => ['code' => '378', 'iso' => 'SM'],
            'Sao Tome and Principe' => ['code' => '239', 'iso' => 'ST'],
            'Saudi Arabia' => ['code' => '966', 'iso' => 'SA'],
            'Senegal' => ['code' => '221', 'iso' => 'SN'],
            'Serbia' => ['code' => '381', 'iso' => 'RS'],
            'Seychelles' => ['code' => '248', 'iso' => 'SC'],
            'Sierra Leone' => ['code' => '232', 'iso' => 'SL'],
            'Singapore' => ['code' => '65', 'iso' => 'SG'],
            'Sint Maarten' => ['code' => '1-721', 'iso' => 'SX'],
            'Slovakia' => ['code' => '421', 'iso' => 'SK'],
            'Slovenia' => ['code' => '386', 'iso' => 'SI'],
            'Solomon Islands' => ['code' => '677', 'iso' => 'SB'],
            'Somalia' => ['code' => '252', 'iso' => 'SO'],
            'South Africa' => ['code' => '27', 'iso' => 'ZA'],
            'South Korea' => ['code' => '82', 'iso' => 'KR'],
            'South Sudan' => ['code' => '211', 'iso' => 'SS'],
            'Spain' => ['code' => '34', 'iso' => 'ES'],
            'Sri Lanka' => ['code' => '94', 'iso' => 'LK'],
            'Sudan' => ['code' => '249', 'iso' => 'SD'],
            'Suriname' => ['code' => '597', 'iso' => 'SR'],
            'Svalbard and Jan Mayen' => ['code' => '47', 'iso' => 'SJ'],
            'Swaziland' => ['code' => '268', 'iso' => 'SZ'],
            'Sweden' => ['code' => '46', 'iso' => 'SE'],
            'Switzerland' => ['code' => '41', 'iso' => 'CH'],
            'Syria' => ['code' => '963', 'iso' => 'SY'],
            'Taiwan' => ['code' => '886', 'iso' => 'TW'],
            'Tajikistan' => ['code' => '992', 'iso' => 'TJ'],
            'Tanzania' => ['code' => '255', 'iso' => 'TZ'],
            'Thailand' => ['code' => '66', 'iso' => 'TH'],
            'Togo' => ['code' => '228', 'iso' => 'TG'],
            'Tokelau' => ['code' => '690', 'iso' => 'TK'],
            'Tonga' => ['code' => '676', 'iso' => 'TO'],
            'Trinidad and Tobago' => ['code' => '1-868', 'iso' => 'TT'],
            'Tunisia' => ['code' => '216', 'iso' => 'TN'],
            'Turkey' => ['code' => '90', 'iso' => 'TR'],
            'Turkmenistan' => ['code' => '993', 'iso' => 'TM'],
            'Turks and Caicos Islands' => ['code' => '1-649', 'iso' => 'TC'],
            'Tuvalu' => ['code' => '688', 'iso' => 'TV'],
            'U.S. Virgin Islands' => ['code' => '1-340', 'iso' => 'VI'],
            'Uganda' => ['code' => '256', 'iso' => 'UG'],
            'Ukraine' => ['code' => '380', 'iso' => 'UA'],
            'United Arab Emirates' => ['code' => '971', 'iso' => 'AE'],
            'United Kingdom' => ['code' => '44', 'iso' => 'GB'],
            'United States' => ['code' => '1', 'iso' => 'US'],
            'Uruguay' => ['code' => '598', 'iso' => 'UY'],
            'Uzbekistan' => ['code' => '998', 'iso' => 'UZ'],
            'Vanuatu' => ['code' => '678', 'iso' => 'VU'],
            'Vatican' => ['code' => '379', 'iso' => 'VA'],
            'Venezuela' => ['code' => '58', 'iso' => 'VE'],
            'Vietnam' => ['code' => '84', 'iso' => 'VN'],
            'Wallis and Futuna' => ['code' => '681', 'iso' => 'WF'],
            'Western Sahara' => ['code' => '212', 'iso' => 'EH'],
            'Yemen' => ['code' => '967', 'iso' => 'YE'],
            'Zambia' => ['code' => '260', 'iso' => 'ZM'],
            'Zimbabwe' => ['code' => '263', 'iso' => 'ZW'],
        ];
        return view('detail', compact('package','packages','dialCodes'));
    }

    public function contactForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Contact::create($request->all());

        $data = [
            'data' => $data,
        ];

        GlobalHelper::sendEmail('info@high5daycare.ca', "A new contact message has been recieved", 'emails.contact', $data);
        return redirect()->back()->with('success', 'Contact message submitted successfully');
    }


}
