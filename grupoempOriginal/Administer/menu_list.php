<?php include("restringir.php"); ?>
<?php include("acentos.php"); ?>
<?php include("funciones.php"); ?>
<?php
mysql_select_db($database_admin, $admin);
$query_ver = "SELECT * FROM tbl_menu2 ORDER BY id ASC";
$ver = mysql_query($query_ver, $admin) or die(mysql_error());
$row_ver = mysql_fetch_assoc($ver);
$totalRows_ver = mysql_num_rows($ver);
?>
<!doctype html>
<html class="fixed">
	<head>

	<?php include("llamadoshead.php"); ?>
		

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include("header.php"); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav.php");?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>slider</h2>
					
					</header>

						<section class="panel">
							<header class="panel-heading">
														
								<h2 class="panel-title">Listado de menus</h2>
							</header>
							<div class="panel-body">
                            	<!--<div style="margin-bottom:10px;">
									<a href="banner_list_nuevo.php" class="mb-xs mt-xs mr-xs btn btn-default">Nuevo menu</a>
								</div>-->
								<div class="table-responsive">
											<table class="table table-bordered mb-none">
												<thead>
													<tr>
														<th>ID</th>
														<th>Titulo</th>
														<th>Tamaño</th>
														<th>Opciones</th>
													</tr>
												</thead>
												<tbody>
                                                <?php do{ ?>
													<tr>
														<td><?php echo $row_ver['id']; ?></td>
														<td><?php echo $row_ver['titulo']; ?></td>
														<td><?php echo $row_ver['contenido']; ?></td>
														<td>
                                                        <a class="mb-xs mt-xs mr-xs btn btn-sm btn-info" href="menu2.php?tipo=<?php echo $row_ver['id']; ?>"><i class="fa fa-file-image-o"></i> Ingresar Imagenes</a>
                                                        <a href="menu_list_editar.php?id=<?php echo $row_ver['id']; ?>" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-pencil"></i> Editar</a> 
                                                        
                                                           
                                                        </td>
													</tr>
												<?php } while ($row_ver = mysql_fetch_assoc($ver)); ?>	
												</tbody>
											</table>
										</div>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
        <script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="assets/javascripts/ui-elements/examples.modals.js"></script>
	</body>
</html>