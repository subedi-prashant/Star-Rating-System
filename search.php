
<?php

$con = new PDO("mysql:host=localhost;dbname=rating_system",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `item` WHERE name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<!-- bootstrap link -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
<nav class="navbar w-75 m-auto navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RestroRating.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register here</a>
      </li>
    
    </ul>
    <form method="POST"  action="search.php">
          <div class="form-group row">
            <div class="col-xs-3">
              <input class="form-control input-lg" id="ex2" type="text" name="search" placeholder="search">
            </div>
            <div class="col">
              <button type="submit" name="submit" class="btn btn-dark btn">Search</button>
            </div>
          </div>
          </form>
  </div>
</nav>
		<br><br>
		<center>
    		<h2>Search results</h2>
		</center>
		<div class="row w-75 m-auto">
            <div class="col-sm-3" >
			    <img class="product_image" src="image/<?php echo $row->image; ?>" style="width:250px;height:168px;padding-top:10px;margin:5px;">
		    </div>
			<div class="col-sm-8">
                <h4 style="margin-top:10px;"><?php echo $row->name; ?></h4>
                <a href="show_rating.php?item_id=<?php echo $row->id; ?>">Rating & Reviews</a>
                <?php echo $row->description;?>
            </div>
        </div>
<?php 
	}
		else{
			echo "Name Does not exist";
		}


}

?>