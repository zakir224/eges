<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal information</title>

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
        <form action="<?php echo base_url('index.php/admin/update_personal_info')?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li  class="active"><a href="<?php echo base_url('index.php/admin/personal_info')."/".$applicant['applicant_id']?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Personal Information</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/financial_info')."/".$applicant['applicant_id']?>"><span class="glyphicon glyphicon-usd"></span>&nbsp;Financial Information</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/education_info')."/".$applicant['applicant_id']?>"><span class="glyphicon glyphicon-book"></span>&nbsp;Educational Information</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/preferences')."/".$applicant['applicant_id']?>"><span class="glyphicon glyphicon-tags"></span>&nbsp; Preference</a></li>
                    </ul>

                    <p class="navbar-text navbar-right" style="font-size: 10pt;">Signed in for <span class="alert-danger"><?php echo $applicant['first_name']." ".$applicant['last_name']?></span></p>

                    <hr>
                    <?php
                       if($s)
                         if($s==TRUE) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" aria-hidden="true" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> Update successful.
                    </div>
<?php } ?>
                    <script type="text/javascript">
                        $(".alert").alert()
                    </script>
                    <div class="col-lg-6">
                        <input type="hidden" value="<?php echo $applicant['applicant_id'];?>" name="applicant_id">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $applicant['first_name'];?>" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="last_name" id="inputEmail" value="<?php echo $applicant['last_name'];?>" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Father's Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="father_name" id="inputEmail" value="<?php echo $applicant['father_name'];?>" placeholder="Father's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Mother's Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="mother_name" id="inputEmail" value="<?php echo $applicant['mother_name'];?>" placeholder="Mother's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="gender" >
                                    <option value="Male" <?php if($applicant['gender']=='Male'){echo "selected";} ?>>Male</option>
                                    <option value="Female" <?php if($applicant['gender']=='Female'){echo "selected";} ?>>Female</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Date Of Birth</label>
                            <div class="col-lg-9">
                                <input type="date" class="form-control" name="d_o_b" id="inputEmail" value="<?php echo $applicant['d_o_b'];?>" placeholder="Date Of Birth">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Present Address</label>
                            <div class="col-lg-9">
                                <textarea type="text" class="form-control" name="present_add" id="inputEmail" placeholder="Present Address"><?php echo $applicant['present_add'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Permanent Address</label>
                            <div class="col-lg-9">
                                <textarea type="text" class="form-control" name="parmanent_add" id="inputEmail" placeholder="Permanent Address"><?php echo $applicant['parmanent_add'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">E-mail</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $applicant['email'];?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="mobile" id="inputEmail" value="<?php echo $applicant['mobile'];?>" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Guardian Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="guardian_mobile" id="inputEmail" value="<?php echo $applicant['guardian_mobile'];?>" placeholder="Guardian Mobile Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Religion</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="religion" id="religion" value="<?php echo $applicant['religion'];?>" placeholder="Religion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Passport No</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="passport_no" id="passport_no" value="<?php echo $applicant['passport_no'];?>" placeholder="Passport No">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">National ID</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="national_id" id="national_id" value="<?php echo $applicant['national_id'];?>" placeholder="National ID">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">IELTS Score </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="ielts_toefl_score" id="inputEmail" value="<?php echo $applicant['ielts_toefl_score'];?>" placeholder="IELTS Score">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">GRE </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="gre_gmat_score" id="inputEmail" value="<?php echo $applicant['gre_gmat_score'];?>" placeholder="GRE">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Photo</label>

                            <div class="col-lg-9">
                                <input type="file" name="image">
                            </div>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Passport</label>

                            <div class="col-lg-9">
                                <?php if($applicant['passport']) {?>
                                    <a href="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['passport'];?>"><img src="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['passport'];?>"
                                                                                                                                                      width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                <?php }?>
                                <input type="file" name="passport">
                            </div>
                            <br>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm" style="margin-left: 400px">
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </form>
    </div>
</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('/')?>js/bootstrap.min.js"></script>
</body>
</html>
