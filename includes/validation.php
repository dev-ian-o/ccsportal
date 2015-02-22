<?php
/*
//chapter1
dis($ch11);
dis($ch12);
//chapter2
dis($ch22);
dis($ch21);
//chapter3
dis($ch31);
dis($ch32);
dis($ch33);
//chapter4
dis($ch41);
dis($ch42);
dis($ch43);
//chapter5
dis($ch51);
dis($ch52);
dis($ch53);

disExam($ch12,$exam1);
disExam($ch22,$exam2);
disExam($ch33,$exam3);
disExam($ch43,$exam4);
disExam($ch53,$exam5);
*/


function dis($dis){

	if($dis)
	echo " ";
	else
	echo "dis";	
}

function disExam($dis,$exam){
	if(($exam))
	echo " ";
	else
	echo "dis";	
}
function con($chap,$ch53){
    
    if(($chap))
    {	
     $user = $_SESSION['user_id'];
     $query = " UPDATE users SET {$chap}='1' WHERE user_no='$user' ";
     $result = @mysql_query($query);
    }
    if(($ch53))
    return false;
                     
}
function test(){
	 if (isset($_GET['test1']))
    {
     $user = $_SESSION['user_id'];
     $test = $_GET['test1'];
     $query = " UPDATE users SET exam1='$test' WHERE user_no='$user' ";
     $result = @mysql_query($query);   
    } 
    if (isset($_GET['test2']))
    {
     $user = $_SESSION['user_id'];
     $test = $_GET['test2'];
     $query = " UPDATE users SET exam2='$test' WHERE user_no='$user' ";
     $result = @mysql_query($query);   
    } 
    if (isset($_GET['test3']))
    {
     $user = $_SESSION['user_id'];
     $test = $_GET['test3'];
     $query = " UPDATE users SET exam3='$test' WHERE user_no='$user' ";
     $result = @mysql_query($query);    
    } 
    if (isset($_GET['test4']))
    {
        
     $user = $_SESSION['user_id'];
     $test = $_GET['test4'];
     $query = " UPDATE users SET exam4='$test' WHERE user_no='$user' ";
     $result = @mysql_query($query);  
    } 
    if (isset($_GET['test5']))
    {
     $user = $_SESSION['user_id'];
     $test = $_GET['test5'];
     $query = " UPDATE users SET exam2='$test5' WHERE user_no='$user' ";
     $result = @mysql_query($query);  
    } 
}


?>