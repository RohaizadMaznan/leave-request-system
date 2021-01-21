<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User Registration | Attendant System</title>
    
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    
<style>.modal-backdrop {z-index:90 !important;}</style>
    
</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container" style="z-index: 1 !important;">
            <div class="sign-up-content">
                <form action="signUpProcess.php" method="post">
                    <h2 class="form-title">New Registration</h2>

                    <div class="form-radio" >
                        <input type="radio" name="role" value="staff" id="staff" checked="checked" />
                        <label for="staff">Staff</label>

                        <input type="radio" name="role" value="admin" id="admin" />
                        <label for="admin">Admin</label>
                    </div>
                    
                    <div class="form-radio" >
                        <input type="radio" name="gender" value="Male" id="male" checked="checked" />
                        <label for="male">Male</label>

                        <input type="radio" name="gender" value="Female" id="female" />
                        <label for="female">Female</label>
                    </div>

                    <div class="form-textbox">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" required />
                    </div>

                    <div class="form-textbox">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fulname" id="fullname" required />
                    </div>

                    <div class="form-textbox">
                        <label for="phonenum">Phone No.</label>
                        <input type="number" name="phonenum" id="phonenum" required />
                    </div>
                    
                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required />
                    </div>

                    <div class="form-textbox">
                        <label for="pwd">Password</label>
                        <input type="password" pattern=".{8,16}" name="pwd" id="pwd" title="8 or more Character" required/>
                    </div>
                    
                    <div class="form-textbox">
                        <label for="pass">Retype Password</label>
                        <input type="password" name="repwd" id="pass" required/>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="termcondition.php" class="term-service" data-toggle="modal" data-target="#terms">Terms of service</a></label>
                        
                    <!-- terms Modal -->
                    <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termofuse" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="termofuse">Term of use</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="pb-3" style="text-indent: 35px;">The DMS Web site (the "Site"), including but not limited to www.mydms.com and its affiliated sites, provides an online resource for health care professionals. These terms may be changed from time to time and without further notice. Your continued use of the Site after any such changes constitutes your acceptance of the new terms. If you do not agree to abide by these or any future terms, please do not use the Site or download materials from it.</p>
                            <p>DMS Team, may terminate, change, suspend or discontinue any aspect of the Site, including the availability of any features, at any time. DMS may remove, modify or otherwise change any content, including that of third parties, on or from this Site. DMS may impose limits on certain features and services or restrict your access to parts or all of the Site without notice or liability. DMS may terminate your use of the Site at any time in its sole discretion. These terms apply exclusively to your access to and use of the Site and do not alter the terms or conditions of any other agreement you may have with DMS or its parents, subsidiaries or affiliates.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                        
                    </div>
                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>