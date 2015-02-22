
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<html>
<head>
  <title>Print</title>
      <link href="css/application.min.css" rel="stylesheet" />
      <style type="text/css">
      body{
        background: White;
        color: Black;
      }
      h5,h3{
        color: Black;
      }
      </style>
</head>
<body>
<?php 
if(isset($_SESSION['student_rep']))
{
    $fields = "student_no,firstname,lastname,course,yr,section";
    $where = "";
    if(isset($_SESSION['fields'])){
        $sesField = $_SESSION['fields'];
        for ($i=0; $i < count($sesField); $i++) { 
            $fields .= ",".$sesField[$i];
        }
    }

    if((isset($_SESSION['year'])) || (isset($_SESSION['section'])) || (isset($_SESSION['course'])))
    {
        $where = "WHERE ";
    }    
    if(isset($_SESSION['year'])){
        $year = $_SESSION['year'];
        $where .= " yr = '".$year."'";
    }
    if(isset($_SESSION['section'])){
        $section = $_SESSION['section'];
        $where .= " AND section = '".$section."'";
    }
    if(isset($_SESSION['course'])){
        $course = $_SESSION['course'];
        if(isset($_SESSION['section'])){$where .= " AND course = '".$course."'";}
        else {$where .= " course = '".$course."'";}
    }
}// student vars

if(isset($_SESSION['teacher_rep']))
{
    $fields = "employee_no,firstname,lastname";

    if(isset($_SESSION['fields'])){
        $sesField = $_SESSION['fields'];
        for ($i=0; $i < count($sesField); $i++) { 
            $fields .= ",".$sesField[$i];
        }
    }

    
}// teacher vars
?>
<center>
   <form action="reports.php" method="post"> 
    <button type="submit">Back to Reports</button>
   </form>
   <button type="button" id="printB">Print</button>
</center>   
<?php
       if(isset($_POST['submit'])){
                unset($_SESSION['fields']);
                unset($_SESSION['section']);
                unset($_SESSION['year']);
                unset($_SESSION['sort']);
                unset($_SESSION['course']);
       }
?>

<div id="printDiv"><!-- this area will be printed--> 
<?php 
if(isset($_SESSION['student_rep']))
{//start of report of students    
$query = "SELECT ".$fields." FROM tblstudent ".$where." ORDER BY course,lastname";
echo "<center><h3>University of Makati</h3>";
echo "<h5>College of Computer Science</center></h5>";


$result = @mysql_query($query);
$row = mysql_fetch_array($result);
echo "<center>";
echo "<table class='table table-bordered'>";
    echo "<thead'>";
        echo "  <tr>";
        echo "      <th style='color:Black'>#</th>";
        echo "      <th style='color:Black'>Student No</th>";
        echo "      <th style='color:Black'>Name</th>";
        echo "      <th style='color:Black'>Year/Section</th>";
        if(isset($row['gender'])){echo "      <th style='color:Black'>Gender</th>";}
        if(isset($row['dob'])){echo "      <th style='color:Black'>Birthday</th>";}
        if(isset($row['contact_no'])){echo "      <th style='color:Black'>Contact No.</th>";}
        if(isset($row['add_no'])){echo "      <th style='color:Black'>Address</th>";}
        if(isset($row['course'])){echo "      <th style='color:Black'>Course</th>";}
        if(isset($row['password'])){echo "      <th style='color:Black'>Password</th>";}
        echo "  </tr>";
        echo "</thead>";

        echo "<tbody>";

        $a = 1;
        $result = @mysql_query($query);
        while($row = mysql_fetch_array($result))
        {

            if($row['yr'] == 'first'){ $yrandsec = 'I - '; } else if($row['yr'] == 'second'){ $yrandsec = 'II-'; }
            else if($row['yr'] == 'third'){ $yrandsec = 'III-'; } else if($row['yr'] == 'fourth') { $yrandsec = 'IV-';}
            else { $yrandsec = 'V';}

            if($row['section'] == "A"){ $yrandsec.="A";}
            else if($row['section'] == "B"){$yrandsec.="B";}
            else if($row['section'] == "C"){$yrandsec.="C";}
            else if($row['section'] == "D"){$yrandsec.="D";}
            else if($row['section'] == "E"){$yrandsec.="E";}
            if($row['course'] == "BS Information Technology major in Service Management"){ $yrandsec.="ITSM";}
            else if($row['course'] == "BS Computer Science"){$yrandsec.="CSAD";}
            else if($row['course'] == "BS Computer Network Administration"){$yrandsec.="CNA";}
            echo "  <tr>";
            echo "      <td>".$a++."</td>";
            echo "      <td>".$row['student_no']."</td>";
            echo "      <td>".$row['lastname']. ", " .$row['firstname']. "</td>";
            echo "      <td>".$yrandsec."</td>";
            if(isset($row['gender'])){echo "      <td>".$row['gender']."</td>";}
            if(isset($row['dob'])){echo "         <td>".$row['dob']."</td>";}
            if(isset($row['contact_no'])){echo "  <td>".$row['contact_no']."</td>";}
            if(isset($row['add_no'])){echo "      <td>".$row['add_no']."</td>";}
            if(isset($row['course'])){echo "      <td>".$row['course']."</td>";}
            if(isset($row['password'])){echo "    <td>".rtnDecrypt($row['password'])."</td>";}
            echo "  </tr>";
            echo "</tbody>";
        }

echo "</table>";
echo "</center>";
}// end of report of student

