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
<?php include_once('header.php');?>


<section class="container">
    <div class="row">
        <form class="form-horizontal" role="form">
            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo base_url('index.php/admin/personal_info')."/".$preference['applicant_id']?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Personal Information</a></li>
                    <li><a href="<?php echo base_url('index.php/admin/financial_info')."/".$preference['applicant_id']?>"><span class="glyphicon glyphicon-usd"></span>&nbsp;Financial Information</a></li>
                    <li><a href="<?php echo base_url('index.php/admin/education_info')."/".$preference['applicant_id']?>"><span class="glyphicon glyphicon-book"></span>&nbsp;Educational Information</a></li>
                    <li   class="active"><a href="<?php echo base_url('index.php/admin/preferences')."/".$preference['applicant_id']?>"><span class="glyphicon glyphicon-tags"></span>&nbsp; Preference</a></li>
                </ul>
                <hr>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Level</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="level" id="first_name" value="" placeholder="Level" va>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Session</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="session" id="inputEmail" value="" placeholder="Session">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Year</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="year" id="inputEmail" value="" placeholder="Year">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Country</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="country" id="inputEmail" value="" placeholder="Country">
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">State</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="state" id="inputEmail" value="" placeholder="State">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">City</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="city" id="inputEmail" value="" placeholder="City">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Institution</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="institute1" id="inputEmail" value="" placeholder="Institution(1st)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Institution</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="institute2" id="inputEmail" value="" placeholder="Institution(2nd)">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9">
                        <input type="submit" value="Update" class="btn btn-primary btn-sm" style="margin-left: 810px">
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
