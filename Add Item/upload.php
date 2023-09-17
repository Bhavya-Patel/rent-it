<?php
session_start();
$cid =  $_SESSION['cid'];

$category = $_POST['category'];
$name = $_POST['pname'];
$description = $_POST['product_desc'];
$rent = $_POST['rent'];

$con = mysqli_connect("localhost","root","","rent-it");

if(isset($_POST['AddIt']))
{

    $sql = "INSERT INTO product(Category,Customer_id,Product_Name,Product_Desc,Rent) 
                VALUES ('".$_POST["category"]."','".$cid."','".$_POST["pname"]."','".$_POST["product_desc"]."','".$_POST["rent"]."')";

    // ($category,1,$name,$description,$rent)";

    $query = mysqli_query($con,$sql);

    // if($query)
    // {
    //     echo "Done";
    // }
    // else{
    //     echo "Not done";
    // }

    $sql1 = "SELECT Product_id from product where Product_Name ='".$name."'";
    $query1 = mysqli_query($con,$sql1);

    // if($query1)
    // {
    //     echo "Done 2";
    // }
    // else{
    //     echo "Not done 2";
    // }

    $res = mysqli_fetch_row($query1);
    // echo $res[0];
    $pid = $res[0];

    
    
        
        // File upload configuration 
        $targetDir = "/xampp/htdocs/Project/uploads/"; 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        $fileNames = $_FILES['files']['name']; 
        // echo $fileNames;
        if(!empty($fileNames))
        { 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertValuesSQL .= "('".$fileName."',".$res[0]."),"; 
                    }else{ 
                        $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
            
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                $insert = $con->query("INSERT INTO images (file_name,Product_id) VALUES $insertValuesSQL "); 
                if($insert){ 
                    $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                    $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
            } 
    }
}   
else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
    // Display status message 
    echo '<script>alert('.$statusMsg.')</script>'; 
// echo $statusMsg;
    header("location:../HomePage/dropdown.php")




?>