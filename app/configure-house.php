<?php 
	include("head.php");
	include("nav.php");
?>
<?php  
  // Load data for the greenhouse
  $green_id = $_GET['green_id'];
  $query1 = "SELECT * FROM greenhouse WHERE greenhouse='$green_id' ORDER by created_at DESC LIMIT 1;";
  $result1 = mysqli_query($con, $query1);
  $row = mysqli_fetch_array($result1);

  
  $query2 = "SELECT * FROM rainfall ORDER by timestamp DESC LIMIT 1;";
  $result2 = mysqli_query($con, $query2);
  $rain = mysqli_fetch_array($result2);
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Greenhouse 1</li>
      </ol>
	  
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Greenhouse 1 </div>
			<div class="card-body text-center">
				<div class="row">
				  <!-- Card 1-->
				  <div class="col-sm-3">
					  <div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Temperature</div>
						<div class="card-body">
							<center style='color:orange; font-size:28pt'>
								<?php echo $row['temperature'];?> <sup>o</sup>C
							</center>
						</div>
					  </div>
				  </div>
				  <!-- Card 2-->
				  <div class="col-sm-3">
					  <div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Moisture</div>
						<div class="card-body">
							<center style='color:brown; font-size:28pt'>
								<?php echo $row['moisture'];?>%
							</center>
						</div>
					  </div>
				  </div>
				  <!-- Card 3-->
				  <div class="col-sm-3">
					  <div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> PH</div>
						<div class="card-body">
							<center style='color:magenta; font-size:28pt'>
								<?php echo $row['ph'];?>
							</center>
						</div>
					  </div>
				  </div>
          <!-- Card 3-->
				  <div class="col-sm-3">
					  <div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Humidity</div>
						<div class="card-body">
							<center style='color:gray; font-size:28pt'>
								<?php echo $row['humidity'];?> g/m<sup>3</sup>
							</center>
						</div>
					  </div>
				  </div>
        </div>
        <div class="row">
				  <!-- Card 2
				  <div class="col-sm-4">
					  <div class="card mb-3">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Heater</div>
						<div class="card-body">
							<center style='color:orange; font-size:28pt'>
								<span class="text-danger">OFF</span>
							</center>
							<p class='text-center'>
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
								  <button type="button" class="btn btn-success">ON</button>
								  <button type="button" class="btn btn-danger">OFF</button>
								</div>
							</p>
						</div>
					  </div>
				  </div> -->
				  <!-- Card 3-->
				  <div class="col-sm-4">
					  <div class="card">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Irrigation system</div>
						<div class="card-body">
							<center style='color:orange; font-size:28pt'>
								<span class="text-success" id='status_text'>ON</span>
							</center>
							<p class='text-center'>
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
								  <button id='status_on' type="button" class="btn btn-success" onClick='turnOnSystem()'>ON</button>
								  <button id='status_off' type="button" class="btn btn-danger" onClick='turnOffSystem()'>OFF</button>
								</div>
							</p>
						</div>
					  </div>
				  </div>
				  <!-- Card 4-->
				  <div class="col-sm-4">
					  <div class="card">
						<div class="card-header">
						  <i class="fa fa-area-chart"></i> Weather Forecats</div>
						<div class="card-body">
							<center style='color:orange; font-size:28pt'>
								<span class="text-success">Might rain</span>
							</center>
							<p class='text-center'>
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
								  <span class='text-muted'>It might rain today around 6PM at <?php echo $rain['rain']; ?>% confidence</span>
								</div>
							</p>
						</div>
					  </div>
				  </div>
				</div>
			</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script>
	function turnOnSystem(){
		document.getElementById('status_text').innerHTML = 'ON';
	
	}

	function turnOffSystem(){
		var offButt = document.getElementById('status_text');
		offButt.innerHTML = 'OFF';
		offButt.style.color='#ff0000';
	}
    </script>
  </div>
</body>

</html>
