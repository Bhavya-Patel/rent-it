<?php

    session_start();

    $con = mysqli_connect('localhost','root','','rent-it');
    // $sql = "SELECT * FROM userdata where Customer_id='".$_SESSION['cid']."'";
    // $query = mysqli_query($con,$sql);
    // $total = mysqli_num_rows($query);

?>
<html>
    <head>
      <title>Edit Profile</title>
      <link rel="icon" href="../favicon.ico" type="image/ico"> 
        <link href="editprofile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <div class="bootstrap">
            <div class="container light-style flex-grow-1 container-p-y">

                <h4 class="font-weight-bold py-3 mb-4">
                  Account settings
                </h4>
                
                <div class="card overflow-hidden" id="one">
                  <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                      <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
            
                          <div class="card-body media align-items-center">
                            <img src="img/profile5.png" alt="" class="d-block ui-w-80">
                            <div class="media-body ml-4">
                                <form action="#" method="get">
                                <label class="btn btn-outline-primary">
                                    new photo
                                    <input type="file" class="account-settings-fileinput">
                                </label> &nbsp;
                                <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                
                                <div class="text-dark small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </form>
                            </div>
                          </div>
                          <hr class="border-light m-0">

                          <form data-alert="You must provide:" action="updateinfo.php" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control mb-1" name="uname" value="<?php echo $_SESSION['name']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Phone No</label>
                              <input type="text" class="form-control" name="uphone" value="<?php echo $_SESSION['Phone_No']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label class="form-label">E-mail id</label>
                              <input type="text" class="form-control mb-1" name="uemail" value="<?php echo $_SESSION['email']; ?>" required>
                              <div class="alert alert-warning mt-3">
                                Your email is not confirmed. Please check your inbox.<br>
                                <a href="javascript:void(0)">Resend confirmation</a>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="utextarea"> Address</label>
                              <textarea class="form-control" name="utextarea" rows="3" required><?php echo $_SESSION['address']; ?></textarea>
                            </div>
                            <div class="text-right mt-3">
                            <input type="submit" class="btn btn-primary mb-5" name="infobtn" value="Update information"></input>&nbsp;
                            <!-- <button type="button" class="btn btn-default mb-5">Cancel</button> -->
                            </div>
                          </div>
                          </form>

                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <form action="updatepass.php" method="post">
                          <div class="card-body pb-2">
            
                            <div class="form-group">
                              <label class="form-label">Current password</label>
                              <input type="password" class="form-control" value="<?php echo $_SESSION['password']; ?>" disabled>
                            </div>
            
                            <div class="form-group">
                              <label class="form-label">New password</label>
                              <input type="password" name="n1pass"  pattern=".{6,}" title="Six or more characters" class="form-control" required>
                            </div>
            
                            <div class="form-group">
                              <label class="form-label">Repeat new password</label>
                              <input type="password" name="n2pass" pattern=".{6,}" title="six or more characters" class="form-control" required>
                            </div>
            
                            <div class="text-right mt-3">
                            <input type="submit" class="btn btn-primary mb-5" name="passbtn" value="change Password"></input>&nbsp;
                            <!-- <button type="button" class="btn btn-default mb-5">Cancel</button> -->
                            </div>
                            </form>
                          </div>
                        </div>
          
                  
      
                      </div>
                    </div>
                  </div>

                
                </div>
            </div>
               
        </div>
            
    </body>
</html>
