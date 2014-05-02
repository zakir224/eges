<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<?php include_once('header_admin.php');?>

<section class="container">
    <div class="row">
        <form action="<?php echo base_url('index.php/admin_cont/update_status_info')?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <ul class="nav nav-tabs">
                    <li  class="active"><a href=""><span class="glyphicon glyphicon-user"></span>&nbsp;Applicant Status</a></li>
                </ul>
                <hr>
                <div class="col-lg-6">

                    <?php if($applicant['image']) {?>
                        <a href="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>"><img src="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>"
                                                                                                                                width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                    <?php } else { ?>
                        <img src="<?php echo base_url('/images/applicant')."/"."default_image";?>" width="150" height="150" style="margin-top: 10px;">
                    <?php } ?>
                    <h3 style="display: inline;"><?php echo $applicant['first_name']." ".$applicant['last_name']?></h3>

                    </div>


                <div class="col-lg-6 well">
                    <div class="form-group">

                        <label for="inputEmail" class="col-lg-3 control-label">Status</label>
                        <div class="col-lg-9">
                            <input type="hidden" value="<?php echo $applicant['applicant_id'];?>" name="applicant_id">
                            <select id="status" class="form-control" name="status" onchange="others(this.value)">
                                <option value="Initial State" <?php if($applicant['status']=="Initial State") echo "selected"?>>Initial State</option>
<!--                                <option value="Initial State">Initial State</option>-->
                                <option value="All Document Received" <?php if($applicant['status']=="All Document Received") echo "selected" ?>>All Document Received</option>
                                <option value="Apply for Visa" <?php if($applicant['status']=="Apply for Visa") echo "selected"?>>Apply for Visa</option>
                                <option value="Visa Received" <?php if($applicant['status']=="Visa Received") echo "selected"?>>Visa Received</option>
                                <option value="Complete" <?php if($applicant['status']=="Complete") echo "selected"?>>Complete</option>
                                <option value="Other" <?php if($applicant['status']!="All Document Received"&&
                                $applicant['status']!="Apply for Visa"&&
                                $applicant['status']!="Visa Received"&&
                                $applicant['status']!="Initial State"&&
                                $applicant['status']!="Complete"){ echo "selected";};?> onselect="others_t(this.value)">Other</option>
                            </select>


                        </div>

                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="status_s" id="status_s" value="<?php echo $applicant['status'];?>" placeholder="write here"
                                   style="margin-left:146px; margin-top: 10px; visibility:hidden ;" >
                        </div>
                        <script type="text/javascript">
                            function others(pqr){
                                var element = document.getElementById("status_s");
                                if (pqr=="Other")
                                {
                                    element.style.visibility="visible";
                                    element.value="";
                                }
                                else
                                {
                                    element.style.visibility="hidden";
                                }

                            }

                            function others_t(pqr){
                                var element = document.getElementById("status_s");
                                if (pqr=="Other")
                                {
                                    element.style.visibility="visible";
                                }
                                else
                                {
                                    element.style.visibility="hidden";
                                }

                            }
                        </script>

                    </div>
                    <div class="col-lg-2 ">
                        <div class="form-group">
                            <div class="col-lg-6">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm" style="margin-left: 400px; margin-top: 10px">
                            </div>
                        </div>
                    </div>

                    <a href="<?php echo base_url('index.php/admin_cont/home');?>" class="btn btn-success btn-sm" style="margin-left: 400px; margin-top: 10px">Cancel
                    </a>

                </div>


                </div>
            </div>

        </form>
    </div>
</section>

<script type="text/javascript">
    var status = document.getElementById('status');

    selected = status.value;
    document.getElementById('status_s').style.visibility="visible";
    document.getElementById('status_s').value= <?php echo $applicant['status'];?>;
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
