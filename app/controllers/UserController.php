<?php
namespace App\Controllers;

use App\Models\User;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class UserController extends Controller {
    use GenerateList;

    public $user;
    public function __construct()
    {
        //parent::__construct();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = "Users";
        //$users = $this->user->table('users')->paged(2,1);
        //return view('user/index',compact('title','users'));
        $queryString = $_REQUEST;
        $page = $queryString['page'] ?? 1;
        $pageSize = 5;
        $users = $this->user->table('users');
        $total_records = $users->count();
        $total_page = ceil($total_records/$pageSize);
        $users = $users->paged($pageSize,$page);
        return view('user/index',compact('title','users','page','total_page','pageSize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "New User";
        // list from table according to key and value
        $roles = $this->table_to_list('roles','id','title','', ['','--select--']);

        // list from existing object according to key and value
        //$roles = $this->user->table('roles')->fetchAll();
        //$roles = $this->array_to_list($roles,'id','title'); //['','--select--']
        //dd($roles);
        return view('user/create',compact('title','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $inputs
     * @return Response View
     */
    public function store()
    {
        $inputs = $_POST;
        $v = new Validator($inputs);
        $v->rule('required', ['name','user_name','password']);
        $v->rule('alphaNum', 'user_name');
        $v->rule('lengthBetween', 'password', 5, 20);
        if($v->validate()) {
            $name = validation($inputs['name']);
            $email = validation($inputs['email']);
            $user_name = validation($inputs['user_name']);
            $password = validation($inputs['password']);
            $IsActive = $inputs['IsActive'] ?? 0;
            $user_info = [
                'user_name' => $user_name
            ];
            if (!$this->user->table('users')->where($user_info)->count()) {
                $user_info = [
                    'name' => $name,
                    'email' => $email,
                    'user_name' => $user_name,
                    'password' => bcrypt($password),
                    'is_active' => $IsActive
                ];
                $rs = $this->user->table('users')->insert($user_info,'prepared');
                if($rs) {
                    notification(['type'=>'success', 'message'=>'Created Successfully']);
                }
                else {
                    $errors = $rs->errorInfo();
                }
            }
            else {
                $errors = [
                    'user_name' => ['User name is already exists.']
                ];
            }
        } else {
            $errors = $v->errors();
        }
        $with = [
            'errors' => $errors ?? '',
            'inputs' => $inputs
        ];
        //myLog(json_encode($with));
        return redirect('user/create',['with'=>$with]);//->with($inputs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return View
     */
    public function edit($user_id = null)
    {
        $title = "Update user";
        $user = $this->user->table("users")->where('id',$user_id)->fetch();
        return view('user/edit',compact('title','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  shiftRuleId
     * @return View
     */
    public function update($user_id=null)
    {
        $inputs = $_POST;
        $v = new Validator($inputs);
        $v->rule('required', ['name','user_name']);
        $v->rule('alphaNum', 'user_name');
        $v->rule('lengthBetween', 'password', 5, 20);
        if($v->validate()) {
            $name = validation($inputs['name']);
            $email = validation($inputs['email']);
            $user_name = validation($inputs['user_name']);
            $password = validation($inputs['password']);
            $role = $inputs['role'];
            $IsActive = $inputs['IsActive'] ?? 0;

            $user_info = [
                'user_name' => $user_name
            ];
            $user = $this->user->table('users')->where($user_info);
            if (!$user->whereNot('id',$user_id)->count()) {
                $user_info = [
                    'name' => $name,
                    'email' => $email,
                    'user_name' => trim($user_name),
                    'password' => bcrypt($password),
                    'role_id' => $role,
                    'is_active' => $IsActive
                ];
                if (!$password) {
                    unset($user_info['password']);
                }
                $rs = $this->user->table('users',$user_id)->update($user_info,'prepared');
                if($rs) {
                    notification(['type'=>'success', 'message'=>'Updated Successfully']);
                }
                else {
                    $errors = $rs->errorInfo();
                }
            }
            else {
                $errors = [
                    'user_name' => ['User name is already exists.']
                ];
            }
        } else {
            $errors = $v->errors();
        }
        $with = [
            'errors' => $errors ?? '',
            'inputs' => $inputs
        ];
        return redirect('user/edit/'.$user_id,['with'=>$with]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy($id=null) {
        if($id) {
            $user = $this->user->table("users",$id)->delete();
            if($user) {
                notification(['type'=>'success', 'message'=>'Deleted Successfully']);
            }
            else {
                $errors = $user->errorInfo();
            }
        }
        else {
            notification(['type'=>'danger', 'message'=>'There is something wrong.']);
        }
        $with = [
            'errors' => $errors ?: ''
        ];
        return redirect('user/index',['with'=>$with]);
    }
}
