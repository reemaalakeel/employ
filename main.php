<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Employee Name</label>";  
      }  
      else if(empty($_POST["ID"]))  
      {  
           $error = "<label class='text-danger'>Enter Employee ID</label>";  
      }  
      else if(empty($_POST["department"]))  
      {  
           $error = "<label class='text-danger'>Enter Department</label>";  
      }  
      else  
      {  
           if(file_exists('employee_data.json'))  
           {  
                $current_data = file_get_contents('employee_data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'ID'          =>     $_POST["ID"],  
                     'department'     =>     $_POST["department"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('employee_data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Employee Added Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <title>Adding New Employee</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>
        .mt-10 {
            margin-top: 20px;
        }
    </style>
      </head>  
      <body>  



     <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
           <br />  
           <div class="container" style="width:500px;">
           <div class="panel-heading">
                   <h3 align="">Add Employee to JSON File</h3><br />       
                    </div>  
                <div class="panel-body">
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name:</label>  
                     <input type="text" name="name" class="form-control" placeholder="Enter your name" /><br />  
                     <label>Employee ID:</label>  
                     <input type="number" name="ID" class="form-control"placeholder="Enter your ID" /><br />  
                     <label>Department:</label>  
                     <input type="text" name="department" class="form-control" placeholder="Enter your department" /><br />   </div>
                     <div class="panel-footer">
                     <input type="submit" name="submit" value="Add Employee" class="btn btn-info" /><br />    </div>                   
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message; 

                     }  

                     ?>  



                </form>  
                 
                 </div>        
            </div>
            </div>
        </div>
    </div>
           <br />  
      </body>  
 </html>  