<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";
	
if(isset($_REQUEST['delete_id']))
{
	
	$id=$_REQUEST['delete_id'];	
		
	$select_stmt= $db->prepare('SELECT * FROM base_fournisseur WHERE id =:id');	
	$select_stmt->bindParam(':id',$id);
	$select_stmt->execute();
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
	
	$delete_stmt = $db->prepare('DELETE FROM base_fournisseur WHERE id =:id');
	$delete_stmt->bindParam(':id',$id);
	$delete_stmt->execute();
		
	header("Location:FOURNISSEURS.php");
}
ob_end_flush();	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Fournisseurs</title>
		
</head>

	<body style="width: 100%;">
	
	<div class="wrapper" style="margin: 20px 0; width: 100%; ">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h5><a href="AjouterFournisseur.php"><span class="glyphicon glyphicon-th"></span>&nbsp; AJOUTER FOURNISSEUR</a></h5>
                           <button type="button" class="btn btn-success" style="margin: 10px 0 20px 0; width: 200px;">Exporter Au format XLST</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Raison sociale</th>
											<th>Adresse</th>
                                            <th>Ville</th>
											<th>Pays</th>
                                            <th>Tel</th>
											<th>FAX</th>
                                            <th>EMAIL</th>
											<th>Page acceuille</th>
                                            <th>categorie Fournisseur</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM base_fournisseur");	
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['Raison_sociale']; ?></td>
											<td><?php echo $row['Adresse']; ?></td>
                                            <td><?php echo $row['Ville']; ?></td>
											<td><?php echo $row['Pays']; ?></td>
                                            <td><?php echo $row['Tel']; ?></td>
											<td><?php echo $row['Fax']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
											<td><?php echo $row['page_accueil']; ?></td>
                                            <td><?php echo $row['categorie_id']; ?></td>
                                                                
                                            <td><a href="ModifierFournisseur.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Modifier</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a></td>
                                        </tr>
                                    <?php
                                    }
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
		</div>
		
	</div>
			
	</div>
									
	</body>
</html>