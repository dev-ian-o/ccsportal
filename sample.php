 <?php
if(isset($_POST['submit2'])){
	echo $_POST['post_for'];
}

 ?>
 <form method="post">
                                               <input type="hidden" name="post_for" value="all">
                                               <button type='submit' name='submit2'>All</button>
                                           </form>