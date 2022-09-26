<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";

if(isset($_REQUEST['Enrgistrer']))
{

	$Raison_sociale	= $_REQUEST['txt_Raison_sociale'];	//textbox name 
	$Adresse	= $_REQUEST['txt_Adresse'];	//textbox name 
	$Ville	= $_REQUEST['txt_Ville'];
    $Pays	= $_REQUEST['txt_Pays'];
    $Tel= $_REQUEST['txt_Tel'];
    $FAX	= $_REQUEST['txt_FAX'];
    $EMAIL	= $_REQUEST['txt_EMAIL'];
    $Banque	= $_REQUEST['txt_Banque'];
    $Compte_bancaire	= $_REQUEST['txt_Compte_bancaire'];
    $Page_acceuille	= $_REQUEST['txt_Page_acceuille'];
    $Observation	= $_REQUEST['txt_Observation'];
    $Contact	= $_REQUEST['txt_Contact'];
    $Identification_fiscale	= $_REQUEST['txt_Identification_fiscale'];
    $Categorie_fr	= $_REQUEST['txt_Categorie_fr'];

	
		try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO base_fournisseur(Raison_sociale,Adresse,Ville,Pays,Tel,FAX,EMAIL,Banque,Compte_bancaire,Page_acceuille,Observation,Contact,Identification_fiscale,Categorie_fr) 
                VALUES(:Raison_sociale,:Adresse,:Ville,:Pays,:Tel,:FAX,:EMAIL,:Banque,:Compte_bancaire,:Page_acceuille,:Observation,:Contact,:Identification_fiscale,:Categorie_fr)'); //sql insert query					
				$insert_stmt->bindParam(':Raison_sociale',$Raison_sociale);
				$insert_stmt->bindParam(':Adresse',$Adresse);   
				$insert_stmt->bindParam(':Ville',$Ville);
                $insert_stmt->bindParam(':Pays',$Pays);
                $insert_stmt->bindParam(':Tel',$Tel);
                $insert_stmt->bindParam(':FAX',$FAX);
                $insert_stmt->bindParam(':EMAIL',$EMAIL);
                $insert_stmt->bindParam(':Compte_bancaire',$Compte_bancaire);
                $insert_stmt->bindParam(':Page_acceuille',$Page_acceuille);
                $insert_stmt->bindParam(':Observation',$Observation);
                $insert_stmt->bindParam(':Contact',$Contact);
                $insert_stmt->bindParam(':Identification_fiscale',$Identification_fiscale);
                $insert_stmt->bindParam(':Categorie_fr',$Categorie_fr);

				if($insert_stmt->execute())
				{
					$insertMsg="Insert Successfully........"; //execute query success message
					header("Location:FOURNISSEURS.php"); //refresh 1 second and redirect to index.php page
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
<title>Ajouter un Fournisseur</title>
		
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
				<input type="text" name="txt_Raison_sociale" class="form-control"" />
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
				<input type="text" name="txt_Tel" class="form-control"/>
				</div>
				</div>
                
                <div class="form-group">
				<label class="col-sm-3 control-label">FAX</label>
				<div class="col-sm-6">
				<input type="text" name="txt_FAX" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">EMAIL</label>
				<div class="col-sm-6">
				<input type="text" name="txt_EMAIL" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Banque</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Banque" class="form-control"" />
				</div>
				</div>
						
				<div class="form-group">
				<label class="col-sm-3 control-label">Compte bancaire</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Compte_bancaire" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Page acceuille</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Page_acceuille" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Observation</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Observation" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Contact</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Contact" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Identification fiscale</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Identification_fiscale" class="form-control"/>
				</div>
				</div>

                <div class="form-group">
				<label class="col-sm-3 control-label">Categorie fournisseur</label>
				<div class="col-sm-6">
				<input type="text" name="txt_Categorie_fr" class="form-control"/>
				</div>
				</div>

				<div class="form-group" style="margin-top: 30px;">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="Enrgistrer" class="btn btn-success " value="Insert">
				<a href="FOURNISSEURS.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>