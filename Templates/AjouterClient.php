<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";

if(isset($_REQUEST['Enrgistrer']))
{

	$Nom	= $_REQUEST['txt_Nom'];	
	$Tel	= $_REQUEST['txt_Tel'];
    $FAX	= $_REQUEST['txt_FAX'];
    $Ville  = $_REQUEST['txt_Ville'];
    $Date_naissance	= $_REQUEST['txt_Date_naissance'];
    $Raison_sociale	= $_REQUEST['txt_Raison_sociale'];
    $Num_carte_fidelite	= $_REQUEST['txt_Num_carte_fidelite'];


	
		try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO base_client(Nom,Adresse,Tel,FAX,Ville,pays,Tel,Fax,Email) 
                VALUES(:Nom,:Adresse,:Tel,:FAX,:Ville,:pays,:Tel,:Fax,:Email)'); //sql insert query					
				$insert_stmt->bindParam(':Nom',$Nom);
				$insert_stmt->bindParam(':Tel',$Tel);
                $insert_stmt->bindParam(':FAX',$FAX);
                $insert_stmt->bindParam(':Ville',$Ville);
                $insert_stmt->bindParam(':Adresse',$Adresse);
                $insert_stmt->bindParam(':pays',$pays);
                $insert_stmt->bindParam(':Tel',$Tel);
                $insert_stmt->bindParam(':Fax',$Fax);
                $insert_stmt->bindParam(':Email',$Email);

				if($insert_stmt->execute())
				{
					$insertMsg="Insert Successfully........"; //execute query success message
					header("Location:CLIENTS.php"); //refresh 1 second and redirect to index.php page
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
<title>Ajouter un Client</title>
		
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
				<input type="text" name="txt_Nom" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Prenom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Prenom" class="form-control"/>
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Tel</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Tel" class="form-control"/>
				</div>
				</div>
                <div class="form-group">
				<label class="col-sm-3 control-label">Fax</label>
				<div class="col-sm-6">
				<input type="text" name="txt_FAX" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Ville</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Ville" class="form-control"/>
				</div>
				</div>
                
                <div class="form-group">
				<label class="col-sm-3 control-label">Date de naissance</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Date_naissance" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Raisonn sociale</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Raison_sociale" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Numero carte fidelite</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Num_carte_fidelite" class="form-control"" />
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Categorie Client</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Categorie_clt" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Banque</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Banque" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Compte_bancaire</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Compte_bancaire" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Nombre_Enfants</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Nombre_Enfants" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Pointure</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Pointure" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Taille</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Taille" class="form-control"/>
				</div>
				</div>

				<div class="form-group" style="margin-top: 30px;">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="Enrgistrer" class="btn btn-success " value="Insert">
				<a href="CLIENTS.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>