<html xmlns="http://www.w3.org/1999/xhtml"><head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Resume | First Last</title>
    <!-- Bootstrap -->

    <meta name="robots" content="noindex, nofollow">
    <style type="text/css" media="all">
        html{
            background-color:#FFF;
            padding:0 1em;
        }
        body {
            background-color:#FFF;
            font-family:"Trebuchet MS";
            padding:1em;
            margin:1em auto;
            max-width: 50em;
        }
        #address{
            height:7em;
            width:48em;
            padding:1em;
        }
        #address div{
            width:16em;
            float:left;
        }
        #address h3{
            border-bottom: none;
            font-variant: small-caps;
            margin-top: 0;
        }
        .date {
            float:right;
            font-size:.8em;
            margin-top:.4em;
            text-align:right;
        }
        abbr, acronym{
            border-bottom:1px dotted #333;
            cursor:help;
        }
        address{
            font-style:italic;
            color:#333;
            font-size:.9em;
        }
        .content{
            width:30em;
            margin:0 0 0 16em;
        }
        .section{
            border-top:1px solid #ccc;
            margin:1em 0;
            padding:1em;
        }
        ul{
            padding-left:.5em;
            margin-left:.5em;
        }
        h1{
            margin:1em 0 1em 9.5em;
            font-size:1.75em;
        }
        h2 {
            width:14em;
            float:left;
            font-size:1em;
            font-variant: small-caps;
            letter-spacing: .06em;
        }
        h3 {margin-bottom: 0;}
    </style>
    <style type="text/css" media="print">
        body {
            background-color:#FFF;
            border-width:0 0 0 0;
            margin:0;
            width:100%
        }
    </style>

</head>
<body>
<h1>Applicant CV</h1>

<div id="address">

    <div id="" style="margin-left: 150px">
        <h3><?php echo $applicant['first_name']." ".$applicant['last_name'];?></h3>
        <a href="#"><?php echo $applicant['email'];?></a> <br>
        <?php echo $applicant['mobile'];?><br>
        <?php echo $applicant['present_add'];?>
    </div>
    <div >
        <?php if($applicant['image']) {?>
            <a href="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>">
                <img style="margin-top: 10px;" src="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>" width="120"></a>
        <?php }?>
    </div>

</div>

<div class="section">
    <h2>Personal Information</h2>
    <div class="content" style="margin-top: 35px;">

        <label>Father's Name  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal;"><?php echo $applicant['father_name'];?></span><br>
        <label>Mother's Name  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo $applicant['mother_name'];?></span><br>
        <label>Date Of Birth  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo $applicant['d_o_b'];?></span><br>
        <label>Permanent Address  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo $applicant['parmanent_add'];?></span><br>
        <label>Guardian Mobile  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "012312323";?></span><br>
        <label>Religion  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "Muslim";?></span><br>
        <label>Passport No  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "4535-453-34534";?></span><br>
        <label>National ID  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "34234-234-23432";?></span><br>

        <label>IELTS Score  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "7.5";?></span><br>
        <label>GRE  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "5";?></span><br>
    </div>
</div>

<div class="section">
    <h2>Educational Information</h2>
    <div class="content" style="margin-top: 35px; " >

        <table class="" border="1" style="text-align: center; font-size: 13px; width: 100%">
            <tr>
                <th width="25%" style="text-align: center">Education Name</th>
                <th width="15%" style="text-align: center">Result</th>
                <th style="text-align: center">Institute Name</th>
                <th width="15%" style="text-align: center">Passing Year</th>
            </tr>

            <tr>
                <td >Secondary/Equivalent level</td>
                <td ><?php echo $edu["ssc_gpa_result"]?></td>
                <td><?php echo $edu["ssc_institution"]?></td>
                <td ><?php echo $edu["ssc_passing_year"]?></td>

            </tr>
            <tr>
                <td>Intermediate/equivalent level</td>
                <td >4.90</td>
                <td>Bir Shreshtha Noor Mohammad Rifle Public School and College</td>
                <td >2009</td>

            </tr>

            <tr>
                <td >Bachelors</td>
                <td >3.85</td>
                <td>United International University</td>
                <td >2014</td>

            </tr>
            <tr>
                <td >Masters</td>
                <td >3.85</td>
                <td>United International University</td>
                <td>2014</td>

            </tr>

        </table>
    </div>
</div>

<div class="section">
    <h2>Financial Information</h2>
    <div class="content">
        <label>Yearly Expense  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal;"><?php echo "1000000/-";?></span><br>
        <label>Relative Information  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "fsdfds asdasd";?></span><br>
        <label>Relative Support  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "asdasdsadas";?></span><br>
        <label>Sponsor Information  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "sdfasfsf";?></span><br>
        <label>Bank Name  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "sfdsfsdf";?></span><br>
        <label>Bank Amount  :</label>&nbsp;&nbsp;
        <span style="font-size: 14;font-style: normal"><?php echo "1870000/-";?></span><br>

    </div>
</div>



</body></html>