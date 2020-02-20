<?php

namespace App\Controllers;

use App\library\Upload;
use App\Models\Demo;
use App\Models\Model;
use Vendor\Valitron\Validator;

class DemoController extends Controller {
    /**
     * @var Upload
     */
    private $upload;
    /**
     * @var Model
     */
    private $model;
    /**
     * @var Demo
     */
    private $demo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->demo = new Demo();
        $this->model = new Model();
        $this->upload = new Upload();
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() {
        //1. query through pdo object from model
        //$rs = $this->demo->get_by_pdo_query()->fetchAll();
        // prepare through pdo object from model
        //$rs = $this->demo->get_by_pdo_prepare([5]);

        //2. get data from base model
        //$rs = $this->demo->select("demo_book")->fetch();
        //$rs = $this->demo->select("demo_book",["expr"=>["id","name"]])->fetch();
        //$rs = $this->demo->table("demo_book")->fetch()->jsonSerialize();

        //3. get data from base model with select
        //$rs = $this->demo->table("demo_book")->select("id,name")->fetch()->jsonSerialize();

        //4. find by id
        //$rs = $this->demo->table("demo_book",5)->jsonSerialize();

        //5. query with where
        //$rs = $this->demo->table("demo_book")->where("id",7)->fetch();
        //$rs = $this->demo->table("demo_book")->where("id",[5,7])->fetchAll();
        //$rs = $this->demo->table("demo_book")->whereNot("id",[5,7])->fetchAll();

        //6. Order by
        //$rs = $this->demo->table("demo_book")->orderBy("id","DESC")->fetchAll();

        //7. limit result
        //$rs = $this->demo->table("demo_book")->limit(2,2)->fetchAll();

        // 8. pge
        //$rs = $this->demo->table("demo_book")->paged(2,2);

        //9. aggregate methods
        //$rs = $this->demo->table("demo_book")->count();
        //$rs = $this->demo->table("demo_book")->min("id");
        //$rs = $this->demo->table("demo_book")->sum("id");

        //10. Insert single row or multiple rows
        $row = [
            "name" => "user2",
            "firstname" => "user firstname"
        ];
        //$rs = $this->demo->table("demo_book")->insert($row);
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
        //$rs = $this->demo->table("demo_book")->insert($row); normal query
        //$rs = $this->demo->table("demo_book")->insert($rows,'prepared'); // "prepared" query best

        // for security reason
        //$rs = $this->demo->table("demo_book")->insert($rows,'batch'); // normal insert with batch

        //last insert id after single row insertion
        //$last_insert_id = $this->demo->lastInsertId());

        //11. UPDATE, Delete
        $row = [
            "id" => 16,
            "name" => 16,
            "city" => "Dhaka"
        ];
        //$rs = $this->demo->table("demo_book",15)->update($row);
        //delete
        //$rs = $this->demo->table("demo_book",19)->delete();

        //Transaction:
        /*
            $this->demo->begin();
            $this->demo->commit();
            $this->demo->rollback();
        */

        //12. CRUD with properties
        //update old data using save
        /*$row = $this->demo->table("demo_book",17);
        dump($row);
        $row->city = "Barishal";
        $row->save();*/

        // update
        /*$row = $this->demo->table("demo_book",17);
        $row->update(["id"=>120]);*/

        // create row from scratch, if exists then update
        /*$properties = ["name"=>'user20',"firstname"=>'',"city"=>''];
        $row = $this->demo->createRow("demo_book", $properties );
        $row->city = "Khulna";
        $row->save();*/
        //$row->exists
        //other function rowCount(),
        //dd($row);
        //dd($rs);

        //$rs = $this->demo->demo_book()->select("id","name","id")->where("id",5)->fetch();//->jsonSerialize();
        //dump($rs->user()->fetch()->jsonSerialize());

        //$rs = $this->demo->demo_book()->select("id","name")->fetchAll();
        //dump($rs);

        /*$rs = $this->demo->demo_book()->paged(2,1); // paginate limit 2, offset 1
        foreach ($rs as $user) {
            $author = $user->user()->fetch();
            // demo_book relation with user table with id on demo_book foreign key column with id pk on user.
            dump($author->jsonSerialize());
        }*/

        $address_books = $this->demo->table("demo_book")->lastInsertId();
        $title = "Demo book List";
        return view('demo/index',['address_books'=>$address_books,'title'=>$title],true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() {
        $title = "Demo New";
        return view('demo/create',['title'=>$title],true);
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

        //make sure we have no error
        if ($this->upload->fileExists('image')) {
            $v->rule('in', 'image.error', [0])->message('No image selected for {field}');
            $v->rule('in', 'image.type', ['image/jpeg'])->message('Only jpg image is allowed for {field}.');
            $v->rule('max', 'image.size', 300*1024)->message('Max size is 300kb for {field}.');
        }
        if($v->validate()) {
            $name = ($_POST['name']);
            $firstname = ($_POST['firstname']);
            $street = ($_POST['street']);
            $zip_code = ($_POST['zip_code']);
            $city = ($_POST['city']);
            //$sql = "INSERT INTO demo_book(name,firstname,street,zip_code,city) VALUES('$name','$firstname','$street','$zip_code','$city')";
            //$this->model->query($sql);
            //echo "Error: " . $sql . "<br>" . $this->model->error;

            // name is a unique column, we are checking is it exists
            $data = [
                'name'=>$name
            ];
            if (!$this->demo->table('demo_book')->where($data)->count()) {
                $data = [
                    'firstname'=>$firstname,
                    'street'=>$street,
                    'zip_code'=>$zip_code,
                    'city'=>$city
                ];
                if ($this->upload->fileExists('image')) {
                    $image = $this->upload->make('image');
                    $image_file_name = time() .  '.jpg';
                    $image->save(upload_path('images/' . $image_file_name));

                    $data['image'] = $image_file_name;
                }
                $rs = $this->demo->table("demo_book")->insert($data);//->fetch();
                //myLog("last insert id:".json_encode($this->demo->lastInsertId()));
                dd($rs);
                if($rs) {
                    notification(['type'=>'success', 'message'=>'Created Successfully']);
                }
                else {
                    $errors = $rs->errorInfo();
                }
            } else {
                $errors = [
                    'name' => ['User name is already exists.']
                ];
            }
        } else {
            $errors = $v->errors();
        }
        $with = [
            'errors' => $errors ?: '',
            'inputs' => $_REQUEST
        ];
        return redirect('demo/add',['with'=>$with]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id=null) {
        //$sql = "SELECT * FROM demo_book WHERE id=".($id);
        //$row = $this->model->query($sql)->rows();
        $book = $this->demo->table("demo_book",$id);
        if(!empty($book)) {
            return view('demo/edit',compact('title','book'));
        }
        else
            session('errors',"Not found.");
        return redirect('demo/edit/'.$id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id=null) {
        //$sql = "SELECT * FROM demo_book WHERE id=".($id);
        //$row = $this->model->query($sql)->rows();
        $book = $this->demo->table("demo_book",$id);
        if(!empty($book)) {
            return view('demo/show',compact('title','book'));
        }
        else
            session('errors',"Not found.");
        return redirect('demo/show/'.$id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return View
     */
    public function update($id=null)
    {
        $inputs = $_POST;
        $v = new Validator($inputs);
        $v->rule('required', ['name', 'firstname']);

        //make sure we have no error
        if ($this->upload->fileExists('image')) {
            $v->rule('in', 'image.error', [0])->message('No image selected for {field}');
            $v->rule('in', 'image.type', ['image/jpeg'])->message('Only jpg image is allowed for {field}.');
            $v->rule('max', 'image.size', 300*1024)->message('Max size is 300kb for {field}.');
        }

        if ($v->validate()) {
            $name = validation($_POST['name']);
            $firstname = validation($_POST['firstname']);
            $street = validation($_POST['street']) ?? null;
            $zip_code = validation($_POST['zip_code']) ?? null;
            $city = validation($_POST['city']) ?? null;
            //$sql = "UPDATE demo_book SET name='$name',firstname='$firstname',street='$street',zip_code='$zip_code',city='$city' WHERE id='$id'";
            //$this->model->query($sql);
            $data = [
                'name' => $name
            ];
            $book = $this->demo->table('demo_book')->where($data);
            if (!$book->whereNot('id',$id)->count()) {
                $data = [
                    'firstname' => $firstname,
                    'street' => $street,
                    'zip_code' => $zip_code,
                    'city' => $city
                ];

                $path = "images/";
                if ($this->upload->fileExists('image')) {
                    $image = $this->upload->make('image');
                    $image_file_name = time() .  '.jpg';
                    $image->save(upload_path('images/' . $image_file_name));

                    $data['image'] = $image_file_name;
                    //remove old image first
                    if(file_exists($path.$image_file_name)) {
                        unlink($path.$image_file_name);
                    }
                }
                //$row = $this->model->table('demo_book',$id);
                $rs = $book->update($data, 'prepared');
                if($rs) {
                    notification(['type'=>'success', 'message'=>'Updated Successfully']);
                }
                else {
                    $errors = $rs->errorInfo();
                }
            }
            else {
                $errors = [
                    'name' => ['User name is already exists.']
                ];
            }
        } else {
            $errors = $v->errors();
        }
        $with = [
            'errors' => $errors ?? ''
        ];
        return redirect('demo/edit/' . $id,['with'=>$with]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy($id=null) {
        if($id) {
            //$sql = "DELETE FROM demo_book WHERE id='$id' LIMIT 1";
            //$this->model->query($sql)
            $demo = $this->demo->table("demo_book",$id)->delete();
            if($demo) {
                notification(['type'=>'success', 'message'=>'Deleted Successfully']);
            }
            else {
                $errors = $demo->errorInfo();
            }
        }
        else {
            $errors = ['Update id not found.'];
        }
        $with = [
            'errors' => $errors ?: ''
        ];
        return redirect('demo',['with'=>$with]);
    }

    public function export_xml() {
        $title = "xml page";
      $sql = "SELECT * FROM demo_book";
      $demo = $this->model->query($sql)->result();
      //$this->view('demo/xml',['demo'=>$demo]);
      //require(View.'demo/xml.php');
      return view('demo/xml',['demo'=>$demo,'title'=>$title],false);
    }

    public function status($id=null,$status=null) {
        echo $status.'<br />';
        dd($id);
    }

    public function demo() {
        //$demo = $this->model->query("SELECT * FROM demo_book")->result();
        $demo = $this->demo->table("demo_book")->fetchAll();
        $title = "Demo List";
        return view('demo/demo',['demo'=>$demo,'title'=>$title],true);
    }
}
