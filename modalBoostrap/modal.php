<!DOCTYPE HTML>
<html>

<head>
    <title>Bootstrap Validation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script language="javascript" src="ajax.js"></script>
    <style>
        .row {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Button -->
        <button class="btn" data-toggle="modal" data-target="#myModal">Popup</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">Username</div>
                            <div class="col-md-7">
                                <input type="text" id="username" name="username" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">Password</div>
                            <div class="col-md-7">
                                <input type="text" id="password" name="password" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">Email</div>
                            <div class="col-md-7">
                                <input type="text" id="email" name="email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">Fullname</div>
                            <div class="col-md-7">
                                <input type="text" id="fullname" name="fullname" />
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger d-none">

                    </div>
                    <div class="alert alert-success d-none">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="register-btn">Đăng ký</button>
                        <button type="button" class="btn btn-default" id="close-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>