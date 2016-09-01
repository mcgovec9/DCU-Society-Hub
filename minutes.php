<?php
   include 'pageheader.php';
   ?>
<!-- Page Content -->
<div class="container">
<!-- Introduction Row -->
<div class="row">
   <div class="col-lg-12">
      <img src="img/minutes.png" alt="DCU Society" style="float:left;width:100px;height:100px">
      <h1 class="page-header">Minutes </h1>
   </div>
</div>
<div>
   <?php
      $society = $user_data['society'];
      if(isset($_GET['success']) && empty($_GET['success'])){
      	//echo 'Member has been added to society list';
      }
      else{
      	if(empty($_POST) == false){
      		$minutes = array(
      			'date' 		=> $_POST['date'],
      			'subject' 	=> $_POST['subject'],
      			'content' 	=> $_POST['content'],
      		);
      		
      			//holds name of the society
      		
      		add_minutes($society, $minutes);
      
      		header('Location: minutes.php');
      		exit();
      	}
      	
      }
      
      ?>	
   <form action="" method="post">
      <table>
         <tr>
            <td align="left"><input type = "text" name="subject" value placeholder="Subject"/></td>
         </tr>
         <tr>
            <td align="left"><input type="date" name="date"/></td>
         </tr>
         <tr>
            <td align="left"><textarea cols="100" rows="20" name="content"></textarea></td>
         </tr>
         <tr>
            <td align="right"><input style= "color:white; background-color:#3498db" type="submit" value="Save"/></td>
         </tr>
      </table>
   </form>
   <br>
   <?php display_minutes($society) ?>
</div>
<hr>
<!-- Footer -->
<?php 
   include 'pagefooter.php';
   ?>