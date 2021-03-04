
# Documentations:


#### Installation:
   * ###### Server Requirements:              
        The Sage framework has a few system requirements. All of these requirements are given below:
     

        PHP >= 7.2.0
        BCMath PHP Extension
        Ctype PHP Extension
        JSON PHP Extension
        Mbstring PHP Extension
        OpenSSL PHP Extension
        PDO PHP Extension
        Tokenizer PHP Extension
        XML PHP Extension
   * ###### Installing Sage:
        Sage utilizes Composer to manage its dependencies. So, before using sage, make sure you have Composer installed on your machine.
 
      First, download the Sage using Composer:
   
           composer create-project kabircse/sage:1.0.x-dev
           

  After install set up your database to /config/database.php.
  If you get any problem with file missing/autoload, then run this command in you project a folder using a command:
    
            composer update -no-dev -o
  There also exist a demo database to   db/address_book.sql, Using this database you can use the demo controller,model with demo views
#### Route:
At first, you have to create a route in web.php with http GET,POST methods.
Ex:

    $router->map('GET','/', 'DemoController@index','demo');
These routes show the data from the index() methods of DemoController. We can also call this method using route name defined as demo.
* The first parameter shows the http methods.
* The second parameter shows the url of your resources.
* The third parameter shows the file/controller.
* The fourth parameter shows the route name

### Controller:
Create a controller named NameController to app\Controllers path extending Controller class.
 
