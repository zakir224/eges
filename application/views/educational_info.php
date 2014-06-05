<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Education information</title>

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
<body >
<?php include_once('header.php');?>


<section class="container">
    <div class="row" style="">
        <form action="<?php echo base_url('index.php/admin/update_education_info')?>" class="form-horizontal"  role="form" method="post" enctype="multipart/form-data">

            <div class="col-lg-12 well divShadow" style="background: #ffffff">
                <div class="col-lg-12" >

                    <ul class="nav nav-tabs">
                        <li><a href="<?php echo base_url('index.php/admin/personal_info')."/".$educational['applicant_id']?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Personal Information</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/financial_info')."/".$educational['applicant_id']?>"><span class="glyphicon glyphicon-usd"></span>&nbsp;Financial Information</a></li>
                        <li  class="active"><a href="<?php echo base_url('index.php/admin/education_info')."/".$educational['applicant_id']?>"><span class="glyphicon glyphicon-book"></span>&nbsp;Educational Information</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/preferences')."/".$educational['applicant_id']?>"><span class="glyphicon glyphicon-tags"></span>&nbsp; Preference</a></li>
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


                    <div class="col-lg-6" >
                        <input type="hidden" name="applicant_id" value="<?php echo $educational['applicant_id']; ?>">
                        <div class="well" style="background: #ffffff;height: 675px;">
                            <h4>Secondary/Equivalent level</h4>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Result(gpa)</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ssc_gpa_result" id="first_name" value="<?php echo $educational['ssc_gpa_result']; ?>" placeholder="Result(gpa)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Institution</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ssc_institution" id="inputEmail" value="<?php echo $educational['ssc_institution']; ?>" placeholder="Institution">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Board</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ssc_board" id="inputEmail" value="<?php echo $educational['ssc_board']; ?>" placeholder="Board">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Passing Year</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ssc_passing_year" id="inputEmail" value="<?php echo $educational['ssc_passing_year']; ?>" placeholder="Passing Year">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">certificate</label>
                                    <div class="col-lg-9">
                                        <?php if($educational['ssc_certificate']) {?>
                                            <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['ssc_certificate'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['ssc_certificate'];?>" width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                        <?php }?>
                                    <input type="file" name="ssc_certificate">
                                    </div>
                             </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Mark sheet</label>
                                    <div class="col-lg-9">
                                        <?php if($educational['ssc_marksheet']) {?>
                                            <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['ssc_marksheet'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['ssc_marksheet'];?>"
                                                                                                                                                                  width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                        <?php }?>
                                    <input type="file" name="ssc_marksheet">
                                    </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-lg-6">

                        <div class="well" style="background: #ffffff;height: 675px;">
                            <h4>Intermediate/equivalent level</h4>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Result(gpa)</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="hsc_gpa_result" id="first_name" placeholder="" value="<?php echo $educational['hsc_gpa_result']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Institution</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="hsc_institution" id="inputEmail" placeholder="" value="<?php echo $educational['hsc_institution']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Board</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="hsc_board" id="inputEmail" placeholder="" value="<?php echo $educational['hsc_board']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Passing Year</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="hsc_passing_year" id="inputEmail" placeholder="" value="<?php echo $educational['hsc_passing_year']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Certificate</label>

                                <div class="col-lg-9">
                                    <?php if($educational['hsc_certificate']) {?>
                                        <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['hsc_certificate'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['hsc_certificate'];?>"
                                                                                                                                       width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                    <?php }?>
                                    <input type="file" name="hsc_certificate">
                                </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-3 control-label">Mark sheet</label>
                                    <div class="col-lg-9">
                                        <?php if($educational['hsc_marksheet']) {?>
                                            <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['hsc_marksheet'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['hsc_marksheet'];?>"
                                                                                                                                                                  width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                        <?php }?>


                                    <input type="file" name="hsc_marksheet">
                                    </div>
                                </div>
                            </div>
                        </div>


                <div class="col-lg-12" style="background: #ffffff">


                    <div class="col-lg-6">
                        &nbsp;
                        <div class="well" style="background: #ffffff;height: 670px;">
                            <h4>Bachelors</h4>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Result(gpa)</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_gpa_result" id="first_name" placeholder="" value="<?php echo $educational['b_gpa_result']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Institution</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_institution" id="inputEmail" placeholder="" value="<?php echo $educational['b_institution']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Board</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_subject" id="inputEmail" placeholder="" value="<?php echo $educational['b_subject']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Passing Year</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_passing_year" id="inputEmail" placeholder="" value="<?php echo $educational['b_passing_year']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Certificate</label>

                                <div class="col-lg-9">
                                    <?php if($educational['b_certificate']) {?>
                                        <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['b_certificate'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['b_certificate'];?>"
                                                                                                                                       width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                    <?php }?>
                                    <input type="file" name="b_certificate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Mark sheet</label>
                                <div class="col-lg-9">
                                    <?php if ($educational['b_marksheet']) { ?>
                                        <a href="<?php echo base_url('/images') . "/" . $educational['applicant_id'] . "/" . $educational['b_marksheet']; ?>"><img
                                                src="<?php echo base_url('/images') . "/" . $educational['applicant_id'] . "/" . $educational['b_marksheet']; ?>"
                                                width="150" height="150"
                                                style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                    <?php } ?>
                                    <input type="file" name="b_marksheet">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        &nbsp;
                        <div class="well" style="background: #ffffff;height: 670px;">
                            <h4>Masters</h4>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Result(gpa)</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="m_gpa_result" id="first_name" placeholder="" value="<?php echo $educational['m_gpa_result']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Institution</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="m_institution" id="inputEmail" placeholder="" value="<?php echo $educational['m_institution']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Board</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="m_subject" id="inputEmail" placeholder="" value="<?php echo $educational['m_subject']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Passing Year</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="m_passing_year" id="inputEmail" placeholder="" value="<?php echo $educational['m_passing_year']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Certificate</label>

                                <div class="col-lg-9">
                                    <?php if($educational['m_certificate']) {?>
                                        <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['m_certificate'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['m_certificate'];?>"
                                                                                                                   width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                    <?php }?>
                                    <input type="file" name="m_certificate">
                                </div>
                                </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Mark sheet</label>
                                    <div class="col-lg-9">
                                        <?php if($educational['m_marksheet']) {?>
                                            <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['m_marksheet'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$educational['m_marksheet'];?>"
                                                                                                                                                                  width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                        <?php }?>


                                    <input type="file" name="m_marksheet">

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


     <div class="col-lg-12">
         <div class="well" style="background: #ffffff">
<!---->
<!--            <div class="well" style="background: #ffffff">-->
                <h4>Other education</h4>

                <!--                    <div class="form-group">-->
                <!--                        <label for="inputEmail" class="col-lg-3 control-label">Title</label>-->
                <!--                        <div class="col-lg-9">-->
                <!--                            <input type="text" class="form-control" name="other_title" id="inputEmail" placeholder="" value="--><?php //echo $other_education[0]['other_title']; ?><!--">-->
                <!--                        </div>-->
                <!--                    </div>-->

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Other Educational Certificates</label>
                    <div class="col-lg-5">
                        <?php if(count($other_education)>0)
                            for($i=0;$i<count($other_education);$i++){?>
                                <a href="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$other_education[$i]['other_edu_certificate'];?>"><img src="<?php echo base_url('/images')."/".$educational['applicant_id']."/".$other_education[$i]['other_edu_certificate'];?>"
                                                                                                                                                                    width="150" height="150" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                            <?php }?>
                        <input type="file" multiple="multiple" name="other_education[]">
                    </div>
                </div>

             </div>
            </div>

        </form>
    </div>
    <div class="col-lg-16">
        <div class="form-group">
            <div class="col-lg-9">
                <input type="submit" value="Update" class="btn btn-primary btn-group-sm" style="margin-left: 400px;">
            </div>
        </div>
    </div>
</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('/')?>js/bootstrap.min.js"></script>
</body>
</html>
