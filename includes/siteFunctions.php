<?php
function rawText($text)
{
    // General Text
    if ($text == 'home') {
        return 'Home';
    }
    if ($text == 'contact') {
        return "Contact Us";
    }
    if ($text == 'readmore') {
        return "Read More";
    }
    if ($text == 'learnmore') {
        return 'Learn More !';
    }
    if ($text == 'veiwmore') {
        return 'View More !';
    }
    if ($text == 'buy') {
        return 'Buy Now';
    }
    if ($text == 'submit') {
        return 'Submit';
    }

    // Header Text
    if ($text == 'about') {
        return 'About';
    }
    if ($text == 'link1') {
        return 'About Us';
    }
    if ($text == 'link2') {
        return 'Our Team';
    }
    if ($text == 'link3') {
        return 'Our partners';
    }
    if ($text == 'gallery') {
        return 'Gallery';
    }
    if ($text == 'photos') {
        return 'Photos';
    }
    if ($text == 'videos') {
        return 'Videos';
    }

    // Home Text
    if ($text == 'solution') {
        return 'For Smart Solutions.';
    }
    if ($text == 'Subscribe') {
        return 'Subscribe';
    }
    if ($text == '01') {
        return '01';
    }
    if ($text == '02') {
        return '02';
    }
    if ($text == '03') {
        return '03';
    }
    if ($text == '04') {
        return '04';
    }
    if ($text == '%') {
        return '%';
    }
    // About Text
    if ($text == 'about sec title') {
        return 'Improve your business with us !';
    }
    // Team Text
    if ($text == 'Our Team') {
        return 'Our Team';
    }
    if ($text == 'prop1') {
        return 'Good Business Consultants are Excellent Communicators';
    }
    if ($text == 'prop2') {
        return 'At the End of a Project, Good Business Consultants Can "Let it Go';
    }
    if ($text == 'prop3') {
        return 'Good Business Consultants Find Fulfilling Alternatives to Long-Term Work...';
    }
    if ($text == 'prop4') {
        return 'Good Business Consultants are Willing to Travel Where the Work Is';
    }
    if ($text == 'prop5') {
        return 'Write a Business Plan that Clearly Articulates the Following';
    }
    if ($text == 'skills') {
        return 'Professional Skills';
    }
    if ($text == 'market') {
        return 'Market Research';
    }
    if ($text == 'market%') {
        return '10%';
    }
    if ($text == 'sales') {
        return 'Sales Services';
    }
    if ($text == 'sales%') {
        return '25%';
    }
    if ($text == 'online') {
        return 'Online Reputation';
    }
    if ($text == 'online%') {
        return '5%';
    }
    if ($text == 'Strategic') {
        return 'Strategic Consulting';
    }
    if ($text == 'Strategic%') {
        return '75%';
    }
    // Gallery Text
    if ($text == 'photos') {
        return 'Photo Gallery';
    }
    if ($text == 'videos') {
        return 'Video Gallery';
    }
    // Services Text
    if ($text == 'services') {
        return 'Our Services';
    }
    // Portfolio Text
    if ($text == 'about projects') {
        return 'About Projects';
    }
    if ($text == 'project features') {
        return 'Project Features';
    }
    if ($text == 'latest projects') {
        return 'Latest Projects';
    }
    if ($text == 'category') {
        return 'Category :';
    }
    if ($text == 'status') {
        return 'Status :';
    }
    if ($text == 'client') {
        return 'Client :';
    }
    if ($text == 'date') {
        return 'Date :';
    }
    // News Text
    if ($text == 'news sec') {
        return 'Latest News';
    }
    if ($text == 'recent sec') {
        return 'Recent News';
    }
    // FAQ's Text -- Contact Text
    if ($text == 'question title') {
        return 'Have Any Questions?';
    }
    if ($text == 'question desc') {
        return "Just submit your details and we'll be in touch shortly.";
    }
    if ($text == 'privacy spam') {
        return "We hate spam, and we respect your privacy.";
    }
    if ($text == 'contact conversation') {
        return "We Have Great Solutions For Your Problems.";
    }
    if ($text == 'privacy spam') {
        return "Let's Talk about Your Business.";
    }
    if ($text == 'call') {
        return "Call Us";
    }
    if ($text == 'mesasge') {
        return "Message Us";
    }
    if ($text == 'location') {
        return "Our Location";
    }
    if ($text == 'work timming') {
        return "Working Time";
    }
    // Footer Text
    if ($text == 'about') {
        return "About Us";
    }
    if ($text == 'quick links') {
        return "Quick Links";
    }
    if ($text == 'faq title') {
        return "Customer's FAQ";
    }
    if ($text == 'policy') {
        return "Privacy Policy";
    }
    if ($text == 'terms') {
        return "Terms & Conditions";
    }
    if ($text == 'email') {
        return "Email";
    }
    if ($text == 'phone') {
        return "Phone";
    }
    if ($text == 'address') {
        return "Address";
    }
}
function ogTags()
{
    $slug = $_REQUEST['slug'];
    $meta['title'] = "";
    if ($ex = getList("SELECT * FROM tbl_products  WHERE pro_status='1' AND pro_approve='1' AND pro_slug='$slug'")) {
        $prod = $ex->fetch_assoc();
        $meta['title'] = $prod['pro_title'];
        $meta['description'] = $prod['pro_detail'];
        $meta['image'] =  PATH . 'uploads/products/' . $prod['pro_image'];
        $meta['url'] =  PATH . 'product-detail/' . $prod['pro_slug'];
    } elseif ($ex = getList("SELECT * FROM tbl_business_opps  WHERE opp_status='1' AND opp_slug='$slug'")) {
        $opp = $ex->fetch_assoc();
        $meta['title'] = $opp['opp_title'];
        $meta['description'] = $opp['opp_detail'];
        $meta['image'] =  PATH . 'uploads/media/' . $opp['opp_image'];
        $meta['url'] =  PATH . 'business-opportunities/' . $opp['opp_slug'];
    }

    if ($meta['title']) {
?>
        <meta property="og:title" content="<?= $meta['title'] ?>">
        <meta property="og:description" content="<?= $meta['description'] ?>">
        <meta property="og:image" content="<?= $meta['image'] ?>">
        <meta property="og:url" content="<?= $meta['url'] ?>">
        <meta property="twitter:title" content="<?= $meta['title'] ?>">
        <meta property="twitter:description" content="<?= $meta['description'] ?>">
        <meta property="twitter:image" content="<?= $meta['image'] ?>">
        <meta property="twitter:url" content="<?= $meta['url'] ?>">
    <?php
    }
}
function countries()
{
    $countries = array("Pakistan", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    return $countries;
}
function countycode()
{
    $countries = array(
        '+92', '+376', '+971', '+93',  '+1268', '+1264', '+355', '+374', '+599', '+244', '+672', '+54', '+1684', '+43', '+61', '+297', '+994', '+387', '+1246', '+880', '+32', '+226', '+359',
        '+973',
        '+257',
        '+229',
        '+590',
        '+1441',
        '+673',
        '+591',
        '+55',
        '+1242',
        '+975',
        '+267',
        '+375',
        '+501',
        '+1',
        '+61',
        '+243',
        '+236',
        '+242',
        '+41',
        '+225',
        '+682',
        '+56',
        '+237',
        '+86',
        '+57',
        '+506',
        '+53',
        '+238',
        '+61',
        '+357',
        '+420',
        '+49',
        '+253',
        '+45',
        '+1767',
        '+1809',
        '+213',
        '+593',
        '+372',
        '+20',
        '+291',
        '+34',
        '+251',
        '+358',
        '+679',
        '+500',
        '+691',
        '+298',
        '+33',
        '+241',
        '+44',
        '+1473',
        '+995',
        '+233',
        '+350',
        '+299',
        '+220',
        '+224',
        '+240',
        '+30',
        '+502',
        '+1671',
        '+245',
        '+592',
        '+852',
        '+504',
        '+385',
        '+509',
        '+36',
        '+62',
        '+353',
        '+972',
        '+44',
        '+91',
        '+964',
        '+98',
        '+354',
        '+39',
        '+1876',
        '+962',
        '+81',
        '+254',
        '+996',
        '+855',
        '+686',
        '+269',
        '+1869',
        '+850',
        '+82',
        '+965',
        '+1345',
        '+7',
        '+856',
        '+961',
        '+1758',
        '+423',
        '+94',
        '+231',
        '+266',
        '+370',
        '+352',
        '+371',
        '+218',
        '+212',
        '+377',
        '+373',
        '+382',
        '+1599',
        '+261',
        '+692',
        '+389',
        '+223',
        '+95',
        '+976',
        '+853',
        '+1670',
        '+222',
        '+1664',
        '+356',
        '+230',
        '+960',
        '+265',
        '+52',
        '+60',
        '+258',
        '+264',
        '+687',
        '+227',
        '+234',
        '+505',
        '+31',
        '+47',
        '+977',
        '+674',
        '+683',
        '+64',
        '+968',
        '+507',
        '+51',
        '+689',
        '+675',
        '+63',
        '+48',
        '+508',
        '+870',
        '+1',
        '+351',
        '+680',
        '+595',
        '+974',
        '+40',
        '+381',
        '+7',
        '+250',
        '+966',
        '+677',
        '+248',
        '+249',
        '+46',
        '+65',
        '+290',
        '+386',
        '+421',
        '+232',
        '+378',
        '+221',
        '+252',
        '+597',
        '+239',
        '+503',
        '+963',
        '+268',
        '+1649',
        '+235',
        '+228',
        '+66',
        '+690',
        '+670',
        '+993',
        '+216',
        '+676',
        '+90',
        '+1868',
        '+688',
        '+886',
        '+255',
        '+380',
        '+256',
        '+1',
        '+598',
        '+998',
        '+39',
        '+1784',
        '+58',
        '+1284',
        '+1340',
        '+84',
        '+678',
        '+681',
        '+685',
        '+381',
        '+967',
        '+262',
        '+27',
        '+260',
        '+263'
    );
    return $countries;
}
function cities()
{
    $cities = array(0 => 'Islamabad', 1 => 'Ahmed Nager', 2 => 'Ahmadpur East', 3 => 'Ali Khan', 4 => 'Alipur', 5 => 'Arifwala', 6 => 'Attock', 7 => 'Bhera', 8 => 'Bhalwal', 9 => 'Bahawalnagar', 10 => 'Bahawalpur', 11 => 'Bhakkar', 12 => 'Burewala', 13 => 'Chillianwala', 14 => 'Chakwal', 15 => 'Chichawatni', 16 => 'Chiniot', 17 => 'Chishtian', 18 => 'Daska', 19 => 'Darya Khan', 20 => 'Dera Ghazi', 21 => 'Dhaular', 22 => 'Dina', 23 => 'Dinga', 24 => 'Dipalpur', 25 => 'Faisalabad', 26 => 'Fateh Jhang', 27 => 'Ghakhar Mandi', 28 => 'Gojra', 29 => 'Gujranwala', 30 => 'Gujrat', 31 => 'Gujar Khan', 32 => 'Hafizabad', 33 => 'Haroonabad', 34 => 'Hasilpur', 35 => 'Haveli', 36 => 'Lakha', 37 => 'Jalalpur', 38 => 'Jattan', 39 => 'Jampur', 40 => 'Jaranwala', 41 => 'Jhang', 42 => 'Jhelum', 43 => 'Kalabagh', 44 => 'Karor Lal', 45 => 'Kasur', 46 => 'Kamalia', 47 => 'Kamoke', 48 => 'Khanewal', 49 => 'Khanpur', 50 => 'Kharian', 51 => 'Khushab', 52 => 'Kot Adu', 53 => 'Jauharabad', 54 => 'Lahore', 55 => 'Lalamusa', 56 => 'Layyah', 57 => 'Liaquat Pur', 58 => 'Lodhran', 59 => 'Malakwal', 60 => 'Mamoori', 61 => 'Mailsi', 62 => 'Mandi Bahauddin', 63 => 'mian Channu', 64 => 'Mianwali', 65 => 'Multan', 66 => 'Murree', 67 => 'Muridke', 68 => 'Mianwali Bangla', 69 => 'Muzaffargarh', 70 => 'Narowal', 71 => 'Okara', 72 => 'Renala Khurd', 73 => 'Pakpattan', 74 => 'Pattoki', 75 => 'Pir Mahal', 76 => 'Qaimpur', 77 => 'Qila Didar', 78 => 'Rabwah', 79 => 'Raiwind', 80 => 'Rajanpur', 81 => 'Rahim Yar', 82 => 'Rawalpindi', 83 => 'Sadiqabad', 84 => 'Safdarabad', 85 => 'Sahiwal', 86 => 'Sangla Hill', 87 => 'Sarai Alamgir', 88 => 'Sargodha', 89 => 'Shakargarh', 90 => 'Sheikhupura', 91 => 'Sialkot', 92 => 'Sohawa', 93 => 'Soianwala', 94 => 'Siranwali', 95 => 'Talagang', 96 => 'Taxila', 97 => 'Toba Tek', 98 => 'Vehari', 99 => 'Wah Cantonment', 100 => 'Wazirabad', 101 => 'Badin', 102 => 'Bhirkan', 103 => 'Rajo Khanani', 104 => 'Chak', 105 => 'Dadu', 106 => 'Digri', 107 => 'Diplo', 108 => 'Dokri', 109 => 'Ghotki', 110 => 'Haala', 111 => 'Hyderabad', 112 => 'Islamkot', 113 => 'Jacobabad', 114 => 'Jamshoro', 115 => 'Jungshahi', 116 => 'Kandhkot', 117 => 'Kandiaro', 118 => 'Karachi', 119 => 'Kashmore', 120 => 'Keti Bandar', 121 => 'Khairpur', 122 => 'Kotri', 123 => 'Larkana', 124 => 'Matiari', 125 => 'Mehar', 126 => 'Mirpur Khas', 127 => 'Mithani', 128 => 'Mithi', 129 => 'Mehrabpur', 130 => 'Moro', 131 => 'Nagarparkar', 132 => 'Naudero', 133 => 'Naushahro Feroze', 134 => 'Naushara', 135 => 'Nawabshah', 136 => 'Nazimabad', 137 => 'Qambar', 138 => 'Qasimabad', 139 => 'Ranipur', 140 => 'Ratodero', 141 => 'Rohri', 142 => 'Sakrand', 143 => 'Sanghar', 144 => 'Shahbandar', 145 => 'Shahdadkot', 146 => 'Shahdadpur', 147 => 'Shahpur Chakar', 148 => 'Shikarpaur', 149 => 'Sukkur', 150 => 'Tangwani', 151 => 'Tando Adam', 152 => 'Tando Allahyar', 153 => 'Tando Muhammad', 154 => 'Thatta', 155 => 'Umerkot', 156 => 'Warah', 157 => 'Abbottabad', 158 => 'Adezai', 159 => 'Alpuri', 160 => 'Akora Khattak', 161 => 'Ayubia', 162 => 'Banda Daud', 163 => 'Bannu', 164 => 'Batkhela', 165 => 'Battagram', 166 => 'Birote', 167 => 'Chakdara', 168 => 'Charsadda', 169 => 'Chitral', 170 => 'Daggar', 171 => 'Dargai', 172 => 'Darya Khan', 173 => 'dera Ismail', 174 => 'Doaba', 175 => 'Dir', 176 => 'Drosh', 177 => 'Hangu', 178 => 'Haripur', 179 => 'Karak', 180 => 'Kohat', 181 => 'Kulachi', 182 => 'Lakki Marwat', 183 => 'Latamber', 184 => 'Madyan', 185 => 'Mansehra', 186 => 'Mardan', 187 => 'Mastuj', 188 => 'Mingora', 189 => 'Nowshera', 190 => 'Paharpur', 191 => 'Pabbi', 192 => 'Peshawar', 193 => 'Saidu Sharif', 194 => 'Shorkot', 195 => 'Shewa Adda', 196 => 'Swabi', 197 => 'Swat', 198 => 'Tangi', 199 => 'Tank', 200 => 'Thall', 201 => 'Timergara', 202 => 'Tordher', 203 => 'Awaran', 204 => 'Barkhan', 205 => 'Chagai', 206 => 'Dera Bugti', 207 => 'Gwadar', 208 => 'Harnai', 209 => 'Jafarabad', 210 => 'Jhal Magsi', 211 => 'Kacchi', 212 => 'Kalat', 213 => 'Kech', 214 => 'Kharan', 215 => 'Khuzdar', 216 => 'Killa Abdullah', 217 => 'Killa Saifullah', 218 => 'Kohlu', 219 => 'Lasbela', 220 => 'Lehri', 221 => 'Loralai', 222 => 'Mastung', 223 => 'Musakhel', 224 => 'Nasirabad', 225 => 'Nushki', 226 => 'Panjgur', 227 => 'Pishin valley', 228 => 'Quetta', 229 => 'Sherani', 230 => 'Sibi', 231 => 'Sohbatpur', 232 => 'Washuk', 233 => 'Zhob', 234 => 'Ziarat',);
    return $cities;
}

function getprojectStatus($status)
{

    if ($status == '1') {
        return 'Complete';
    } else if ($status == '2') {
        return 'Upcomming';
    } else if ($status == '0') {
        return 'In Process';
    }
}
function isValidRecaptcha($post)
{
    include_once("includes/conn.php");
    if (isset($post) && !empty($post)) {
        //your site secret key
        $secret = $admin_key;
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'secret' => $secret,
                'response' => $post,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $output = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($output);
        if ($responseData->success) {
            return true;
        }
    }
    return false;
}

function getSlider()
{
    $output = array();

    if ($ex = getList("SELECT * FROM tbl_slider WHERE slider_status='1' ORDER BY slider_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPosts($blg_main = '')
{
    $where_main = '';
    $output = array();

    if ($blg_main != '')
        $where_main = " AND blg_main='" . $blg_main . "' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getServiceCategories($service_id)
{
    $output = array();

    if ($ex = getList("SELECT t.* FROM tbl_service_technologies st 
    JOIN tbl_technologies t ON t.tec_id = st.tec_id WHERE st.service_id = '" . $service_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getServiceCategoriesString($service_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT t.* FROM tbl_service_technologies st 
    JOIN tbl_technologies t ON t.tec_id = st.tec_id WHERE st.service_id = '" . $service_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['tec_title'] . (($key < count($output) - 1) ? ", " : "");
    }
    return $string;
}
function getPakageCategoriesString($pri_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT t.* FROM tbl_pricing_type st 
    JOIN tbl_pri_types t ON t.type_id = st.type_id WHERE st.pri_id = '" . $pri_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['type_title'] . (($key < count($output) - 1) ? ", " : "");
    }
    return $string;
}
function getPakageCategoriesSlugString($pri_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT t.* FROM tbl_pricing_type st 
    JOIN tbl_pri_types t ON t.type_id = st.type_id WHERE st.pri_id = '" . $pri_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['type_slug'] . (($key < count($output) - 1) ? ", " : "");
    }
    return $string;
}

function getPortfolioCategoriesString($portfolio_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT c.* FROM tbl_portfolio_categories pc 
    JOIN tbl_categories c ON c.cat_id = pc.cat_id WHERE pc.portfolio_id = '" . $portfolio_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['cat_title'] . (($key < count($output) - 1) ? ", " : "");
    }
    return $string;
}
function getSkillCat($cat_id)
{
    if ($ex = getList("SELECT * FROM tbl_skill_cats WHERE cat_id = '" . $cat_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line['cat_title'];
    } else {
        return 'Category Deleted';
    }
}
function getProCat($cat_id)
{
    if ($ex = getList("SELECT * FROM tbl_pro_cats WHERE cat_id = '" . $cat_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line['cat_title'];
    } else {
        return 'Category Deleted';
    }
}
function getProCatSlug($cat_id)
{
    if ($ex = getList("SELECT * FROM tbl_pro_cats WHERE cat_id = '" . $cat_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line['cat_slug'];
    } else {
        return 'Category Deleted';
    }
}
function getSeller($seller_id)
{
    if ($ex = getList("SELECT * FROM tbl_sellers WHERE seller_id = '" . $seller_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line['seller_name'];
    } else {
        return 'Seller Removed';
    }
}
function getPaymentStatuses($status = "")
{
    $statuses = array(
        "paid" => "Verified",
        "unpaid" => "Not Verified",
    );
    if ($status != "") {
        return in_array($status, $statuses) ? $statuses[$status] : "";
    }
    return $statuses;
}
function getDeliveryStatuses($status = "")
{
    $statuses = array(
        "pending" => "Pending",
        "in_process" => "In Process",
        "delivered" => "Delivered",
        "cancelled" => "Cancelled",

    );
    if ($status != "") {
        return in_array($status, $statuses) ? $statuses[$status] : "";
    }
    return $statuses;
}
function getAmbassadorFromSellerId($seller_id)
{
    $ex = getList("SELECT a.amb_fullname FROM tbl_sellers s JOIN tbl_ambassadors a ON s.amb_id = a.amb_id WHERE s.seller_id = '" . $seller_id . "' ");
    $line = fetch_assoc($ex);
    return $line['amb_fullname'];

    return 'Ambassador Removed';
}
function getAmbassadorById($amb_id)
{
    if ($ex = getList("SELECT * FROM tbl_ambassadors WHERE amb_id = '" . $amb_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line;
    } else {
        return 'Ambassador Removed';
    }
}
function getAmbassadorByEmail($amb_email)
{
    if ($ex = getList("SELECT * FROM tbl_ambassadors WHERE amb_email = '" . $amb_email . "' ")) {
        $line = fetch_assoc($ex);
        return $line;
    } else {
        return FALSE;
    }
}
function getAmbassador($amb_id)
{
    if ($ex = getList("SELECT * FROM tbl_ambassadors WHERE amb_id = '" . $amb_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line['amb_fullname'];
    } else {
        return 'Ambassador Removed';
    }
}
function getTotalBalanceByAmbId($amb_id)
{
    $amb_com = 0;
    if ($ex = getList("SELECT * FROM tbl_orders WHERE amb_id = '" . $amb_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $product = getProductByID($line['order_product']);
            $amb_com += ($line['order_price'] * $product['pro_amb_com']) / 100;
        }
        return $amb_com;
    } else {
        return 'No Balance Available';
    }
}
function getBalanceByAmbId($amb_id)
{
    $amb_com = 0;
    if ($ex = getList("SELECT * FROM tbl_orders WHERE amb_id = '" . $amb_id . "' AND order_payment='paid' ")) {
        while ($line = fetch_assoc($ex)) {
            $product = getProductByID($line['order_product']);
            $amb_com += ($line['order_price'] * $product['pro_amb_com']) / 100;
        }
        return $amb_com;
    } else {
        return 'No Balance Available';
    }
}
function getPendingBalanceByAmbId($amb_id)
{
    $amb_com = 0;
    if ($ex = getList("SELECT * FROM tbl_orders WHERE amb_id = '" . $amb_id . "' AND order_payment='unpaid' ")) {
        while ($line = fetch_assoc($ex)) {
            $product = getProductByID($line['order_product']);
            $amb_com += ($line['order_price'] * $product['pro_amb_com']) / 100;
        }
        return $amb_com;
    } else {
        return 'No Balance Available';
    }
}
function getJob($job_id)
{
    if ($ex = getList("SELECT * FROM tbl_job_opps WHERE job_id = '" . $job_id . "' ")) {
        $line = fetch_assoc($ex);
        return $line;
    } else {
        return 'Ambassador Removed';
    }
}
function generateAmbassadorCode()
{
    do {
        $code = "MP" . rand(11111111, 99999999);
    } while (getList("SELECT * FROM tbl_ambassadors WHERE amb_code = '" . $code . "'"));
    return $code;
}
function findAmbassador($key)
{

    if ($ex = getList("SELECT * FROM tbl_ambassadors WHERE amb_code = '" . $key . "' OR amb_email = '" . $key . "' OR SUBSTRING(amb_contact, -10, 10) = '" . substr(str_replace(' ', '', $key), -10, 10) . "'")) {
        $line = fetch_assoc($ex);
        return $line;
    }
    return;
}
function getVisitorAdmin($admin_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT * FROM tbl_siteadmin WHERE site_id = '" . $admin_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['site_login'];
    }
    return $string;
}
function saveCountRecord($table, $ary)
{
    global $conn;
    if (isset($ary) && count($ary) > 0) {

        $sql = " INSERT INTO `$table` SET ";

        foreach ($ary as $key => $val) {

            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);



        if (exQuery($sql))
            return true;
        else
            return false;
    }
}
function getPortfolioCategoriestoggleString($portfolio_id)
{
    $output = array();
    $string = "";
    if ($ex = getList("SELECT c.* FROM tbl_portfolio_categories pc 
    JOIN tbl_categories c ON c.cat_id = pc.cat_id WHERE pc.portfolio_id = '" . $portfolio_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    foreach ($output as $key => $value) {
        $string .= $value['cat_slug'] . (($key < count($output) - 1) ? " " : "");
    }
    return $string;
}

function getServiceCategoriesArray($service_id)
{
    $output = array();
    if ($ex = getList("SELECT t.* FROM tbl_service_technologies st 
    JOIN tbl_technologies t ON t.tec_id = st.tec_id WHERE st.service_id = '" . $service_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    return $output;
}
function getPortfolioCategoriesArray($portfolio_id)
{
    $output = array();
    if ($ex = getList("SELECT t.* FROM tbl_portfolio_categories st 
    JOIN tbl_categories t ON t.cat_id = st.cat_id WHERE st.portfolio_id = '" . $portfolio_id . "' ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }

    return $output;
}
function getMenuPosts($blg_main)
{
    $where_main = '';
    $output = array();

    $where_main = " AND blg_main='" . $blg_main . "' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPostName($blg_id)
{
    $output = '';
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_id='" . $blg_id . "'  ")) {
        while ($line = fetch_assoc($ex)) {
            $output = $line['blg_title'];
        }
    }
    return $output;
}

function getDetailPosts($blg_main = '')
{
    $where_main = '';
    $output = array();

    if (!empty($blg_main)) {
        $where_main = " AND blg_main='$blg_main' ";

        if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
            while ($line = fetch_assoc($ex)) {
                $output[] = $line;
            }
        }
    }
    return $output;
}

function getHomePosts()
{
    $where_main = '';
    $output = array();

    $where_main = " AND blg_home='1' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getOffers()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_offer WHERE offer_status='1' ORDER BY offer_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getNews()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_news WHERE news_status='1' ORDER BY news_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getServicesPosts()
{
    $output = array();

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' ORDER BY blg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getOtherServicesPosts()
{
    $where_main = '';
    $output = array();

    $where_main = " AND blg_main='5' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPost($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' AND blg_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getOffer($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_offer WHERE offer_status='1' AND offer_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPostBySlug($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' AND blg_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPackageBySlug($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_packages WHERE pkg_status='1' AND pkg_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getAreaBySlug($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_practice_areas WHERE pa_status='1' AND pa_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getNewsBySlug($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_news WHERE news_status='1' AND news_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPostTitle($id)
{
    $output = array();
    if ($ex = getList("SELECT blg_title FROM tbl_blog WHERE blg_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return stripslashes($output['blg_title']);
}

function getVideoId($url)
{
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
    return $matches[0];
}

function isSubPost($id, $slug)
{
    //$output = array();
    if ($ex = getList("SELECT blg_id FROM tbl_blog WHERE blg_main='" . $id . "' AND blg_slug='" . $slug . "' ")) {
        return true;
        //$output = fetch_assoc($ex);
    }
    return false;
}

function getGallery()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_gallery WHERE gal_status='1' ORDER BY gal_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getFaqs()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_faqs WHERE fq_status='1' ORDER BY fq_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPackages()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_packages WHERE pkg_status='1' order by pkg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getPaymentMethods()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_payment_methods WHERE payment_status='1' order by payment_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getPaymentMethodById($id)
{
    $output = NULL;
    if ($ex = getList("SELECT * FROM tbl_payment_methods WHERE payment_id='" . $id . "'")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getPartners()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_partners WHERE par_status='1' order by par_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getTexts()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_texts WHERE 1 ")) {
        while ($line = fetch_assoc($ex)) {
            $output[$line['txt_type']] = $line;
        }
    }
    return $output;
}

function getApplicant($id = "")
{
    if (!$id) {
        if (!$_SESSION['ambassador_id'] || !$_SESSION['ambassador_session']) {
            return NULL;
        }
        $id = $_SESSION['ambassador_id'];
    }
    if ($ex = exQuery("SELECT * FROM `tbl_ambassadors` WHERE amb_id = '" . $id . "' AND amb_login_session = '" . $_SESSION['ambassador_session'] . "'")) {
        return fetch_assoc($ex);
    }
    return NULL;
}

function getTextField($type, $field)
{
    $output = array();
    if ($ex = getList("SELECT `$field` FROM tbl_texts WHERE txt_type='$type' ")) {
        $rs = fetch_assoc($ex);
        $output = str($rs[$field]);
    }
    return $output;
}

function getCategories()
{
    global $conn;
    $sql = "SELECT * FROM tbl_listings  WHERE list_type='categories' AND list_status='1' ORDER BY list_order ASC";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
    ?>
        <li>
            <a href="<?= PATH ?>news/<?= $row['list_slug']; ?>"><?= $row['list_title']; ?></a>
        </li>
<?php

    }
}

function getCategory($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_product_categories WHERE pcat_slug='$slug' AND pcat_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getCategorybyId($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_listings  WHERE list_type='categories' AND list_status='1' AND list_id='" . $id . "' ORDER BY list_order ASC";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        echo $row['list_title'];
    }
}
function getProductCategorybySlug($slug)
{
    global $conn;
    $sql = "SELECT * FROM tbl_pro_cats WHERE cat_slug='" . $slug . "'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return $row;
    }
}
function getProductCode($code)
{
    global $conn;
    $sql = "SELECT * FROM tbl_products WHERE pro_code='" . $code . "'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return $row;
    }
}
function getSkillCategorybyId($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_skill_cats WHERE cat_id='" . $id . "'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return $row;
    }
}
function getServiceById($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_services WHERE service_id='" . $id . "'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return $row;
    }
}
function getSkillParentCats($cat_id = "")
{
    $output = array();
    $where = "";
    if ($cat_id != "") {
        $where = "AND cat_id != '" . $cat_id . "'";
    }
    if ($ex = getList("SELECT * FROM tbl_skill_cats WHERE cat_parent='0' AND cat_status='1' $where ORDER BY cat_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getSkillChildrenCats($cat_id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_skill_cats WHERE cat_parent='" . $cat_id . "' AND cat_status='1' ORDER BY cat_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}


function getProducts($cat_id = '')
{
    $output = array();
    $where = "";
    if (!empty($cat_id)) {
        $where = " AND (pcat_id='$cat_id' || pcat_type_id='$cat_id') ";
    }
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' $where ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function searchProducts($q)
{
    $output = array();
    $where = " AND (p_title LIKE '%$q%' OR p_desc LIKE '%$q%' OR p_description LIKE '%$q%' OR p_specifications LIKE '%$q%' OR p_tags LIKE '%$q%') ";
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' $where ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getFeaturedProducts()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' AND p_featured='1' ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getProduct($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_products WHERE pro_slug='$slug' AND pro_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function generateInvoiceNumber()
{
    $inv_no = "";
    do {
        $inv_no = "MPT-" . rand(11111111, 99999999);
    } while (getList("SELECT * FROM tbl_orders WHERE order_invoice_no = '" . $inv_no . "'"));
    return $inv_no;
}
function getOrderPaymentStatus($status)
{
    switch ($status) {
        case "paid":
            return "<span class='text-success'>Verified</span>";
        default:
            return "<span class='text-danger'>Not Verified</span>";
    }
}
function getOrderDeliveryStatus($status)
{
    switch ($status) {
        case "cancelled":
            return "<span class='text-danger'>Cancelled</span>";
        case "delivered":
            return "<span class='text-success'>Delivered</span>";
        case "in_process":
            return "<span class='text-info'>In Process</span>";
        default:
            return "<span class='text-warning'>Pending</span>";
    }
}
function generateTrackingNumber()
{
    $tracking_no = "";
    do {
        $tracking_no = rand(11111111, 99999999);
    } while (getList("SELECT * FROM tbl_orders WHERE order_tracking_no = '" . $tracking_no . "'"));
    return $tracking_no;
}
function getProductByID($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_products WHERE pro_id='$id' AND pro_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getExpoByID($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_expo_schedules WHERE expo_id='$id' AND expo_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getOrder($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_orders WHERE order_id='$id'")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getBooking($id)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_expo_bookings WHERE booking_id='$id'")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function searchOrders($query)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_orders WHERE order_email='$query' OR order_tracking_no='$query' ORDER BY order_date DESC")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function searchBookings($query)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_expo_bookings WHERE booking_email='$query' OR booking_tracking_no='$query' ORDER BY booking_date DESC")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getProductImages($pid)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_product_images WHERE pimg_status='1' AND p_id='$pid' ORDER BY pimg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getBlog()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_status='1' ORDER BY b_order DESC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getRecentBlog()
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_status='1' ORDER BY b_date DESC LIMIT 0,4 ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getBlogPost($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_slug='$slug' AND b_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getListings($type, $params = array())
{
    $output = array();
    $where = "";
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function searchListings($type, $params = array(), $keywords = '')
{
    $output = array();
    $where = "";
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if (!empty($keywords)) {
        $where .= " AND (list_title LIKE '%$keywords%' "
            . " OR list_desc LIKE '%$keywords%' "
            . " OR list_detail LIKE '%$keywords%')";
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getListingsSingle($type, $params = array())
{
    $output = array();
    $where = "";
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getListingsBySlug($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_slug='$slug' order by list_order ASC ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getMenuPage($slug)
{
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_menu_pages WHERE page_name='$slug' AND page_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function splitString($str, $tag = 'span')
{
    $str = str($str);
    $str_ary = explode(' ', $str);
    $str_half = ceil(count($str_ary) / 2);
    $str_ary = explode(' ', $str, $str_half + 1);
    $string2 = $str_ary[$str_half];
    unset($str_ary[$str_half]);
    $string1 = implode(' ', $str_ary);
    return $string1 . " <$tag>" . $string2 . "</$tag>";
}

function getMenuPages($parent = 0)
{
    $output = array();
    $where = "";
    if ($ex = getList("SELECT * FROM tbl_pages WHERE page_menu='1' AND page_status='1' $where ORDER BY page_id ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getParentServices($parent = 0)
{
    $output = array();
    $where = "";
    if ($ex = getList("SELECT * FROM tbl_services WHERE service_parent IS NULL OR service_parent='0' $where ORDER BY service_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            if ($parent) {
                $line['selected'] = FALSE;
                if ($parent == $line['service_id'])
                    $line['selected'] = TRUE;
            }
            $output[] = $line;
        }
    }
    return $output;
}
function getChildrenServices($parent = 0)
{
    $output = array();
    $where = "";
    if ($ex = getList("SELECT * FROM tbl_services WHERE service_parent='$parent' AND service_status='1' $where ORDER BY service_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}
function getMenuParentName($parent)
{
    $output = array();
    if (!empty($parent)) {
        if ($ex = getList("SELECT * FROM tbl_pages WHERE page_id='$parent' AND page_status='1'")) {
            $line = fetch_assoc($ex);
            $output = str($line['page_title']);
        }
    } else {
        $output = '';
    }
    return $output;
}
function getPagingforNews($table, $where, $limit, $tpage, $seprater, $pager)
{
    global $conn;
    $nxt = '';
    $prv = '';
    $tbl_name = $table;  //your table name
    $adjacents = 5;
    //  echo $_REQUEST['page'];
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages = $conn->query($query)->fetch_array();
    $total_pages = $total_pages['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
    //  $limit = 12;
    //  $_GET['pager']          //how many items to show per page
    $page = $pager;
    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $seprator = $seprater;

    $sql = "SELECT * from $tbl_name $where  LIMIT $start, $limit";

    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class=\"pagination-center\">";
        $pagination .= "<ul>";
        //previous button


        //pages
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li><span class=\"current\">$counter</span></li>";
                else
                    $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
                $pagination .= "...";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a></li>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=1\">1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=2\">2</a></li>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
                $pagination .= "...";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a></li>";
            }
            //close to end; only hide early pages
            else {
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=1\">1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=2\">2</a></li>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
            }
        }
        //next button

        $pagination .= "</ul>\n";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}


function getTimezone($key = null)
{
    $timezones = array(
        'America/Adak' => '(GMT-10:00) America/Adak (Hawaii-Aleutian Standard Time)',
        'America/Atka' => '(GMT-10:00) America/Atka (Hawaii-Aleutian Standard Time)',
        'America/Anchorage' => '(GMT-9:00) America/Anchorage (Alaska Standard Time)',
        'America/Juneau' => '(GMT-9:00) America/Juneau (Alaska Standard Time)',
        'America/Nome' => '(GMT-9:00) America/Nome (Alaska Standard Time)',
        'America/Yakutat' => '(GMT-9:00) America/Yakutat (Alaska Standard Time)',
        'America/Dawson' => '(GMT-8:00) America/Dawson (Pacific Standard Time)',
        'America/Ensenada' => '(GMT-8:00) America/Ensenada (Pacific Standard Time)',
        'America/Los_Angeles' => '(GMT-8:00) America/Los_Angeles (Pacific Standard Time)',
        'America/Tijuana' => '(GMT-8:00) America/Tijuana (Pacific Standard Time)',
        'America/Vancouver' => '(GMT-8:00) America/Vancouver (Pacific Standard Time)',
        'America/Whitehorse' => '(GMT-8:00) America/Whitehorse (Pacific Standard Time)',
        'Canada/Pacific' => '(GMT-8:00) Canada/Pacific (Pacific Standard Time)',
        'Canada/Yukon' => '(GMT-8:00) Canada/Yukon (Pacific Standard Time)',
        'Mexico/BajaNorte' => '(GMT-8:00) Mexico/BajaNorte (Pacific Standard Time)',
        'America/Boise' => '(GMT-7:00) America/Boise (Mountain Standard Time)',
        'America/Cambridge_Bay' => '(GMT-7:00) America/Cambridge_Bay (Mountain Standard Time)',
        'America/Chihuahua' => '(GMT-7:00) America/Chihuahua (Mountain Standard Time)',
        'America/Dawson_Creek' => '(GMT-7:00) America/Dawson_Creek (Mountain Standard Time)',
        'America/Denver' => '(GMT-7:00) America/Denver (Mountain Standard Time)',
        'America/Edmonton' => '(GMT-7:00) America/Edmonton (Mountain Standard Time)',
        'America/Hermosillo' => '(GMT-7:00) America/Hermosillo (Mountain Standard Time)',
        'America/Inuvik' => '(GMT-7:00) America/Inuvik (Mountain Standard Time)',
        'America/Mazatlan' => '(GMT-7:00) America/Mazatlan (Mountain Standard Time)',
        'America/Phoenix' => '(GMT-7:00) America/Phoenix (Mountain Standard Time)',
        'America/Shiprock' => '(GMT-7:00) America/Shiprock (Mountain Standard Time)',
        'America/Yellowknife' => '(GMT-7:00) America/Yellowknife (Mountain Standard Time)',
        'Canada/Mountain' => '(GMT-7:00) Canada/Mountain (Mountain Standard Time)',
        'Mexico/BajaSur' => '(GMT-7:00) Mexico/BajaSur (Mountain Standard Time)',
        'America/Belize' => '(GMT-6:00) America/Belize (Central Standard Time)',
        'America/Cancun' => '(GMT-6:00) America/Cancun (Central Standard Time)',
        'America/Chicago' => '(GMT-6:00) America/Chicago (Central Standard Time)',
        'America/Costa_Rica' => '(GMT-6:00) America/Costa_Rica (Central Standard Time)',
        'America/El_Salvador' => '(GMT-6:00) America/El_Salvador (Central Standard Time)',
        'America/Guatemala' => '(GMT-6:00) America/Guatemala (Central Standard Time)',
        'America/Knox_IN' => '(GMT-6:00) America/Knox_IN (Central Standard Time)',
        'America/Managua' => '(GMT-6:00) America/Managua (Central Standard Time)',
        'America/Menominee' => '(GMT-6:00) America/Menominee (Central Standard Time)',
        'America/Merida' => '(GMT-6:00) America/Merida (Central Standard Time)',
        'America/Mexico_City' => '(GMT-6:00) America/Mexico_City (Central Standard Time)',
        'America/Monterrey' => '(GMT-6:00) America/Monterrey (Central Standard Time)',
        'America/Rainy_River' => '(GMT-6:00) America/Rainy_River (Central Standard Time)',
        'America/Rankin_Inlet' => '(GMT-6:00) America/Rankin_Inlet (Central Standard Time)',
        'America/Regina' => '(GMT-6:00) America/Regina (Central Standard Time)',
        'America/Swift_Current' => '(GMT-6:00) America/Swift_Current (Central Standard Time)',
        'America/Tegucigalpa' => '(GMT-6:00) America/Tegucigalpa (Central Standard Time)',
        'America/Winnipeg' => '(GMT-6:00) America/Winnipeg (Central Standard Time)',
        'Canada/Central' => '(GMT-6:00) Canada/Central (Central Standard Time)',
        'Canada/East-Saskatchewan' => '(GMT-6:00) Canada/East-Saskatchewan (Central Standard Time)',
        'Canada/Saskatchewan' => '(GMT-6:00) Canada/Saskatchewan (Central Standard Time)',
        'Chile/EasterIsland' => '(GMT-6:00) Chile/EasterIsland (Easter Is. Time)',
        'Mexico/General' => '(GMT-6:00) Mexico/General (Central Standard Time)',
        'America/Atikokan' => '(GMT-5:00) America/Atikokan (Eastern Standard Time)',
        'America/Bogota' => '(GMT-5:00) America/Bogota (Colombia Time)',
        'America/Cayman' => '(GMT-5:00) America/Cayman (Eastern Standard Time)',
        'America/Coral_Harbour' => '(GMT-5:00) America/Coral_Harbour (Eastern Standard Time)',
        'America/Detroit' => '(GMT-5:00) America/Detroit (Eastern Standard Time)',
        'America/Fort_Wayne' => '(GMT-5:00) America/Fort_Wayne (Eastern Standard Time)',
        'America/Grand_Turk' => '(GMT-5:00) America/Grand_Turk (Eastern Standard Time)',
        'America/Guayaquil' => '(GMT-5:00) America/Guayaquil (Ecuador Time)',
        'America/Havana' => '(GMT-5:00) America/Havana (Cuba Standard Time)',
        'America/Indianapolis' => '(GMT-5:00) America/Indianapolis (Eastern Standard Time)',
        'America/Iqaluit' => '(GMT-5:00) America/Iqaluit (Eastern Standard Time)',
        'America/Jamaica' => '(GMT-5:00) America/Jamaica (Eastern Standard Time)',
        'America/Lima' => '(GMT-5:00) America/Lima (Peru Time)',
        'America/Louisville' => '(GMT-5:00) America/Louisville (Eastern Standard Time)',
        'America/Montreal' => '(GMT-5:00) America/Montreal (Eastern Standard Time)',
        'America/Nassau' => '(GMT-5:00) America/Nassau (Eastern Standard Time)',
        'America/New_York' => '(GMT-5:00) America/New_York (Eastern Standard Time)',
        'America/Nipigon' => '(GMT-5:00) America/Nipigon (Eastern Standard Time)',
        'America/Panama' => '(GMT-5:00) America/Panama (Eastern Standard Time)',
        'America/Pangnirtung' => '(GMT-5:00) America/Pangnirtung (Eastern Standard Time)',
        'America/Port-au-Prince' => '(GMT-5:00) America/Port-au-Prince (Eastern Standard Time)',
        'America/Resolute' => '(GMT-5:00) America/Resolute (Eastern Standard Time)',
        'America/Thunder_Bay' => '(GMT-5:00) America/Thunder_Bay (Eastern Standard Time)',
        'America/Toronto' => '(GMT-5:00) America/Toronto (Eastern Standard Time)',
        'Canada/Eastern' => '(GMT-5:00) Canada/Eastern (Eastern Standard Time)',
        'America/Caracas' => '(GMT-4:-30) America/Caracas (Venezuela Time)',
        'America/Anguilla' => '(GMT-4:00) America/Anguilla (Atlantic Standard Time)',
        'America/Antigua' => '(GMT-4:00) America/Antigua (Atlantic Standard Time)',
        'America/Aruba' => '(GMT-4:00) America/Aruba (Atlantic Standard Time)',
        'America/Asuncion' => '(GMT-4:00) America/Asuncion (Paraguay Time)',
        'America/Barbados' => '(GMT-4:00) America/Barbados (Atlantic Standard Time)',
        'America/Blanc-Sablon' => '(GMT-4:00) America/Blanc-Sablon (Atlantic Standard Time)',
        'America/Boa_Vista' => '(GMT-4:00) America/Boa_Vista (Amazon Time)',
        'America/Campo_Grande' => '(GMT-4:00) America/Campo_Grande (Amazon Time)',
        'America/Cuiaba' => '(GMT-4:00) America/Cuiaba (Amazon Time)',
        'America/Curacao' => '(GMT-4:00) America/Curacao (Atlantic Standard Time)',
        'America/Dominica' => '(GMT-4:00) America/Dominica (Atlantic Standard Time)',
        'America/Eirunepe' => '(GMT-4:00) America/Eirunepe (Amazon Time)',
        'America/Glace_Bay' => '(GMT-4:00) America/Glace_Bay (Atlantic Standard Time)',
        'America/Goose_Bay' => '(GMT-4:00) America/Goose_Bay (Atlantic Standard Time)',
        'America/Grenada' => '(GMT-4:00) America/Grenada (Atlantic Standard Time)',
        'America/Guadeloupe' => '(GMT-4:00) America/Guadeloupe (Atlantic Standard Time)',
        'America/Guyana' => '(GMT-4:00) America/Guyana (Guyana Time)',
        'America/Halifax' => '(GMT-4:00) America/Halifax (Atlantic Standard Time)',
        'America/La_Paz' => '(GMT-4:00) America/La_Paz (Bolivia Time)',
        'America/Manaus' => '(GMT-4:00) America/Manaus (Amazon Time)',
        'America/Marigot' => '(GMT-4:00) America/Marigot (Atlantic Standard Time)',
        'America/Martinique' => '(GMT-4:00) America/Martinique (Atlantic Standard Time)',
        'America/Moncton' => '(GMT-4:00) America/Moncton (Atlantic Standard Time)',
        'America/Montserrat' => '(GMT-4:00) America/Montserrat (Atlantic Standard Time)',
        'America/Port_of_Spain' => '(GMT-4:00) America/Port_of_Spain (Atlantic Standard Time)',
        'America/Porto_Acre' => '(GMT-4:00) America/Porto_Acre (Amazon Time)',
        'America/Porto_Velho' => '(GMT-4:00) America/Porto_Velho (Amazon Time)',
        'America/Puerto_Rico' => '(GMT-4:00) America/Puerto_Rico (Atlantic Standard Time)',
        'America/Rio_Branco' => '(GMT-4:00) America/Rio_Branco (Amazon Time)',
        'America/Santiago' => '(GMT-4:00) America/Santiago (Chile Time)',
        'America/Santo_Domingo' => '(GMT-4:00) America/Santo_Domingo (Atlantic Standard Time)',
        'America/St_Barthelemy' => '(GMT-4:00) America/St_Barthelemy (Atlantic Standard Time)',
        'America/St_Kitts' => '(GMT-4:00) America/St_Kitts (Atlantic Standard Time)',
        'America/St_Lucia' => '(GMT-4:00) America/St_Lucia (Atlantic Standard Time)',
        'America/St_Thomas' => '(GMT-4:00) America/St_Thomas (Atlantic Standard Time)',
        'America/St_Vincent' => '(GMT-4:00) America/St_Vincent (Atlantic Standard Time)',
        'America/Thule' => '(GMT-4:00) America/Thule (Atlantic Standard Time)',
        'America/Tortola' => '(GMT-4:00) America/Tortola (Atlantic Standard Time)',
        'America/Virgin' => '(GMT-4:00) America/Virgin (Atlantic Standard Time)',
        'Antarctica/Palmer' => '(GMT-4:00) Antarctica/Palmer (Chile Time)',
        'Atlantic/Bermuda' => '(GMT-4:00) Atlantic/Bermuda (Atlantic Standard Time)',
        'Atlantic/Stanley' => '(GMT-4:00) Atlantic/Stanley (Falkland Is. Time)',
        'Brazil/Acre' => '(GMT-4:00) Brazil/Acre (Amazon Time)',
        'Brazil/West' => '(GMT-4:00) Brazil/West (Amazon Time)',
        'Canada/Atlantic' => '(GMT-4:00) Canada/Atlantic (Atlantic Standard Time)',
        'Chile/Continental' => '(GMT-4:00) Chile/Continental (Chile Time)',
        'America/St_Johns' => '(GMT-3:-30) America/St_Johns (Newfoundland Standard Time)',
        'Canada/Newfoundland' => '(GMT-3:-30) Canada/Newfoundland (Newfoundland Standard Time)',
        'America/Araguaina' => '(GMT-3:00) America/Araguaina (Brasilia Time)',
        'America/Bahia' => '(GMT-3:00) America/Bahia (Brasilia Time)',
        'America/Belem' => '(GMT-3:00) America/Belem (Brasilia Time)',
        'America/Buenos_Aires' => '(GMT-3:00) America/Buenos_Aires (Argentine Time)',
        'America/Catamarca' => '(GMT-3:00) America/Catamarca (Argentine Time)',
        'America/Cayenne' => '(GMT-3:00) America/Cayenne (French Guiana Time)',
        'America/Cordoba' => '(GMT-3:00) America/Cordoba (Argentine Time)',
        'America/Fortaleza' => '(GMT-3:00) America/Fortaleza (Brasilia Time)',
        'America/Godthab' => '(GMT-3:00) America/Godthab (Western Greenland Time)',
        'America/Jujuy' => '(GMT-3:00) America/Jujuy (Argentine Time)',
        'America/Maceio' => '(GMT-3:00) America/Maceio (Brasilia Time)',
        'America/Mendoza' => '(GMT-3:00) America/Mendoza (Argentine Time)',
        'America/Miquelon' => '(GMT-3:00) America/Miquelon (Pierre & Miquelon Standard Time)',
        'America/Montevideo' => '(GMT-3:00) America/Montevideo (Uruguay Time)',
        'America/Paramaribo' => '(GMT-3:00) America/Paramaribo (Suriname Time)',
        'America/Recife' => '(GMT-3:00) America/Recife (Brasilia Time)',
        'America/Rosario' => '(GMT-3:00) America/Rosario (Argentine Time)',
        'America/Santarem' => '(GMT-3:00) America/Santarem (Brasilia Time)',
        'America/Sao_Paulo' => '(GMT-3:00) America/Sao_Paulo (Brasilia Time)',
        'Antarctica/Rothera' => '(GMT-3:00) Antarctica/Rothera (Rothera Time)',
        'Brazil/East' => '(GMT-3:00) Brazil/East (Brasilia Time)',
        'America/Noronha' => '(GMT-2:00) America/Noronha (Fernando de Noronha Time)',
        'Atlantic/South_Georgia' => '(GMT-2:00) Atlantic/South_Georgia (South Georgia Standard Time)',
        'Brazil/DeNoronha' => '(GMT-2:00) Brazil/DeNoronha (Fernando de Noronha Time)',
        'America/Scoresbysund' => '(GMT-1:00) America/Scoresbysund (Eastern Greenland Time)',
        'Atlantic/Azores' => '(GMT-1:00) Atlantic/Azores (Azores Time)',
        'Atlantic/Cape_Verde' => '(GMT-1:00) Atlantic/Cape_Verde (Cape Verde Time)',
        'Africa/Abidjan' => '(GMT+0:00) Africa/Abidjan (Greenwich Mean Time)',
        'Africa/Accra' => '(GMT+0:00) Africa/Accra (Ghana Mean Time)',
        'Africa/Bamako' => '(GMT+0:00) Africa/Bamako (Greenwich Mean Time)',
        'Africa/Banjul' => '(GMT+0:00) Africa/Banjul (Greenwich Mean Time)',
        'Africa/Bissau' => '(GMT+0:00) Africa/Bissau (Greenwich Mean Time)',
        'Africa/Casablanca' => '(GMT+0:00) Africa/Casablanca (Western European Time)',
        'Africa/Conakry' => '(GMT+0:00) Africa/Conakry (Greenwich Mean Time)',
        'Africa/Dakar' => '(GMT+0:00) Africa/Dakar (Greenwich Mean Time)',
        'Africa/El_Aaiun' => '(GMT+0:00) Africa/El_Aaiun (Western European Time)',
        'Africa/Freetown' => '(GMT+0:00) Africa/Freetown (Greenwich Mean Time)',
        'Africa/Lome' => '(GMT+0:00) Africa/Lome (Greenwich Mean Time)',
        'Africa/Monrovia' => '(GMT+0:00) Africa/Monrovia (Greenwich Mean Time)',
        'Africa/Nouakchott' => '(GMT+0:00) Africa/Nouakchott (Greenwich Mean Time)',
        'Africa/Ouagadougou' => '(GMT+0:00) Africa/Ouagadougou (Greenwich Mean Time)',
        'Africa/Sao_Tome' => '(GMT+0:00) Africa/Sao_Tome (Greenwich Mean Time)',
        'Africa/Timbuktu' => '(GMT+0:00) Africa/Timbuktu (Greenwich Mean Time)',
        'America/Danmarkshavn' => '(GMT+0:00) America/Danmarkshavn (Greenwich Mean Time)',
        'Atlantic/Canary' => '(GMT+0:00) Atlantic/Canary (Western European Time)',
        'Atlantic/Faeroe' => '(GMT+0:00) Atlantic/Faeroe (Western European Time)',
        'Atlantic/Faroe' => '(GMT+0:00) Atlantic/Faroe (Western European Time)',
        'Atlantic/Madeira' => '(GMT+0:00) Atlantic/Madeira (Western European Time)',
        'Atlantic/Reykjavik' => '(GMT+0:00) Atlantic/Reykjavik (Greenwich Mean Time)',
        'Atlantic/St_Helena' => '(GMT+0:00) Atlantic/St_Helena (Greenwich Mean Time)',
        'Europe/Belfast' => '(GMT+0:00) Europe/Belfast (Greenwich Mean Time)',
        'Europe/Dublin' => '(GMT+0:00) Europe/Dublin (Greenwich Mean Time)',
        'Europe/Guernsey' => '(GMT+0:00) Europe/Guernsey (Greenwich Mean Time)',
        'Europe/Isle_of_Man' => '(GMT+0:00) Europe/Isle_of_Man (Greenwich Mean Time)',
        'Europe/Jersey' => '(GMT+0:00) Europe/Jersey (Greenwich Mean Time)',
        'Europe/Lisbon' => '(GMT+0:00) Europe/Lisbon (Western European Time)',
        'Europe/London' => '(GMT+0:00) Europe/London (Greenwich Mean Time)',
        'Africa/Algiers' => '(GMT+1:00) Africa/Algiers (Central European Time)',
        'Africa/Bangui' => '(GMT+1:00) Africa/Bangui (Western African Time)',
        'Africa/Brazzaville' => '(GMT+1:00) Africa/Brazzaville (Western African Time)',
        'Africa/Ceuta' => '(GMT+1:00) Africa/Ceuta (Central European Time)',
        'Africa/Douala' => '(GMT+1:00) Africa/Douala (Western African Time)',
        'Africa/Kinshasa' => '(GMT+1:00) Africa/Kinshasa (Western African Time)',
        'Africa/Lagos' => '(GMT+1:00) Africa/Lagos (Western African Time)',
        'Africa/Libreville' => '(GMT+1:00) Africa/Libreville (Western African Time)',
        'Africa/Luanda' => '(GMT+1:00) Africa/Luanda (Western African Time)',
        'Africa/Malabo' => '(GMT+1:00) Africa/Malabo (Western African Time)',
        'Africa/Ndjamena' => '(GMT+1:00) Africa/Ndjamena (Western African Time)',
        'Africa/Niamey' => '(GMT+1:00) Africa/Niamey (Western African Time)',
        'Africa/Porto-Novo' => '(GMT+1:00) Africa/Porto-Novo (Western African Time)',
        'Africa/Tunis' => '(GMT+1:00) Africa/Tunis (Central European Time)',
        'Africa/Windhoek' => '(GMT+1:00) Africa/Windhoek (Western African Time)',
        'Arctic/Longyearbyen' => '(GMT+1:00) Arctic/Longyearbyen (Central European Time)',
        'Atlantic/Jan_Mayen' => '(GMT+1:00) Atlantic/Jan_Mayen (Central European Time)',
        'Europe/Amsterdam' => '(GMT+1:00) Europe/Amsterdam (Central European Time)',
        'Europe/Andorra' => '(GMT+1:00) Europe/Andorra (Central European Time)',
        'Europe/Belgrade' => '(GMT+1:00) Europe/Belgrade (Central European Time)',
        'Europe/Berlin' => '(GMT+1:00) Europe/Berlin (Central European Time)',
        'Europe/Bratislava' => '(GMT+1:00) Europe/Bratislava (Central European Time)',
        'Europe/Brussels' => '(GMT+1:00) Europe/Brussels (Central European Time)',
        'Europe/Budapest' => '(GMT+1:00) Europe/Budapest (Central European Time)',
        'Europe/Copenhagen' => '(GMT+1:00) Europe/Copenhagen (Central European Time)',
        'Europe/Gibraltar' => '(GMT+1:00) Europe/Gibraltar (Central European Time)',
        'Europe/Ljubljana' => '(GMT+1:00) Europe/Ljubljana (Central European Time)',
        'Europe/Luxembourg' => '(GMT+1:00) Europe/Luxembourg (Central European Time)',
        'Europe/Madrid' => '(GMT+1:00) Europe/Madrid (Central European Time)',
        'Europe/Malta' => '(GMT+1:00) Europe/Malta (Central European Time)',
        'Europe/Monaco' => '(GMT+1:00) Europe/Monaco (Central European Time)',
        'Europe/Oslo' => '(GMT+1:00) Europe/Oslo (Central European Time)',
        'Europe/Paris' => '(GMT+1:00) Europe/Paris (Central European Time)',
        'Europe/Podgorica' => '(GMT+1:00) Europe/Podgorica (Central European Time)',
        'Europe/Prague' => '(GMT+1:00) Europe/Prague (Central European Time)',
        'Europe/Rome' => '(GMT+1:00) Europe/Rome (Central European Time)',
        'Europe/San_Marino' => '(GMT+1:00) Europe/San_Marino (Central European Time)',
        'Europe/Sarajevo' => '(GMT+1:00) Europe/Sarajevo (Central European Time)',
        'Europe/Skopje' => '(GMT+1:00) Europe/Skopje (Central European Time)',
        'Europe/Stockholm' => '(GMT+1:00) Europe/Stockholm (Central European Time)',
        'Europe/Tirane' => '(GMT+1:00) Europe/Tirane (Central European Time)',
        'Europe/Vaduz' => '(GMT+1:00) Europe/Vaduz (Central European Time)',
        'Europe/Vatican' => '(GMT+1:00) Europe/Vatican (Central European Time)',
        'Europe/Vienna' => '(GMT+1:00) Europe/Vienna (Central European Time)',
        'Europe/Warsaw' => '(GMT+1:00) Europe/Warsaw (Central European Time)',
        'Europe/Zagreb' => '(GMT+1:00) Europe/Zagreb (Central European Time)',
        'Europe/Zurich' => '(GMT+1:00) Europe/Zurich (Central European Time)',
        'Africa/Blantyre' => '(GMT+2:00) Africa/Blantyre (Central African Time)',
        'Africa/Bujumbura' => '(GMT+2:00) Africa/Bujumbura (Central African Time)',
        'Africa/Cairo' => '(GMT+2:00) Africa/Cairo (Eastern European Time)',
        'Africa/Gaborone' => '(GMT+2:00) Africa/Gaborone (Central African Time)',
        'Africa/Harare' => '(GMT+2:00) Africa/Harare (Central African Time)',
        'Africa/Johannesburg' => '(GMT+2:00) Africa/Johannesburg (South Africa Standard Time)',
        'Africa/Kigali' => '(GMT+2:00) Africa/Kigali (Central African Time)',
        'Africa/Lubumbashi' => '(GMT+2:00) Africa/Lubumbashi (Central African Time)',
        'Africa/Lusaka' => '(GMT+2:00) Africa/Lusaka (Central African Time)',
        'Africa/Maputo' => '(GMT+2:00) Africa/Maputo (Central African Time)',
        'Africa/Maseru' => '(GMT+2:00) Africa/Maseru (South Africa Standard Time)',
        'Africa/Mbabane' => '(GMT+2:00) Africa/Mbabane (South Africa Standard Time)',
        'Africa/Tripoli' => '(GMT+2:00) Africa/Tripoli (Eastern European Time)',
        'Asia/Amman' => '(GMT+2:00) Asia/Amman (Eastern European Time)',
        'Asia/Beirut' => '(GMT+2:00) Asia/Beirut (Eastern European Time)',
        'Asia/Damascus' => '(GMT+2:00) Asia/Damascus (Eastern European Time)',
        'Asia/Gaza' => '(GMT+2:00) Asia/Gaza (Eastern European Time)',
        'Asia/Istanbul' => '(GMT+2:00) Asia/Istanbul (Eastern European Time)',
        'Asia/Jerusalem' => '(GMT+2:00) Asia/Jerusalem (Israel Standard Time)',
        'Asia/Nicosia' => '(GMT+2:00) Asia/Nicosia (Eastern European Time)',
        'Asia/Tel_Aviv' => '(GMT+2:00) Asia/Tel_Aviv (Israel Standard Time)',
        'Europe/Athens' => '(GMT+2:00) Europe/Athens (Eastern European Time)',
        'Europe/Bucharest' => '(GMT+2:00) Europe/Bucharest (Eastern European Time)',
        'Europe/Chisinau' => '(GMT+2:00) Europe/Chisinau (Eastern European Time)',
        'Europe/Helsinki' => '(GMT+2:00) Europe/Helsinki (Eastern European Time)',
        'Europe/Istanbul' => '(GMT+2:00) Europe/Istanbul (Eastern European Time)',
        'Europe/Kaliningrad' => '(GMT+2:00) Europe/Kaliningrad (Eastern European Time)',
        'Europe/Kiev' => '(GMT+2:00) Europe/Kiev (Eastern European Time)',
        'Europe/Mariehamn' => '(GMT+2:00) Europe/Mariehamn (Eastern European Time)',
        'Europe/Minsk' => '(GMT+2:00) Europe/Minsk (Eastern European Time)',
        'Europe/Nicosia' => '(GMT+2:00) Europe/Nicosia (Eastern European Time)',
        'Europe/Riga' => '(GMT+2:00) Europe/Riga (Eastern European Time)',
        'Europe/Simferopol' => '(GMT+2:00) Europe/Simferopol (Eastern European Time)',
        'Europe/Sofia' => '(GMT+2:00) Europe/Sofia (Eastern European Time)',
        'Europe/Tallinn' => '(GMT+2:00) Europe/Tallinn (Eastern European Time)',
        'Europe/Tiraspol' => '(GMT+2:00) Europe/Tiraspol (Eastern European Time)',
        'Europe/Uzhgorod' => '(GMT+2:00) Europe/Uzhgorod (Eastern European Time)',
        'Europe/Vilnius' => '(GMT+2:00) Europe/Vilnius (Eastern European Time)',
        'Europe/Zaporozhye' => '(GMT+2:00) Europe/Zaporozhye (Eastern European Time)',
        'Africa/Addis_Ababa' => '(GMT+3:00) Africa/Addis_Ababa (Eastern African Time)',
        'Africa/Asmara' => '(GMT+3:00) Africa/Asmara (Eastern African Time)',
        'Africa/Asmera' => '(GMT+3:00) Africa/Asmera (Eastern African Time)',
        'Africa/Dar_es_Salaam' => '(GMT+3:00) Africa/Dar_es_Salaam (Eastern African Time)',
        'Africa/Djibouti' => '(GMT+3:00) Africa/Djibouti (Eastern African Time)',
        'Africa/Kampala' => '(GMT+3:00) Africa/Kampala (Eastern African Time)',
        'Africa/Khartoum' => '(GMT+3:00) Africa/Khartoum (Eastern African Time)',
        'Africa/Mogadishu' => '(GMT+3:00) Africa/Mogadishu (Eastern African Time)',
        'Africa/Nairobi' => '(GMT+3:00) Africa/Nairobi (Eastern African Time)',
        'Antarctica/Syowa' => '(GMT+3:00) Antarctica/Syowa (Syowa Time)',
        'Asia/Aden' => '(GMT+3:00) Asia/Aden (Arabia Standard Time)',
        'Asia/Baghdad' => '(GMT+3:00) Asia/Baghdad (Arabia Standard Time)',
        'Asia/Bahrain' => '(GMT+3:00) Asia/Bahrain (Arabia Standard Time)',
        'Asia/Kuwait' => '(GMT+3:00) Asia/Kuwait (Arabia Standard Time)',
        'Asia/Qatar' => '(GMT+3:00) Asia/Qatar (Arabia Standard Time)',
        'Europe/Moscow' => '(GMT+3:00) Europe/Moscow (Moscow Standard Time)',
        'Europe/Volgograd' => '(GMT+3:00) Europe/Volgograd (Volgograd Time)',
        'Indian/Antananarivo' => '(GMT+3:00) Indian/Antananarivo (Eastern African Time)',
        'Indian/Comoro' => '(GMT+3:00) Indian/Comoro (Eastern African Time)',
        'Indian/Mayotte' => '(GMT+3:00) Indian/Mayotte (Eastern African Time)',
        'Asia/Tehran' => '(GMT+3:30) Asia/Tehran (Iran Standard Time)',
        'Asia/Baku' => '(GMT+4:00) Asia/Baku (Azerbaijan Time)',
        'Asia/Dubai' => '(GMT+4:00) Asia/Dubai (Gulf Standard Time)',
        'Asia/Muscat' => '(GMT+4:00) Asia/Muscat (Gulf Standard Time)',
        'Asia/Tbilisi' => '(GMT+4:00) Asia/Tbilisi (Georgia Time)',
        'Asia/Yerevan' => '(GMT+4:00) Asia/Yerevan (Armenia Time)',
        'Europe/Samara' => '(GMT+4:00) Europe/Samara (Samara Time)',
        'Indian/Mahe' => '(GMT+4:00) Indian/Mahe (Seychelles Time)',
        'Indian/Mauritius' => '(GMT+4:00) Indian/Mauritius (Mauritius Time)',
        'Indian/Reunion' => '(GMT+4:00) Indian/Reunion (Reunion Time)',
        'Asia/Kabul' => '(GMT+4:30) Asia/Kabul (Afghanistan Time)',
        'Asia/Aqtau' => '(GMT+5:00) Asia/Aqtau (Aqtau Time)',
        'Asia/Aqtobe' => '(GMT+5:00) Asia/Aqtobe (Aqtobe Time)',
        'Asia/Ashgabat' => '(GMT+5:00) Asia/Ashgabat (Turkmenistan Time)',
        'Asia/Ashkhabad' => '(GMT+5:00) Asia/Ashkhabad (Turkmenistan Time)',
        'Asia/Dushanbe' => '(GMT+5:00) Asia/Dushanbe (Tajikistan Time)',
        'Asia/Karachi' => '(GMT+5:00) Asia/Karachi (Pakistan Time)',
        'Asia/Oral' => '(GMT+5:00) Asia/Oral (Oral Time)',
        'Asia/Samarkand' => '(GMT+5:00) Asia/Samarkand (Uzbekistan Time)',
        'Asia/Tashkent' => '(GMT+5:00) Asia/Tashkent (Uzbekistan Time)',
        'Asia/Yekaterinburg' => '(GMT+5:00) Asia/Yekaterinburg (Yekaterinburg Time)',
        'Indian/Kerguelen' => '(GMT+5:00) Indian/Kerguelen (French Southern & Antarctic Lands Time)',
        'Indian/Maldives' => '(GMT+5:00) Indian/Maldives (Maldives Time)',
        'Asia/Calcutta' => '(GMT+5:30) Asia/Calcutta (India Standard Time)',
        'Asia/Colombo' => '(GMT+5:30) Asia/Colombo (India Standard Time)',
        'Asia/Kolkata' => '(GMT+5:30) Asia/Kolkata (India Standard Time)',
        'Asia/Katmandu' => '(GMT+5:45) Asia/Katmandu (Nepal Time)',
        'Antarctica/Mawson' => '(GMT+6:00) Antarctica/Mawson (Mawson Time)',
        'Antarctica/Vostok' => '(GMT+6:00) Antarctica/Vostok (Vostok Time)',
        'Asia/Almaty' => '(GMT+6:00) Asia/Almaty (Alma-Ata Time)',
        'Asia/Bishkek' => '(GMT+6:00) Asia/Bishkek (Kirgizstan Time)',
        'Asia/Dacca' => '(GMT+6:00) Asia/Dacca (Bangladesh Time)',
        'Asia/Dhaka' => '(GMT+6:00) Asia/Dhaka (Bangladesh Time)',
        'Asia/Novosibirsk' => '(GMT+6:00) Asia/Novosibirsk (Novosibirsk Time)',
        'Asia/Omsk' => '(GMT+6:00) Asia/Omsk (Omsk Time)',
        'Asia/Qyzylorda' => '(GMT+6:00) Asia/Qyzylorda (Qyzylorda Time)',
        'Asia/Thimbu' => '(GMT+6:00) Asia/Thimbu (Bhutan Time)',
        'Asia/Thimphu' => '(GMT+6:00) Asia/Thimphu (Bhutan Time)',
        'Indian/Chagos' => '(GMT+6:00) Indian/Chagos (Indian Ocean Territory Time)',
        'Asia/Rangoon' => '(GMT+6:30) Asia/Rangoon (Myanmar Time)',
        'Indian/Cocos' => '(GMT+6:30) Indian/Cocos (Cocos Islands Time)',
        'Antarctica/Davis' => '(GMT+7:00) Antarctica/Davis (Davis Time)',
        'Asia/Bangkok' => '(GMT+7:00) Asia/Bangkok (Indochina Time)',
        'Asia/Ho_Chi_Minh' => '(GMT+7:00) Asia/Ho_Chi_Minh (Indochina Time)',
        'Asia/Hovd' => '(GMT+7:00) Asia/Hovd (Hovd Time)',
        'Asia/Jakarta' => '(GMT+7:00) Asia/Jakarta (West Indonesia Time)',
        'Asia/Krasnoyarsk' => '(GMT+7:00) Asia/Krasnoyarsk (Krasnoyarsk Time)',
        'Asia/Phnom_Penh' => '(GMT+7:00) Asia/Phnom_Penh (Indochina Time)',
        'Asia/Pontianak' => '(GMT+7:00) Asia/Pontianak (West Indonesia Time)',
        'Asia/Saigon' => '(GMT+7:00) Asia/Saigon (Indochina Time)',
        'Asia/Vientiane' => '(GMT+7:00) Asia/Vientiane (Indochina Time)',
        'Indian/Christmas' => '(GMT+7:00) Indian/Christmas (Christmas Island Time)',
        'Antarctica/Casey' => '(GMT+8:00) Antarctica/Casey (Western Standard Time (Australia))',
        'Asia/Brunei' => '(GMT+8:00) Asia/Brunei (Brunei Time)',
        'Asia/Choibalsan' => '(GMT+8:00) Asia/Choibalsan (Choibalsan Time)',
        'Asia/Chongqing' => '(GMT+8:00) Asia/Chongqing (China Standard Time)',
        'Asia/Chungking' => '(GMT+8:00) Asia/Chungking (China Standard Time)',
        'Asia/Harbin' => '(GMT+8:00) Asia/Harbin (China Standard Time)',
        'Asia/Hong_Kong' => '(GMT+8:00) Asia/Hong_Kong (Hong Kong Time)',
        'Asia/Irkutsk' => '(GMT+8:00) Asia/Irkutsk (Irkutsk Time)',
        'Asia/Kashgar' => '(GMT+8:00) Asia/Kashgar (China Standard Time)',
        'Asia/Kuala_Lumpur' => '(GMT+8:00) Asia/Kuala_Lumpur (Malaysia Time)',
        'Asia/Kuching' => '(GMT+8:00) Asia/Kuching (Malaysia Time)',
        'Asia/Macao' => '(GMT+8:00) Asia/Macao (China Standard Time)',
        'Asia/Macau' => '(GMT+8:00) Asia/Macau (China Standard Time)',
        'Asia/Makassar' => '(GMT+8:00) Asia/Makassar (Central Indonesia Time)',
        'Asia/Manila' => '(GMT+8:00) Asia/Manila (Philippines Time)',
        'Asia/Shanghai' => '(GMT+8:00) Asia/Shanghai (China Standard Time)',
        'Asia/Singapore' => '(GMT+8:00) Asia/Singapore (Singapore Time)',
        'Asia/Taipei' => '(GMT+8:00) Asia/Taipei (China Standard Time)',
        'Asia/Ujung_Pandang' => '(GMT+8:00) Asia/Ujung_Pandang (Central Indonesia Time)',
        'Asia/Ulaanbaatar' => '(GMT+8:00) Asia/Ulaanbaatar (Ulaanbaatar Time)',
        'Asia/Ulan_Bator' => '(GMT+8:00) Asia/Ulan_Bator (Ulaanbaatar Time)',
        'Asia/Urumqi' => '(GMT+8:00) Asia/Urumqi (China Standard Time)',
        'Australia/Perth' => '(GMT+8:00) Australia/Perth (Western Standard Time (Australia))',
        'Australia/West' => '(GMT+8:00) Australia/West (Western Standard Time (Australia))',
        'Australia/Eucla' => '(GMT+8:45) Australia/Eucla (Central Western Standard Time (Australia))',
        'Asia/Dili' => '(GMT+9:00) Asia/Dili (Timor-Leste Time)',
        'Asia/Jayapura' => '(GMT+9:00) Asia/Jayapura (East Indonesia Time)',
        'Asia/Pyongyang' => '(GMT+9:00) Asia/Pyongyang (Korea Standard Time)',
        'Asia/Seoul' => '(GMT+9:00) Asia/Seoul (Korea Standard Time)',
        'Asia/Tokyo' => '(GMT+9:00) Asia/Tokyo (Japan Standard Time)',
        'Asia/Yakutsk' => '(GMT+9:00) Asia/Yakutsk (Yakutsk Time)',
        'Australia/Adelaide' => '(GMT+9:30) Australia/Adelaide (Central Standard Time (South Australia))',
        'Australia/Broken_Hill' => '(GMT+9:30) Australia/Broken_Hill (Central Standard Time (South Australia/New South Wales))',
        'Australia/Darwin' => '(GMT+9:30) Australia/Darwin (Central Standard Time (Northern Territory))',
        'Australia/North' => '(GMT+9:30) Australia/North (Central Standard Time (Northern Territory))',
        'Australia/South' => '(GMT+9:30) Australia/South (Central Standard Time (South Australia))',
        'Australia/Yancowinna' => '(GMT+9:30) Australia/Yancowinna (Central Standard Time (South Australia/New South Wales))',
        'Antarctica/DumontDUrville' => '(GMT+10:00) Antarctica/DumontDUrville (Dumont-d\'Urville Time)',
        'Asia/Sakhalin' => '(GMT+10:00) Asia/Sakhalin (Sakhalin Time)',
        'Asia/Vladivostok' => '(GMT+10:00) Asia/Vladivostok (Vladivostok Time)',
        'Australia/ACT' => '(GMT+10:00) Australia/ACT (Eastern Standard Time (New South Wales))',
        'Australia/Brisbane' => '(GMT+10:00) Australia/Brisbane (Eastern Standard Time (Queensland))',
        'Australia/Canberra' => '(GMT+10:00) Australia/Canberra (Eastern Standard Time (New South Wales))',
        'Australia/Currie' => '(GMT+10:00) Australia/Currie (Eastern Standard Time (New South Wales))',
        'Australia/Hobart' => '(GMT+10:00) Australia/Hobart (Eastern Standard Time (Tasmania))',
        'Australia/Lindeman' => '(GMT+10:00) Australia/Lindeman (Eastern Standard Time (Queensland))',
        'Australia/Melbourne' => '(GMT+10:00) Australia/Melbourne (Eastern Standard Time (Victoria))',
        'Australia/NSW' => '(GMT+10:00) Australia/NSW (Eastern Standard Time (New South Wales))',
        'Australia/Queensland' => '(GMT+10:00) Australia/Queensland (Eastern Standard Time (Queensland))',
        'Australia/Sydney' => '(GMT+10:00) Australia/Sydney (Eastern Standard Time (New South Wales))',
        'Australia/Tasmania' => '(GMT+10:00) Australia/Tasmania (Eastern Standard Time (Tasmania))',
        'Australia/Victoria' => '(GMT+10:00) Australia/Victoria (Eastern Standard Time (Victoria))',
        'Australia/LHI' => '(GMT+10:30) Australia/LHI (Lord Howe Standard Time)',
        'Australia/Lord_Howe' => '(GMT+10:30) Australia/Lord_Howe (Lord Howe Standard Time)',
        'Asia/Magadan' => '(GMT+11:00) Asia/Magadan (Magadan Time)',
        'Antarctica/McMurdo' => '(GMT+12:00) Antarctica/McMurdo (New Zealand Standard Time)',
        'Antarctica/South_Pole' => '(GMT+12:00) Antarctica/South_Pole (New Zealand Standard Time)',
        'Asia/Anadyr' => '(GMT+12:00) Asia/Anadyr (Anadyr Time)',
        'Asia/Kamchatka' => '(GMT+12:00) Asia/Kamchatka (Petropavlovsk-Kamchatski Time)'
    );

    if ($key) {
        return $timezones[$key];
    }
    return $timezones;
}
