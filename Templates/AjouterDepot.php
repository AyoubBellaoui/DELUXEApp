<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";

if(isset($_REQUEST['Enrgistrer']))
{

	$libelle	= $_REQUEST['txt_libelle'];	//textbox name "txt_firstname"
	$qte	= $_REQUEST['txt_qte'];	//textbox name "txt_lastname"
		
	try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO base_depot(libelle,qte) VALUES(:libelle,:qte)'); //sql insert query					
				$insert_stmt->bindParam(':libelle',$libelle);
				$insert_stmt->bindParam(':qte',$qte);   //bind all parameter
					
				if($insert_stmt->execute())
				{
					$insertMsg="Insert Successfully........"; //execute query success message
					header("Location:DEPOTS.php"); //refresh 1 second and redirect to index.php page
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	
}
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Ajouter un Depot</title>
		
</head>

	<body>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			
			<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">libelle</label>
				<div class="col-sm-6">
				<input type="text" name="txt_libelle" class="form-control" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Quantite</label>
				<div class="col-sm-6">
				<input type="number" name="txt_qte" class="form-control"/>
				</div>
				</div>
			
				<div class="form-group" style="margin-top: 30px;">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="Enrgistrer" class="btn btn-success " value="Insert">
				<a href="DEPOTS.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>