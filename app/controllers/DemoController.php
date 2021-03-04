<?php

namespace App\Controllers;

use App\Models\Address;
use Vendor\Valitron\Validator;
//use App\Models\ModelMysqli;

class DemoController extends Controller {
    private $address;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->address = new Address();
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() {
        //1. query through pdo object from model
        //$rs = $this->address->get_by_pdo_query()->fetchAll();
        // prepare through pdo object from model
        //$rs = $this->address->get_by_pdo_prepare([5]);

        //2. get data from base model
        //$rs = $this->address->select("address_book")->fetch();
        //$rs = $this->address->select("address_book",["expr"=>["id","name"]])->fetch();
        //$rs = $this->address->table("address_book")->fetch()->jsonSerialize();

        //3. get data from base model with select
        //$rs = $this->address->table("address_book")->select("id,name")->fetch()->jsonSerialize();

        //4. find by id
        //$rs = $this->address->table("address_book",5)->jsonSerialize();

        //5. query with where
        //$rs = $this->address->table("address_book")->where("user_id",7)->fetch();
        //$rs = $this->address->table("address_book")->where("user_id",[5,7])->fetchAll();
        //$rs = $this->address->table("address_book")->whereNot("user_id",[5,7])->fetchAll();

        //6. Order by
        //$rs = $this->address->table("address_book")->orderBy("id","DESC")->fetchAll();

        //7. limit result
        //$rs = $this->address->table("address_book")->limit(2,2)->fetchAll();

        // 8. pge
        //$rs = $this->address->table("address_book")->paged(2,2);

        //9. aggregate methods
        //$rs = $this->address->table("address_book")->count();
        //$rs = $this->address->table("address_book")->min("id");
        //$rs = $this->address->table("address_book")->sum("id");

        //10. Insert single row or multiple rows
        $row = [
            "name" => "user2",
            "firstname" => "user firstname"
        ];
        //$rs = $this->address->table("address_book")->insert($row);
        $rows = [
            [
                "name" => "user2",
                "firstname" => "user firstname 2"
            ],
            [
                "name" => "user3",
                "firstname" => "user firstname 3"
            ]
        ];
        //$rs = $this->address->table("address_book")->insert($row); normal query
        //$rs = $this->address->table("address_book")->insert($rows,'prepared'); // "prepared" query best
                // for security reason
        //$rs = $this->address->table("address_book")->insert($rows,'batch'); // normal insert with batch

        //11. UPDATE, Delete
        $row = [
            "user_id" => 16,
            "name" => 16,
            "city" => "Dhaka"
        ];
        //$rs = $this->address->table("address_book",15)->update($row);
        //delete
        //$rs = $this->address->table("address_book",19)->delete();

        //Transaction:
        /*
            $this->address->begin();
            $this->address->commit();
            $this->address->rollback();
        */

        //12. CRUD with properties
        //update old data using save
        /*$row = $this->address->table("address_book",17);
        dump($row);
        $row->city = "Barishal";
        $row->save();*/

        // update
        /*$row = $this->address->table("address_book",17);
        $row->update(["user_id"=>120]);*/

        // create row from scratch, if exists then update
        /*$properties = ["name"=>'user20',"firstname"=>'',"city"=>''];
        $row = $this->address->createRow("address_book", $properties );
        $row->city = "Khulna";
        $row->save();*/
        //$row->exists
        //other function rowCount(),
        //dd($row);
        //dd($rs);

        //$rs = $this->address->address_book()->select("id","name","user_id")->where("id",5)->fetch();//->jsonSerialize();
        //dump($rs->user()->fetch()->jsonSerialize());

        //$rs = $this->address->address_book()->select("id","name")->fetchAll();
        //dump($rs);

        /*$rs = $this->address->address_book()->paged(2,1); // paginate limit 2, offset 1
        foreach ($rs as $user) {
            $author = $user->user()->fetch();
            // address_book relation with user table with user_id on address_book foreign key column with id pk on user.
            dump($author->jsonSerialize());
        }*/

        //dd($this->employee->select('month_wise_salary_info',['expr'=>'FromDate,EmployeeCode,count(*) as d','groupBy'=>['FromDate']])->fetchAll());
        //dd($this->employee->select('month_wise_salary_info',['expr'=>'FromDate,EmployeeCode','where'=>['EmployeeID=3']])->fetch());
        //dd($this->employee->select('month_wise_salary_info',['expr'=>'FromDate,EmployeeCode'])->fetch());
        //dd($this->employee->select('month_wise_salary_info')->fetch());
        //return $this->employee->delete('tmp_device_row_data',["WorkDate>='2020-11-01'","WorkDate<='2020-11-05'","PunchType IN(0,1)"]);
        //$leave_data = $this->employee->select('emp_leave_transaction_approved',['expr'=>'GROUP_CONCAT(id)', 'where'=>["FromDate>='2020-12-01' AND ToDate<='2020-12-05'"]]);
        //$leave_data = $this->employee->select('emp_leave_transaction_approved',['expr'=>'*', 'where'=>["FromDate>='2020-12-01' AND ToDate<='2020-12-05'"]])->rowCount();

        $address = $this->address->table("address_book")->fetchAll();
        $title = "Address List";
        return view('demo/index',['address'=>$address,'title'=>$title]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() {
      $title = "Address New";
        return view('demo/create',['title'=>$title]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Form  $request
     * @return View
     */
    public function store() {
        $v = new Validator($_POST);
        $v->rule('required', ['name', 'firstname','street','zip_code','city']);
        $v->rule('lengthBetween', 'name', 5, 50);
        $v->rule('lengthBetween', 'firstname', 5, 50);
        $v->rule('email', 'email');
        if($v->validate()) {
            $name = validation($_POST['name']);
            $firstname = validation($_POST['firstname']);
            $street = validation($_POST['street']);
            $zip_code = validation($_POST['zip_code']);
            $city = validation($_POST['city']);
            //$sql = "INSERT INTO address_book(name,firstname,street,zip_code,city) VALUES('$name','$firstname','$street','$zip_code','$city')";
            //$this->model->query($sql);
            //echo "Error: " . $sql . "<br>" . $this->model->error;
            $data = [
                'name'=>$name,
                'firstname'=>$firstname,
                'street'=>$street,
                'zip_code'=>$zip_code,
                'city'=>$city
            ];
            $rs = $this->address->table("address_book")->insert($data);
            if($rs) {
               return redirect('demo');
            }
            else {
                $rs->errorInfo();
            }
        } else {
            return view('demo/create',['title'=>'Address Add','errors'=>$v->errors()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id=null) {
        //$sql = "SELECT * FROM address_book WHERE id=".validation($id);
        //$row = $this->model->query($sql)->rows();
        $row = $this->address->table("address_book",$id);
        if(!empty($row)){
          $title = "BookController Edit";
          return view('demo/edit',['book'=>$row,'title'=>$title]);
        }
        else
          echo 'Data not found.';
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id=null) {
        //$sql = "SELECT * FROM address_book WHERE id=".validation($id);
        //$row = $this->model->query($sql)->rows();
        $row = $this->address->table("address_book",$id);
        if(!empty($row)){
            $title = "BookController Show";
            return view('demo/show',['book'=>$row,'title'=>$title]);
        }
        else
            echo 'Data not found.';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return View
     */
    public function update($id=null) {
        if(isset($id)){
            $name = validation($_POST['name']);
            $firstname = validation($_POST['firstname']);
            $street = validation($_POST['street']);
            $zip_code = validation($_POST['zip_code']);
            $city = validation($_POST['city']);
            //$sql = "UPDATE address_book SET name='$name',firstname='$firstname',street='$street',zip_code='$zip_code',city='$city' WHERE id='$id'";
            //$this->model->query($sql);
            //$this->route('demo/index');
            $data = [
                'name'=>$name,
                'firstname'=>$firstname,
                'street'=>$street,
                'zip_code'=>$zip_code,
                'city'=>$city
            ];
            $row = $this->address->table("address_book",$id);
            $row->update($data);
            notification(['type'=>'success', 'message'=>'Updated Successfully']);
            return redirect('demo');
            /*if($this->model->query($sql)->status())
                $this->route('demo/index');
            else
                echo "Error: on " . $sql;*/
        }
        else
            echo 'Update id not found.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy($id=null) {
      if(isset($id)) {
          //$sql = "DELETE FROM address_book WHERE id='$id' LIMIT 1";
          //$this->model->query($sql);
          $row = $this->address->table("address_book",$id)->delete();
          if($row) {
              return redirect('demo');
          }
          else
            echo "Error: on " . $row->errorInfo();
      }
      else
          echo 'Update id not found.';
    }

    public function export_xml() {
      $sql = "SELECT * FROM address_book";
      $address = $this->model->query($sql)->result();
      //$this->view('demo/xml',['demo'=>$demo]);
      require(View.'demo/xml.php');
    }

    public function status($id=null,$status=null) {
        echo $status.'<br />';
        dd($id);
    }
    public function demo() {
        //$address = $this->model->query("SELECT * FROM address_book")->result();
        $address = $this->address->table("address_book")->fetchAll();
        $title = "Address List";
        return view('demo/demo',['demo'=>$address,'title'=>$title]);
    }

    private function validation($name)
    {
    }
}
