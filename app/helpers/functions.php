<?php
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
    function redirect($url=null) {
        return header('Location:'.URL.$url);
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
    function view($page = null, $data = [], $master = true)
    {
        extract($data);
        // if master false then open page without master.php(header,footer)
        $view = ($master == true) ? 'master.php' : $page.'.php';
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
    function old($var=null)
    {
        if(is_string($var) && array_key_exists($var,$_REQUEST)){
            return $_REQUEST[$var];
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
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
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
    function session_forget($key=null)
    {
        if(isset($key)){
            return session($key,null);
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
        $option .= '<option value="">-- Select --</option>';
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
    function date_conversion($date = null,$format='d-m-Y')
    {
        if (isset($date) && $date>0) {
            $formated_date = date($format, strtotime($date));
            // when date is 0 then sent null;
            return preg_match('/12.[0-9]{1,2}[\s](am)/i',$formated_date,$match) ? null: $formated_date;
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

function add_log($item) {
    return error_log($item);
}