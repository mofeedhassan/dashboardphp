<head>
 <!-- CSS dependencies -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
</head>

<div id="header">
    <img src="img/AKSW_Logo.png" >
    <img src="img/latc-logo.gif" >
</div>
<div class="well well-large">
<p align="justify">
<b>
<h1>Quality Assurance Linked Data</h1>  

<h4>DESCRIPTION</h4>

This page presents a linksets inventory as an addition to Quality Assurrance Dashboard. The data of the linkset inventory are imported from the Linkset API 
(http://linker.sindice.com/runtime-results/). The aim behind the linked data set page is to present  the most updated list of linking specifications and information about different linking tasks. <br>This is done by importing information about these linking tasks from the Linkset API in regular bases and display such information on this page in a user friendly way.
In a tabular form, The page provides information that include: link-set name | link-set's source dataset | link-set's target dataset | linking property | number of triples | link-set's downloads.<br> User can view the list of interlinking sets metadata and he is  cabable of downloading the specifications and links files for any link-set from the "downloads" in table.
<br>
<br>
(The page is in development progress)
</b>
</p>
</div>
<form id="linksTablesfrm2" class="well span20" >
	<div id= "linksTablesdiv" class="span3">
<?php
	$con=mysqli_connect("","root","mofo","linkSetDB");

	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	 else
	 {
			$result = mysqli_query($con,"SELECT linkSetInfo FROM linkSetTbl");
?>
		
		<table border="1" width="50%" id="tbll" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Link set</th><th>Source</th><th>Target</th><th>Linking Property</th><th>Specifications File</th><th>Links File</th><th>Triple Nr.</th><th>Date</th>
				</tr>
			</thead>
<?php
	$totalLinks=0;
			while($row = mysqli_fetch_array($result))
			  {
			  $rowdata= $row['linkSetInfo'];
			  $linkset= json_decode($rowdata,true);
?>
			  <tr>
					<td title="Link set">
<?php						
						echo  $linkset['taskSetName'];
?>
					</td>
					<td title="Source">
<?php						
						echo  $linkset['Source'];
?>						
					</td>
					<td title="Target">
<?php						
						echo  $linkset['Target'];
?>						
					</td>
					<td title="Linking Property">
<?php						
						echo  $linkset['LinkingType'];
?>						
					</td>
					<td	title="Specifications File">
						<a href="<?php	echo  $linkset['FileName']; ?>">specs</a>
					</td>
					
					<td title="Links File">
						<a href="<?php	echo  $linkset['linksFile']; ?>">links</a>
						
					</td>
					<td title="Triples Nr.">
<?php
						echo  $linkset['TriplesNo'];
						$totalLinks+= $linkset['TriplesNo'] ;
?>						
					</td>
					
					<td title="Date">
<?php						
						echo  $linkset['revisionDate'];
?>						
					</td>																									
					</tr>
<?php
			  }
?>
		</table>
	</div>
	<br>
		<center><b>Total Number of links =</b>  <?php echo $totalLinks; ?> </center>
		</br>
</form> 
<form id="linksTablesfrm2" class="well span20" >
<div class="well well-large">
	<p align="justify">
		<h4>CONTACTS</h4>
<table border="1">
	<tr>
	<th><b>Developed by</b></th><th>Supervised by</th>
	</tr>
	<tr>
		<td>
		&nbsp;&nbsp;&nbsp;Mofeed Hassan<br>
		&nbsp;&nbsp;&nbsp;<a href="mailto:mounir@informatik.uni-leipzig.de">mounir@informatik.uni-leipzig.de</a><br>
		&nbsp;&nbsp;&nbsp;+49-341-97-32363<br>
		</td>
		<td>
		&nbsp;&nbsp;&nbsp;Dr. Jens Lehmann<br>
		&nbsp;&nbsp;&nbsp;<a href="mailto:lehmann@informatik.uni-leipzig.de">lehmann@informatik.uni-leipzig.de</a><br>
		&nbsp;&nbsp;&nbsp;+49-341-97-32260<br>
		</td>
	</tr>
</table>
</div>
</form> 
<?php
			mysqli_close($con);
	}
?>