if(isset($_SESSION['teacher_rep']))
{
    $query = "SELECT ".$fields." FROM tblteacher ORDER BY lastname";
echo "<center>University of Makati <br>";
echo "College of Computer Science</center>";


$result = @mysql_query($query);
$row = mysql_fetch_array($result);
echo "<center>";
echo "<table border='1'>";
        echo "<thead>";
        echo "  <tr>";
        echo "      <th style='color:Black'>#</th>";
        echo "      <th style='color:Black'>Employee No</th>";
        echo "      <th style='color:Black'>Name</th>";
        if(isset($row['gender'])){echo "      <th style='color:Black'>Gender</th>";}
        if(isset($row['dob'])){echo "      <th style='color:Black'>Birthday</th>";}
        if(isset($row['contact_no'])){echo "      <th style='color:Black'>Contact No.</th>";}
        if(isset($row['add_no'])){echo "      <th style='color:Black'>Address</th>";}
        if(isset($row['emailadd'])){echo "      <th style='color:Black'>Email Address</th>";}
        if(isset($row['password'])){echo "      <th style='color:Black'>Password</th>";}
        echo "  </tr>";
        echo "</thead>";

        echo "<tbody>";

        $a = 1;

        $result = @mysql_query($query);
        while($row = mysql_fetch_array($result))
        {

            echo "  <tr>";
            echo "      <td>".$a++."</td>";
            echo "      <td>".$row['employee_no']."</td>";
            echo "      <td>".$row['lastname']. ", " .$row['firstname']. "</td>";
            if(isset($row['gender'])){echo "      <td>".$row['gender']."</td>";}
            if(isset($row['dob'])){echo "         <td>".$row['dob']."</td>";}
            if(isset($row['contact_no'])){echo "  <td>".$row['contact_no']."</td>";}
            if(isset($row['add_no'])){echo "      <td>".$row['add_no']."</td>";}
            if(isset($row['emailadd'])){echo "      <td>".$row['emailadd']."</td>";}
            if(isset($row['password'])){echo "    <td>".rtnDecrypt($row['password'])."</td>";}
            echo "  </tr>";
            echo "</tbody>";
        }

echo "</table>";
echo "</center>";
}
?>
</div>
  


</body>
</html>
<script src="lib/jquery/jquery.1.9.0.min.js"> </script>

<script type="text/javascript">
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Print', 'height=1000,width=1000');
        mywindow.document.write('<html><head><title>Print</title> <link href="css/application.min.css" rel="stylesheet" />');


        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('<style>body{ background: White; color: Black;} h5,h3{ color: Black;}</style></head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
    $(document).ready(function(){
      PrintElem("#printDiv");

      $("#printB").click(function(){
        PrintElem("#printDiv");
      });
    });


</script>