Ex:
We created a controller named as DemoController as 

    <?php
                                                       
       namespace App\Controllers;
       
       use App\Models\Address;
       use Vendor\Valitron\Validator;
       
       class DemoController extends Controller {
        /**
         * Create a private variable for model.
         *
         * @var string
         */       
           private $address;
       
           /**
            * Create a new controller instance for load model instance.
            *
            * @return void
            */
           public function __construct() {
               $this->address = new Address();
           }

           /**
            * Display a listing of the resource.
            *
            * @return View page
            */
            public function index() {
                //query through pdo object from model
                $rs = $this->address->get_by_pdo_query()->fetchAll();
                //prepare through pdo object from model
                $rs = $this->address->get_by_pdo_prepare([5]);
                return view('demo/index',['address'=>$rs]);
            }
    ?>
    
### Model:
For using model you have to create a model class to app/models path extending BaseModel class.
There are several ways to access data from a database, you can use separate model, or you can use base model directly in your controller creating an instance of base model. 

#### Using Custom model: 
We are using Address model class to our above controller. Access data from the address table using address model class.

##### A. Manipulating data from base model over custom model using default methods. 
    
####### 1. Get Data:

                // for single row
                $rs = $this->address->select("address_book")->fetch();

                // for single row with table name as alias
                $rs = $this->address->address_book()->select("id,name")->fetch();

                // for all rows with specifi column
               $rs = $this->address->address_book()->select('roles',['expr'=>'id,title'])->fetchAll(); 
                
                // for all rows
                $rs = $this->address->select("address_book")->fetchAll();
    
                // using column
                $rs = $this->address->select("address_book",["expr"=>["id","name"]])->fetch();
                
                // for json data
                $rs = $this->address->table("address_book")->fetch()->jsonSerialize();
        
                // selecting column
                $rs = $this->address->table("address_book")->select("id,name")->fetch()->jsonSerialize();
        
                // find by id
                $rs = $this->address->table("address_book",5)->jsonSerialize();
        
                // query with where
                $rs = $this->address->table("address_book")->where("user_id",7)->fetch();
                $rs = $this->address->table("address_book")->where("user_id",[5,7])->fetchAll();
                $rs = $this->address->table("address_book")->whereNot("user_id",[5,7])->fetchAll();
        
                // Order by
                $rs = $this->address->table("address_book")->orderBy("id","DESC")->fetchAll();
        
                // limit result with offset
                $rs = $this->address->table("address_book")->limit(2,2)->fetchAll();
        
                // using page
                $rs = $this->address->table("address_book")->paged(2,2);
        
                // aggregate methods
                $rs = $this->address->table("address_book")->count();
                $rs = $this->address->table("address_book")->min("id");
                $rs = $this->address->table("address_book")->sum("id");
       
####### 2. Insert:

                // Insert single row
                $row = [
                    "name" => "user2",
                    "firstname" => "user firstname"
                ];
                $rs = $this->address->table("address_book")->insert($row);
                
                // Insert multiple rows
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
                
#######3. Create, Save:

                  // create row from scratch, if exists then update
                 $properties = ["name"=>'user20',"firstname"=>'',"city"=>''];
                 $row = $this->address->createRow("address_book", $properties );
                 $row->city = "Khulna";
                 $row->save();     
               
####### 5. Delete   

                $rs = $this->address->table("address_book",19)->delete();
                                                      
##### B. Manipulate data from custom model using user defined/custom methods.

                // query through pdo object from model, you must create that methods on your model
                $rs = $this->address->get_by_pdo_query()->fetchAll();
                // prepare through pdo object from model
                $rs = $this->address->get_by_pdo_prepare([5]);

                
 **Alternatively, You can directly use the base Model class named Model to your controller
and can access a table data using the instance of the Model as**

       $model = new Model();
       // for single row
       $rs = $this->model->select("table_name")->fetch();
                    
        
### Helper functions:
There are several helper functions. These are given below:

**1. view($parm1,$parm2,$parm3)** : 
for include your page on the controller. The view() helper has 3 parameters.

    return view('demo/create',['title'=>$title],false);

The first parameter is the page to include here from resources/view/demo/create.php
The second parameter is the array of your data needs according to your demand for create.php page,
The third parameter is the boolean status for loading the template or not.

**2. redirect($url,$with)**

    redirect('demo')  
    
This function redirect a request to the give url. There this url redirect the user to /demo url named to web.php
The second parameter is a array of errors and inputs as you like to add for fetching later to show as:

        $with = [
            'errors' => ['name'=>'Would be a something.'],
            'inputs' => $_REQUEST
        ];
        return redirect('demo/add',['with'=>$with]);

**3. notification($array('msg_type'=>'success','msg'=>'Created successfully.'))**

    notification(['type'=>'success', 'message'=>'Created Successfully']);   
For creating a notification msg, we are currently using session based toastr for displaying msg.

**4. session('errors',$errors_array);**

    session('errors',$v->errors());
We are keeping validation errors to session named errors for displaying with input fields.

**5. asset($css_or_js_file_path)** 

    echo asset('dist/css/custom.css')   
The css and js file loading located from assets directory. Load custom.css files from /assets/dist/custom.css as

**6. route($url)**

            route('demo/status/');   
This functions link the url to the given path url using anchor href.

**7. config('constants.constants_name')**
For using constants you can use the config/constants file, put your constants there and you can access it where you want as    

        config('constatns.gender')
Accessing gender from constants.


**7. upload_path()**
For uploading a file to public/assets/uploads path.    

        upload_path('image.jpg')

**9. Debugging:**
        There are two default functions for debugging
        
        1. dump(),
        2. dd()
        
**10. Form**
    There are the most common form field creation.
    
          
  ##### # Form input:

    form_input('field_name','field_type','value','custom_attributes')
  1. The first parameter is the name of the field.  
  2. The second parameter is the type of input field(text,email etc .)  
  3. The third parameter is the value, you can use to retrieve the previous value using old() functions  
  4. The fourth parameter is the other attributes as string
   
         echo form_input('name','text',old($inputs,'name'),'class="form-control form-control-sm" id="name" placeholder="Type name" required');
          
  ###### # Form Textarea:  

    form_textarea('field_name','value','custom_attributes')
  1. The first parameter is the name of the field.    
  2. The third parameter is the value, you can use to retrieve the previous value using old($inputs,'name') functions,
  for showing previous value you have to add with a parameter to route(). see route section.  
  3. The fourth parameter is the other attributes as string

    echo form_textarea('Description',null,$attribute='class="form-control" rows="2" placeholder="Type Descriptions" id="Description"');

###### # Form Select:  

    form_select('field_name','items_array','selected_item','custom_attributes')
  1. The first parameter is the name of the field.    
  2. The second parameter is the values of items in array  
  3. The third parameter is the selected items value
  3. The fourth parameter is the other attributes as string
       
   
        echo form_select('SelectId[]',$select_array,null,'class="input-sm p-1 selectId"');        
          
### Form validation:
        $v = new Validator($_POST);
        $v->rule('required', ['name', 'firstname','street','zip_code','city']);
        $v->rule('lengthBetween', 'name', 5, 50);
        $v->rule('lengthBetween', 'firstname', 5, 50);
        $v->rule('email', 'email');
        if($v->validate()) {
            $name = ($_POST['name']);
            $firstname = ($_POST['firstname']);
            $city = ($_POST['city']);
            $data = [
                'name'=>$name,
                'firstname'=>$firstname,
                'city'=>$city
            ];
            $rs = $this->address->table("address_book")->insert($data);
            if($rs) {
                notification(['type'=>'success', 'message'=>'Created Successfully']);
            }
            else {
                $errors = $rs->errorInfo();
            }
        } else {
            $errors = $v->errors();
        }
        $with = [
             'errors' => $errors,
             'inputs' => $_REQUEST
         ];
         return redirect('demo/crate',['with'=>$with]);
        
   ##### Displaying form validation errors:
   For name field as:
      
        <?php if(isset($errors['name'])):?>
            <span class="text-danger"><?php echo $errors['name'][0]; ?></span>
        <?php endif;?>
        
   #### Notification:     
  For using this message you have to pass , your message as form controller: 
  
    notification(['type'=>'success', 'message'=>'Created Successfully']);       

For form submission wrong/success, you can show a message as:

        <?php if(session('notification_type')):?>
            <p class="btn text-danger">
                <?php echo session('notification_message'); ?>
            </p>
        <?php endif;
            //reset it after displaying
            session('notification_type',[]);
        ?>    
  Another way,
  we can just load the notificatin.php with toastr js message presenter to footer.


### Template:
There is no templating engine, we are using just php tag. We used a master page for loading all pages named at master.php to
    
     /resources/views/master.php. 
We are loading other page to master.php from
a footer,header and sidebar page on 
    
    /resources/views/template.
Your can separate this structure according to your needs.
        
### Logging:
For logging your errors you can use myLog(), it will create a log on /storage/logs
        
        myLog("That is working"):                

### Session:
There are a session for working with your applications.

######1. Create: session('key','value')

        session('is_logged_in',true);
        
######2. Read: session('key')        

        session('is_logged_in');
        
 * Alternatively you can use session_put() and session_get() for create and read session
  
        
######3. Destroy: session_forget('key')        

        session_forget('is_logged_in');
                
* session all: session_all() and session_empty() for reading entire session and removing entire session

### File Upload:
You can upload file as

    $upload = new Upload(); // load the file upload library or inherit this
    if ($this->upload->fileExists('EmployeePhoto')) {
        $emPhoto = $this->upload->make('EmployeePhoto');
        $photo_file_name = time();
        $emPhoto = $emPhoto->save(upload_path('images/employee/' . $photo_file_name));
    }
    
Image file validation:
You can validate an image file using validator check on form validation section.
    
        if ($this->upload->fileExists('EmployeePhoto')) {
            $v->rule('in', 'EmployeePhoto.error', [0])->message('No image selected for {field}');
            $v->rule('in', 'EmployeePhoto.type', ['image/jpeg'])->message('Only jpg image is allowed for {field}.');
            $v->rule('max', 'EmployeePhoto.size', 300*1024)->message('Max size is 300kb for {field}.');
        }
        
