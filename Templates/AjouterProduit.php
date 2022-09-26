<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";

if(isset($_REQUEST['Enrgistrer']))
{

	$code_Produit	= $_REQUEST['txt_code_Produit'];	
	$code_Style	= $_REQUEST['txt_code_Style'];	
	$code_Famille	= $_REQUEST['txt_code_Famille'];
    $code_Collection	= $_REQUEST['txt_code_Collection'];
    $code_taille= $_REQUEST['txt_code_taille'];
    $code_TVA	= $_REQUEST['txt_code_TVA'];
    $Designation	= $_REQUEST['txt_Designation'];
    $Qte	= $_REQUEST['txt_Qte'];
    $Prix_TTC	= $_REQUEST['txt_Prix_TTC'];
    $Remise	= $_REQUEST['txt_Remise'];
    $Montant	= $_REQUEST['txt_Montant'];
    

	
		try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO Produit(code_Produit,code_Style,code_Famille,code_Collection,code_taille,code_TVA,Designation,Qte,Prix_TTC,Remise,Montant) 
                VALUES(:code_Produit,:code_Style,:code_Famille,:code_Collection,:code_taille,:code_TVA,:Designation,:Qte,:Prix_TTC,:Remise,:Montant)'); //sql insert query					
				$insert_stmt->bindParam(':code_Produit',$code_Produit);
				   

				if($insert_stmt->execute())
				{
					$insertMsg="Insert Successfully........"; //execute query success message
					header("Location:SOCIETE.php"); //refresh 1 second and redirect to index.php page
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
<title>Ajouter un Societe</title>
		
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
				<label class="col-sm-3 control-label">Raison sociale</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Raison_sociale" class="form-control" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Adresse</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Adresse" class="form-control"/>
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Ville</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Ville" class="form-control"/>
				</div>
				</div>
                <div class="form-group">
				<label class="col-sm-3 control-label">Pays</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Pays" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Tel</label>
				<div class="col-sm-6">
				<input type="number" name="txt_Tel" class="form-control"/>
				</div>
				</div>
                
                <div class="form-group">
				<label class="col-sm-3 control-label">FAX</label>
				<div class="col-sm-6">
				<input type="number" name="txt_FAX" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">EMAIL</label>
				<div class="col-sm-6">
				<input type="text" name="txt_EMAIL" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Num_post</label>
				<div class="col-sm-6">
				<input type="number" name="txt_Num_post" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Identification_fiscale</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Identification_fiscale" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Patente</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Patente" class="form-control"/>
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
				<input type="number" name="txt_Compte_bancaire" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Forme_jurdrique</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Forme_jurdrique" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">RC</label>
				<div class="col-sm-6">
				<input type="number" name="txt_RC" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">ICE</label>
				<div class="col-sm-6">
				<input type="number" name="txt_ICE" class="form-control"/>
				</div>
				</div>


			
				<div class="form-group" style="margin-top: 30px;">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="Enrgistrer" class="btn btn-success " value="Insert">
				<a href="SOCIETE.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>