<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";

if(isset($_REQUEST['Enrgistrer']))
{

	$Nom	= $_REQUEST['txt_Nom'];	//textbox name "txt_firstname"
    $Prenom	= $_REQUEST['txt_Prenom'];
    $Adresse	= $_REQUEST['txt_Adresse'];
    $Ville	= $_REQUEST['txt_Ville'];
    $Tel	= $_REQUEST['txt_Tel'];
    $Observation	= $_REQUEST['txt_Observation'];

	try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO base_caissier(Nom,Prenom,Adresse,Ville,Tel,Observation) VALUES(:Nom,:Prenom,:Adresse,:Ville,:Tel,:Observation)'); //sql insert query					
				$insert_stmt->bindParam(':Nom',$Nom);   //bind all parameter
                $insert_stmt->bindParam(':Prenom',$Prenom); 
                $insert_stmt->bindParam(':Adresse',$Adresse); 
                $insert_stmt->bindParam(':Ville',$Ville); 
                $insert_stmt->bindParam(':Tel',$Tel); 
                $insert_stmt->bindParam(':Observation',$Observation); 

				if($insert_stmt->execute())
				{
					$insertMsg="Insert Successfully........"; //execute query success message
					header("Location:CAISSIERS.php"); //refresh 1 second and redirect to index.php page
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
<title>Ajouter un Caissier</title>
		
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
			
			<form method="post" class="form-horizontal" style="display: grid; grid-template-columns: 1fr 1fr; margin-top: 30px;">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Nom" class="form-control" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Prenom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Prenom" class="form-control"" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Adresse</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Adresse" class="form-control"" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Ville</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Ville" class="form-control"" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Tel</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Tel" class="form-control" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Observation</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Observation" class="form-control"" />
				</div>
				</div>
					
				<div class="form-group" style="margin-top: 30px;">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="Enrgistrer" class="btn btn-success " value="Insert">
				<a href="CAISSIERS.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>s