<?php
/**
 * This helper is loading function's currently for the application.
 * It would be better, If we can separate this files to class with related features, after completing a project.
 */

/**
 *  get route path of an url.
 *
 * @param string $url
 * @return relative url
 */

//use mysql_xdevapi\Session;

if (!function_exists('route')) {
    function route($url=null) {
        return URL.$url;
    }
}

/**
 *  redirect application to an url
 *
 * @param string $url
 * @return to a relative url path
 */
if (!function_exists('redirect')) {
    function redirect($url=null,$with=[]) {
        if ($with){
            with($with['with']);
        }

        return header('Location:'.URL.$url);
    }
}

/**
 *  redirect application to an url
 *
 * @param string $url
 * @return to a relative url path
 */
if (!function_exists('with')) {
    function with($with=null)
    {
        $errors = $with['errors'] ?? null;
        $inputs = $with['inputs'] ?? null;
        //myLog("errors:".json_encode($errors));
        //myLog("inputs:".json_encode($inputs));

        session('errors', $errors);
        session('inputs', $inputs);
    }
}

/**
 * load a page to application and push the data to that page
 *
 * @param string $page path with a page
 * $param array $data
 * @return page
 */
if (!function_exists('view')) {
    function view($content = null, $data = [], $master = true)
    {
        // if master false then open page without master.php(header,footer)
        $view = ($master == true) ? 'master.php' : $content.'.php';

        //for displaying errors, dump $errors variable
        $errors = $errors ?? session('errors');
        //for displaying old inputs, dump $olds variable
        $inputs = $inputs ?? session('inputs');

        // after displaying view page, remove errors and inputs variable
        session('errors',[]);
        session('inputs',[]);
        //dd(session('errors'));

        //extract data sent from controller
        extract($data);
        require(View . $view);
    }
}

/**
 * shows not found error page
 *
 * @return page with page die
 */
if (!function_exists('not_found')) {
    function not_found($msg) {
        require(View . 'errors/404.php');
        exit;
    }
}

/**
 * shows error page
 *
 * @return page with page die
 */
if (!function_exists('show_error')) {
    function show_error($error) {
        require(View . 'errors/error.php');
        exit;
    }
}

/**
 * get dump data with page block
 *
 * @param array $data
 * @return data with page die
 */
if (!function_exists('url_encode')) {
    function url_encode($input)
    {
        return strtr(base64_encode($input), '+/=', '-_,');
    }
}

/**
 * get dump data with page block
 *
 * @param array $data
 * @return data with page die
 */
if (!function_exists('url_decode')) {
    function url_decode($input)
    {
        return base64_decode(strtr($input, '-_,', '+/='));
    }
}

/**
 * get dump data with page block
 *
 * @param array $data
 * @return data with page die
 */
if (!function_exists('str_slug')) {
    function str_slug($input)
    {
        return preg_replace('/[^A-Za-z0-9]+/','-',$input);
    }
}

/**
 * get dump data with page block
 *
 * @param array $data
 * @return data with page die
 */

if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
    }
}

/**
 * dump the data of an array for tracing array data
 *
 * @param array $data
 * @return dump data
 *
 */
