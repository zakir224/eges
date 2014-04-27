<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.theme" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<body >
<?php include_once('header.php');?>


<section class="container">
    <div class="row">
        <form action="<?php echo base_url('index.php/welcome/insert_new_applicant')?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="applicant_reg.php"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Registration Of New Applicant</a></li>

                </ul>
                <hr>

                <div class="form-group">
                    <label class="col-lg-4 control-label">First Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="first_name" id="first_name" value="" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Last Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Gender</label>
                    <div class="col-lg-5">
                        <select class="form-control" name="gender" >
                            <option value="">---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Date Of Birth</label>
                    <div class="col-lg-5">
                        <input type="date" class="form-control" name="d_o_b" id="d_o_b" value="" placeholder="Date Of Birth">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-4 control-label">E-mail</label>
                    <div class="col-lg-5">
                        <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Mobile</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="mobile" id="mobile" value="" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-4 control-label">Upload Photo</label>

                    <div class="col-lg-5">
                        <input type="file" name="image" required>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-4 control-label"></label>
                    <div class="col-lg-5">
                        <input type="submit" value="Save" style="background: #003399;width: 100px;height: 30px;color: #ffffff;font-style: oblique">
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
