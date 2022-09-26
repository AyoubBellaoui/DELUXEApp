<?php
ob_start();
include '../Includes/Nav.php';
include '../Includes/links.php';
require "../config/config.php";
	
if(isset($_REQUEST['delete_id']))
{
	
	$id=$_REQUEST['delete_id'];	
		
	$select_stmt= $db->prepare('SELECT * FROM base_caissier WHERE id_cs =:id_cs');	
	$select_stmt->bindParam(':id_cs',$id);
	$select_stmt->execute();
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
	
	$delete_stmt = $db->prepare('DELETE FROM base_caissier WHERE id_cs =:id_cs');
	$delete_stmt->bindParam(':id_cs',$id);
	$delete_stmt->execute();
		
	header("Location:CAISSIERS.php");
}
ob_end_flush();	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Depots</title>
		
</head>

	<body style="width: 100%;">
	
	<div class="wrapper" style="margin: 20px 0; width: 100%; ">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h5><a href="AjouterCaissier.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; AJOUTER UN CAISSIER</a></h5>
						   <button type="button" class="btn btn-success" style="margin: 10px 0 20px 0; width: 200px;">Exporter Au format XLST</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
											<th>#</th>
                                            <th>Nom</th>
											<th>Prenom</th>
											<th>Adresse</th>
											<th>Ville</th>
											<th>Tel</th>
											<th>Observation</th>
											<th colspan="3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM base_caissier");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
											<td><?php echo $row['id_cs']; ?></td>
                                            <td><?php echo $row['Nom']; ?></td>
											<td><?php echo $row['Prenom']; ?></td>
											<td><?php echo $row['Adresse']; ?></td>
											<td><?php echo $row['Ville']; ?></td>
											<td><?php echo $row['Tel']; ?></td>
											<td><?php echo $row['Observation']; ?></td>
                                            <td><a href="ModifierDepot.php?update_id=<?php echo $row['id_cs']; ?>" class="btn btn-warning">Modifier</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id_cs']; ?>" class="btn btn-danger">Supprimer</a></td>
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