if (!function_exists('dump')) {
    function dump($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

/**
 * get populate input values
 *
 * @param string $var
 * @return requested field values
 */
if (!function_exists('old')) {
    function old($inputs=[],$var=null)
    {
        //myLog("session('inputs')):".json_encode(session('inputs')[$var]));
        if(is_string($var) && array_key_exists($var,$inputs)) {
            return $inputs[$var];
        }
        return false;
    }
}


/**
 * get populate input values
 *
 * @param string $var
 * @return requested field values
 */
if (!function_exists('validation')) {
    function validation($input = null)
    {
        if (!is_string($input))
            return $input;

        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}

/**
 * set session for a key with value
 *
 * @param mix[string,array] $key
 * @param mix $val
 * @param time $expire in minute, default 5 minutes
 * @param boolean $security, true for https
 * @return cookie
 *
 */
if (!function_exists('cookie')) {
    function cookie($key=null, $val=null, $expire = 5, $security = false)
    {
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        $path = '/';

        if(is_array($key)) {
            foreach ($key as $item=>$val) {
                setcookie($item, $val, time() + 60 * $expire, $path, $domain, $security);
            }
        }
        elseif(isset($key) && isset($val)) {
            return setcookie($key, $val, time() + 60 * $expire, $path, $domain, $security);
        }
        elseif(isset($key)) {
            return $_COOKIE[$key] ?? '';
        }
        return;
    }
}

/**
 * set session for a key with value
 *
 * @param mix[string,array] $key
 * @param mix $val
 * @return session
 *
 */
if (!function_exists('session')) {
    function session($key=null,$val=null)
    {
        if(is_array($key)){
             foreach ($key as $item=>$val){
                 $_SESSION[$item] = $val;
             }
        }
        else if(isset($key) && isset($val)){
            return $_SESSION[$key] = $val;
        }
        elseif(isset($key)){
            return $_SESSION[$key] ?? '';
        }
        return;
    }
}
/**
 * set session for a value
 *
 * @param string $key
 * @param mix $val
 * @return session
 */
if (!function_exists('session_put')) {
    function session_put($key=null,$val=null)
    {
        if(isset($key) && isset($val)){
            return session($key,$val);
        }
        return;
    }
}

/**
 * get session value for a key
 *
 * @param string $key
 * @param mix $val
 * @return value
 *
 */
if (!function_exists('session_get')) {
    function session_get($key=null,$val=null)
    {
        if(isset($key) && isset($val)){
            return session($key);
        }
        return;
    }
}

/**
 * remove session data for a key
 *
 * @param string $key
 * @return Session null
 *
 */
if (!function_exists('session_forget')) {
    function session_forget($key=false)
    {
        if(isset($key)){
            return session($key,false);
        }
        return;
    }
}

/**
 * get all session of this application
 *
 */
if (!function_exists('session_all')) {
    function session_all()
    {
        return $_SESSION;
    }
}

/**
 * remove all session created for this application
 *
 */
if (!function_exists('session_empty')) {
    function session_empty()
    {
        // destroy session, it will remove ALL session settings
        session_destroy();
        return $_SESSION = [];
    }
}

/**
 * get authentication status of this application
 *
 */
if (!function_exists('auth')) {
    function auth()
    {
        /** @var Boolean $_SESSION */
        return session('is_logged_in');
    }
}

/**
 * get authentication user id of this application
 *
 */
if (!function_exists('user_id')) {
    function user_id()
    {
        /** @var Boolean $_SESSION */
        return session('user_id');
    }
}

/**
 * get asset url of a resource to asset url
 *
 * @param string $src
 * @return complete url of that resource to asset
 *
 */
if (!function_exists('asset')) {
    function asset($src='')
    {
        return AssetURL.$src;
    }
}

/**
 * get upload path of a resource to uploads folder
 *
 * @param string $src
 * @return complete url of that resource to uploads
 */
if (!function_exists('upload_path')) {
    function upload_path($src='')
    {
        return UploadPath.$src;
    }
}

/**
 * get a csrf field for this application
 *
 */
if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        $token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 40);
        $session = session('token',$token);
        return '<input type="hidden" id="token" name="token" value='.$token.'>';
    }
}

/**
 * get config folder files data
 *
 * @param filename $src
 * @return mix[array,bool]
 */
if (!function_exists('config')) {
    function config($src='')
    {
        $find_src = explode('.',$src);
        $data = require (App .'config/'.$find_src[0].'.php');
        return $data[$find_src[1]];
    }
}

/**
 * get form select input with options
 *
 * @param string $name
 * @param array $data
 * @param string $selected
 * @param string $attributes
 * @return form select dropdown
 */
if (!function_exists('form_select')) {
    function form_select($name='',$data=[],$select=null,$attributes='')
    {
        $option = '<select name='.$name.'  '.$attributes.'>';
        //$option .= '<option value="">-- Select --</option>';
        foreach ($data as $key => $value) {
            $selected = $key == $select ? ' selected ' : '';
            $option .= '<option '.$selected.' value='.$key.'>'.$value.'</option>';
        }
        $option .='</select>';
        return $option;
    }
}

/**
 * get form input with value
 *
 * @param string $name
 * @param string $type
 * @param mix $value
 * @param string $attributes
 * @return form input field
 */
if (!function_exists('form_input')) {
    function form_input($name='',$type='text',$value='',$attributes='')
    {
        return '<input type="'.$type.'" name="'.$name.'"'.' '.$attributes.' value="'.$value.'">';
    }
}
if (!function_exists('form_textarea')) {
    function form_textarea($name='',$value='',$attributes='')
    {
        return '<textarea name="'.$name.'" '.$attributes.'>'.$value.'</textarea>';
    }
}

/**
 * Generate notifications according to your notification data
 */
if (!function_exists('notification')) {
    function notification($notification = [])
    {
        $notification = [
            'notification_type' => $notification['type'],
            'notification_message' => $notification['message']
        ];
        session($notification);
    }
}

/**
 * Convert data to a format
 */
if (!function_exists('date_conversion')) {
    function date_conversion($format='d-m-Y',$date = null)
    {
        if (isset($date) && $date>0) {
            $formatted_date = date($format, strtotime($date));
            // when date is 0 then sent null;
            return preg_match('/12.[0-9]{1,2}[\s](am)/i',$formatted_date,$match) ? null: $formatted_date;
            ///(12:00)\s+(AM)$/i
        }
        return;
    }
}

/**
 * Convert number to a decimal precession
 */
