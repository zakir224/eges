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

    <script src="js/muJs.js"></script>
    <![endif]-->
</head>
<body>

<?php include_once('header_admin.php');?>


<section class="container">
    <div class="row">

            <div class="col-lg-12 well"  style="background: #ffffff;">

                <div class="col-lg-12">
                    <h3 style="font-size: xx-large">Dashboard</h3>
                    <hr>
                    <h4>Personal Files/Attachments</h4>
                    <div class="row">

                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" <?php if($applicant['passport'])
                                {echo 'checked';}else echo 'unchecked';?>> Passport
                            </label>
                        </div>
                    </div>
                    <h4>Educational Files/Attachments</h4>
                    <div class="row">
                        <div class="col-lg-4">

                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"
                                    <?php if($edu['ssc_certificate'])
                                    {echo 'checked';}else echo 'unchecked';?>> SSC Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"
                                    <?php if($edu['ssc_marksheet'])
                                    {echo 'checked';}else echo 'unchecked';?>> SSC Marks Sheet
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"
                                    <?php if($edu['hsc_certificate'])
                                    {echo 'checked';}else echo 'unchecked';?>> HSC Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"
                                    <?php if($edu['hsc_marksheet'])
                                    {echo 'checked';}else echo 'unchecked';?>> HSC Marks Sheet
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                    <?php if($edu['b_certificate'])
                                    {echo 'checked';}else echo 'unchecked';?>> Bachelors Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"
                                    <?php if($edu['b_marksheet'])
                                    {echo 'checked';}else echo 'unchecked';?>> Bachelors Marks Sheet
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"
                                    <?php if($edu['m_certificate'])
                                    {echo 'checked';}else echo 'unchecked';?>> Masters Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                    <?php if($edu['m_marksheet'])
                                    {echo 'checked';}else echo 'unchecked';?>> Masters Marks Sheet
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" <?php if(isset($edu_others[0]['other_edu_certificate']))
                                {if(!empty($edu_others[0]['other_edu_certificate']))echo 'checked';}?>> Other Papers
                            </label>
                        </div>
                    </div>
                    <h4>Financial Files/Attachments</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                    <?php if(isset($recom[0]['recom_letter']))
                                    {if(!empty($recom[0]['recom_letter']))echo 'checked';}?>> Recommendation Letter
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2" <?php if($finance['sop']) echo 'checked';?>> SOP
                            </label>
                            <label class="checkbox"> 
                                <input type="checkbox" id="inlineCheckbox3" value="option3" <?php if($finance['study_job_certificate']) echo 'checked';?>> Job Certificate
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" <?php if($finance['bank_solvency']) echo 'checked';?>> Bank Solvency
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"
                                    <?php if(isset($statement[0]['bank_statement']))
                                    {if(!empty($statement[0]['bank_statement']))echo 'checked';}?>> Bank statement
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                    <?php if(isset($finance_others[0]['other_certificate']))
                                    {if(!empty($finance_others[0]['other_certificate']))echo 'checked';}?>> Other Files
                            </label>
                        </div>
                    </div>

                </div>

            </div>

    </div>
</section>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- toolTip JS -->
<!-- End ToolTip JS -->

<script src="js/bootstrap.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
