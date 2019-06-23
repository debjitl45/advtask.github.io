<!DOCTYPE html>
<html>
<head>
	<title>Bill Split App</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
    <div class="logout">
    <a  href="logout.php"><button class="btn btn-danger"><h4>Logout</h4></button></a>
    </div>
</head> 
<body>
    
    <h1>Bill Splitter Saving Your 💰</h1>

    
    <h4> Welcome!! <?php echo $_SESSION['username']; ?> </h4>
    
    
    <script type="text/javascript">
        var Bill = prompt('Enter the bill');
        alert('Everybody should pay 50 or more');
        while(Bill<50)
        {
            alert("Bill must be greater than 50");
            Bill = prompt('Enter the bill');
            alert('Everybody should pay 50 or more');
        }
     </script>
     
	
	<?php require_once 'process.php'; ?>

    <?php  if(isset($_SESSION['message'])): ?>
    	<div class="alert alert-<?=$_SESSION['msg_type']?>">
    		<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['mesaage']);
    		?>
       	</div>
       <?php endif ?>
<div class="container">

	<?php 
	      $mysqli = new mysqli('localhost','root','','data') or die(mysqli_error($mysqli));
	      $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
	?>
        <div class="row justify-content-center">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>Girl Name</th>
        				<th>Pay</th>
                        <th>Time</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()):?>
                	<tr>
                		<td><?php echo $row['name']; ?></td>
                		<td><?php echo $row['pay']; ?></td>
                        <td><?php echo date("d/m/Y"); ?></td>
                        
                		<td>
                			<a href="index.php?edit=<?php echo $row['id']; ?>" 
                				class="btn btn-info">Edit</a>
                				<a href="process.php?delete=<?php echo $row['id']; ?>"
                					class="btn btn-danger">Delete</a>
                		</td>
                	</tr>
        		<?php endwhile; ?>
        	</table>
        	


        </div>



	<?php
          
          function pre_r($array){
          	echo '<pre>';
          	print_r($array);
          	echo '</pre>';
          }

    ?>
    




	<div class="row justify-content-center">
<form action="process.php" method="POST">
	<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control" value="<?php echo $name;?>"   placeholder="Enter girl's name" required>
    </div>
<div class="form-group">
	<label>Pay</label>
	<input type="number" name="pay" class="form-control" value="<?php echo $pay; ?>"  placeholder="Enter Pay" rqeuired>
</div>

	    <div class="form-group">
		<button type="submit" name="save" class="btn btn-primary" >Save!</button> 
		</div> 
</form>
</div>
</div>
</body>
</html>