if (!function_exists('number_round')) {
    function number_round($val,$dec=0)
    {
        if ($val) {
            return round($val,$dec);
        }
        return;
    }
}

/**
 * Log error to system
 *
 */
if(!function_exists('myLog')){
    function myLog($message='') {
        if (is_array($message)){
            foreach ($message as $key=>$item) {
                add_log($item);
            }
        }
        else
            add_log($message);
        return;
    }
}

/**
 *  Password hash
 *
 */
if(!function_exists('bcrypt')){
    function bcrypt($password='') {
        $options = [
            'cost' => 10
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

/**
 *  Password verify
 *
 */
if(!function_exists('verify_hash')) {
    function verify_hash($password='',$password_hash='') {
        //myLog("$password,$password_hash,".bcrypt($password));
        return password_verify($password, $password_hash);
    }
}

if(!function_exists('add_log')) {
    function add_log($item)
    {
        return error_log($item);
    }
}

/**
 * Translate
 */

if(!function_exists('translate_number')) {
    function translate_number($number = null, $to='en')
    {
        $bn_digits = array('০','১','২','৩','৪','৫','৬','৭','৮','৯','জানুয়ারী','ফেব্রুয়ারী',
            'মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর',
            'ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার' );
        $en_digits = array('0','1','2','3','4','5','6','7','8','9','January','February',
            'March','April','May','June','July','August','September','October','November',
            'December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
        if ($to == 'en')
            $translated_number = str_replace($bn_digits, $en_digits, $number);
        else
            $translated_number = str_replace($en_digits,$bn_digits, $number);
        return $translated_number;
    }
}

if(!function_exists('calculate_ot_time')) {
    function calculate_ot_time(string $out_time, string $shift_out_time)
    {
        if ((strtotime($shift_out_time) >= strtotime($out_time)))
            return 0;

        $date1 = date_create($out_time);
        $date2 = date_create($shift_out_time);
        $diff = date_diff($date1,$date2);
        $ot_time = $diff->format("%H:%I");
        $ot_time = $ot_time>0 ? $ot_time : 0;
        return $ot_time;
    }
}

if (!function_exists('calculate_total_ot')) {
    function calculate_total_ot($day_status =null, $ot_time, $RoundAfter, $RoundFor) {
        if (!in_array($day_status,['A','LV','H','W']) && $ot_time != 0) {
            // generate round for ot time
            $total_ot_hour = make_round_ot($ot_time, $RoundAfter, $RoundFor);
            if ($total_ot_hour >= 2)
                return $total_ot_hour;
            return 0;
        }
    }
}

if (!function_exists('calculate_slab')) {
    function calculate_slab($total_ot_hour) {
        $slab = [];
        $slab1 = 0;
        $slab2 = 0;
        if($total_ot_hour > 2) {
            $slab1 = 2;
            $rest_ot = $total_ot_hour-2;
            if($rest_ot > 2) {
                $slab2 = 2;
            }
            else {
                $slab2 = $rest_ot;
            }
        }
        else {
            $slab1 = $total_ot_hour;
        }
        $slab[] = $slab1;
        $slab[] = $slab2;

        return $slab;
    }
}


if(!function_exists('check_ot_status')) {
    function check_ot_status($OT)
    {
        return ($OT == 1) ? true : false;
    }
}

if(!function_exists('check_ot_ability')) {
    function check_ot_ability($OTEntitledDate, $WorkDate)
    {
        return ($OTEntitledDate <= $WorkDate) ? true : false;
    }
}

if(!function_exists('make_round_ot')) {
    function make_round_ot($ot_time, $RoundAfter, $RoundFor)
    {
        if ($ot_time <=0 )
            return 0;

        $ot_hour = date_conversion('h', $ot_time);
        $ot_minute = date_conversion('i', $ot_time);
        //echo 'ot_hour: '.$ot_hour.'->'.'ot_minute: '.$ot_minute;
        $round_minute = $ot_minute / 60;
        if ($round_minute >= $RoundAfter) {
            $ot_hour += intval($RoundFor);
        }
        return $ot_hour;
    }
}

if (!function_exists('calculate_late_hour')) {
    function calculate_late_hour(string $in_time, string $shift_in_time, int $late_margin)
    {
        $date1 = date_create($in_time);
        $date2 = date_create($shift_in_time);
        $diff = date_diff($date1,$date2);
        $late_hour = 0;
        if($diff->format("%H") > 0) {
            $date = date_create($diff->format("%H:%I:%S"));
            $date = date_sub($date,date_interval_create_from_date_string($late_margin." minutes"));
            $late_hour = $date->format('H:i:s');
        }
        else if($diff->format("%I") > $late_margin) {
            $date = date_create($diff->format("%H:%I:%S"));
            $date = date_sub($date,date_interval_create_from_date_string($late_margin." minutes"));
            $late_hour = $date->format('H:i:s');
        }
        return $late_hour;
    }
}