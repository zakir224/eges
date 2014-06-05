<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial information</title>

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
        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/admin/update_financial_info')?>">
            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo base_url('index.php/admin/personal_info')."/".$financial['applicant_id']?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Personal Information</a></li>
                    <li  class="active"><a href="<?php echo base_url('index.php/admin/financial_info')."/".$financial['applicant_id']?>"><span class="glyphicon glyphicon-usd"></span>&nbsp;Financial Information</a></li>
                    <li><a href="<?php echo base_url('index.php/admin/education_info')."/".$financial['applicant_id']?>"><span class="glyphicon glyphicon-book"></span>&nbsp;Educational Information</a></li>
                    <li><a href="<?php echo base_url('index.php/admin/preferences')."/".$financial['applicant_id']?>"><span class="glyphicon glyphicon-tags"></span>&nbsp; Preference</a></li>
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

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Yearly Expense</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="yearly_expense" id="first_name" value="<?php echo $financial['yearly_expense'] ?>" placeholder="Yearly Expense">
                        </div>
                    </div>
                <input type="hidden" value="<?php echo $applicant['applicant_id'];?>" name="applicant_id">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Relative Information</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="relative_info" id="inputEmail" value="<?php echo $financial['relative_info'] ?>" placeholder="Relative Information">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Relative Support</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="relative_support" id="inputEmail" value="<?php echo $financial['relative_support'] ?>" placeholder="Relative Support">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Recommendation Letter </label>
                        <div class="col-lg-5">
                            <?php if(count($recom_letter)>0)
                                for($i=0;$i<count($recom_letter);$i++){?>
                                    <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$recom_letter[$i]['recom_letter'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$recom_letter[$i]['recom_letter'];?>"
                                                                                                                                                              width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                <?php }?>
                            <input type="file" name="recom_letter[]" multiple="multiple">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Statement of Purpose</label>
                        <div class="col-lg-5">
                            <?php if($financial['sop']) {?>
                                <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['sop'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['sop'];?>"
                                                                                                                             width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                            <input type="file" name="sop">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Job Certificate</label>
                        <div class="col-lg-5">
                            <?php if($financial['study_job_certificate']) {?>
                                <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['study_job_certificate'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['study_job_certificate'];?>"
                                                                                                                             width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                            <input type="file" name="study_job_certificate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Other Certificates</label>
                        <div class="col-lg-5">
                            <?php if(count($other_certificate)>0)
                                    for($i=0;$i<count($other_certificate);$i++){?>
                                <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$other_certificate[$i]['other_certificate'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$other_certificate[$i]['other_certificate'];?>"
                                                                                                                             width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                            <input type="file" multiple="multiple" name="other_certificate[]">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Sponsor Information</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="sponsor_info" id="inputEmail" value="<?php echo $financial['sponsor_info'] ?>" placeholder="Sponsor Information">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Bank Name</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="bank" id="inputEmail" value="<?php echo $financial['bank'] ?>" placeholder="Bank Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Bank Amount</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="bank_amount" id="inputEmail" value="<?php echo $financial['bank_amount'] ?>" placeholder="Bank Amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Bank Solvency</label>
                        <div class="col-lg-5">
                            <?php if($financial['bank_solvency']) {?>
                                <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['bank_solvency'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$financial['bank_solvency'];?>"
                                                                                                                             width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                            <input type="file" name="bank_solvency">
                        </div>
                    </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Bank statement</label>
                    <div class="col-lg-5">
                        <?php if(count($bank_statement)>0)
                            for($i=0;$i<count($bank_statement);$i++){?>
                                <a href="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$bank_statement[$i]['bank_statement'];?>"><img src="<?php echo base_url('/images')."/".$financial['applicant_id']."/".$bank_statement[$i]['bank_statement'];?>"
                                                                                                                                                                width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                        <input type="file" name="bank_statement[]" multiple="multiple">
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
<script src="<?php echo base_url('/')?>js/bootstrap.min.js"></script>
</body>
</html>
