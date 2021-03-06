<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

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
    <script src="js/muJs.js"></script>
    <![endif]-->
</head>
<body>

<?php include_once('header_admin.php');?>


<section class="container">
    <div class="row">

        <form  role="form">
            <div class="col-lg-12 well"  style="background: #ffffff;">


                <h3>List of Applicants</h3>
                <table id="example" class="col-lg-12 table table-hover table-bordered" style="width: 100%" >
                    <thead>
                    <tr>
                        <th style="">Applicant ID</th>
                        <th style="">Applicant Name</th>
                        <th style="">Applicant Status</th>
                        <th style="">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i=0;$i<count($applicant);$i++) { ?>
                        <tr>
                            <td><?php echo $applicant[$i]['applicant_id'];?></td>
                            <td><?php echo $applicant[$i]['first_name'].' '.$applicant[$i]['last_name'];?></td>
                            <td><?php  echo $app_status[$i]['status']; ?></td>

                            <td>
                                <p>

                                    <a href="<?php echo base_url('index.php/admin_cont/applicantFile')."/".$applicant[$i]['applicant_id'];?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top"
                                       title="Dashboard" >
                                        <span class="glyphicon glyphicon-book" ></span>
                                    </a>
                                    <a href="<?php echo base_url('index.php/admin_cont/applicantStatus')."/".$applicant[$i]['applicant_id'];?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update Status">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>


                                    <a href="<?php echo base_url('index.php/admin_cont/delete_applicant')."/".$applicant[$i]['applicant_id'];?>" onclick="return show_me()" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                       title="Delete" >
                                        <span class="glyphicon glyphicon-remove-sign" ></span>
                                    </a>

                                    <a href="<?php echo base_url('index.php/admin_cont/applicantCv')."/".$applicant[$i]['applicant_id'];?>"  class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                       title="Applicant CV" >
                                        <span class="glyphicon glyphicon-user" ></span>
                                    </a>

                                    <a href="<?php echo base_url('index.php/welcome/downloadAttachment/')."/".$applicant[$i]['applicant_id'];?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Download">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>
                                </p>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

</tbody>
</table>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    function show_me()
    {
        var x;
        var r=confirm("Are You Sure? Cancel to terminate.");
        if (r==true)
        {
            return true;
        } else
        return false;

    }
</script>
<script>
    $(function(){
        $("#example").dataTable();
    })
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/tooltip.js"></script>
<script src="js/tooltrip.js"></script>
<!-- toolTip JS -->
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip({
        'placement': 'top'
    });
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        'placement': 'top'
    });

    $('#userNameField').tooltip({
        'show': true,
        'placement': 'bottom',
        'title': "Please remember to..."
    });

    $('#userNameField').tooltip('show');

</script>
<!-- End ToolTip JS -->
<script src="https://code.jquery.com/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        $('#example').dataTable();
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
