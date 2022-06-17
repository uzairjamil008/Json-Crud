<?php
//random code function is make for generate the random code for unique id in json file when user insert data it is call in line 15 for line 18
function random_code() {
  return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}
if(isset($_POST['submit'])) {
if(file_exists('file.json')) {
    $current_data = file_get_contents('file.json');
		$array_data = json_decode($current_data, true);
    //Get id for auto increment
    $last_item = end($array_data);
    $last_item_id = $last_item['id'];
    $uniid = random_code(10);
		$extra = array(
			 'id'               =>     ++$last_item_id,
			 'szPlotIdUniqueKey'          =>     $uniid,
			 'fPrice'          =>     $_POST["price"],
			 'szRow'     =>     $_POST["row"],
			 'szPlot'     =>     $_POST["plot"],
			 'szLot'     =>     $_POST["lot"],
       'szCentroidLatitude'               =>     $_POST['latitude'],
			 'szCentroidLongtitude'          =>     $_POST["longitude"],
			 'szCentroidNorthing'          =>     $_POST["cnorthing"],
			 'szCentroidEasting'     =>     $_POST["ceasting"],
			 'szNECornerLatitude'     =>     $_POST["neclatitude"],
			 'szNECornerLongitude'     =>     $_POST["neclongitude"],
       'szNWCornerLatitude'               =>     $_POST['nwclatitude'],
			 'szNWCornerLongitude'          =>     $_POST["nwclongitude"],
			 'szSECornerLatitude'          =>     $_POST["seclatitude"],
			 'szSECornerLongitude'     =>     $_POST["seclongitude"],
			 'szSWCornerLatitude'     =>     $_POST["swclatitude"],
			 'szSWCornerLongitude'     =>     $_POST["swclongitude"],
       'boundaryPlot'               =>     $_POST['bplot'],
			 'cornerPlot'          =>     $_POST["cplot"],
			 'PriceWithTax'          =>     $_POST["pwithtax"]
		);
		$array_data[] = $extra;
		$final_data = json_encode($array_data);
     if(file_put_contents('file.json', $final_data)) {
          $message = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Data Added Successfully
        </div>";
        echo $message;
     }
}
else {
     $final_data = fileCreateWrite();
     if(file_put_contents('file.json', $final_data)) {
          $message = "File createed and  data added Success fully";
     }
}
function fileCreateWrite() {
		$file = fopen("file.json","w");
		$array_data = array();
		$extra = array(
            'id'               =>     $_POST['id'],
            'szPlotIdUniqueKey'          =>     $_POST["uniqueid"],
            'fPrice'          =>     $_POST["price"],
            'szRow'     =>     $_POST["row"],
            'szPlot'     =>     $_POST["plot"],
            'szLot'     =>     $_POST["lot"],
            'szCentroidLatitude'               =>     $_POST['latitude'],
            'szCentroidLongtitude'          =>     $_POST["longitude"],
            'szCentroidNorthing'          =>     $_POST["cnorthing"],
            'szCentroidEasting'     =>     $_POST["ceasting"],
            'szNECornerLatitude'     =>     $_POST["neclatitude"],
            'szNECornerLongitude'     =>     $_POST["neclongitude"],
            'szNWCornerLatitude'               =>     $_POST['nwclatitude'],
            'szNWCornerLongitude'          =>     $_POST["nwclongitude"],
            'szSECornerLatitude'          =>     $_POST["seclatitude"],
            'szSECornerLongitude'     =>     $_POST["seclongitude"],
            'szSWCornerLatitude'     =>     $_POST["swclatitude"],
            'szSWCornerLongitude'     =>     $_POST["swclongitude"],
            'boundaryPlot'               =>     $_POST['bplot'],
            'cornerPlot'          =>     $_POST["cplot"],
            'PriceWithTax'          =>     $_POST["pwithtax"]
		);
		$array_data[] = $extra;
		$final_data = json_encode($array_data);
		fclose($file);
		return $final_data;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>insert Data in Jason</title>
</head>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="jsonshowdata.php">Welcome To Json File</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="jsonshowdata.php">Home</a>
            </div>
        </div>
    </div>
</nav>
<body>
    <div class="container">
        <h4 class="mt-5">insert Data in Jason File</h4><br />
        <form method="post">
            <div class="row">
                <div class="col">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" /><br />
                    <label>Row</label>
                    <input type="text" name="row" class="form-control" /><br />
                    <label>Plot</label>
                    <input type="text" name="plot" class="form-control" /><br />
                    <label>Price With Tax</label>
                    <input type="text" name="pwithtax" class="form-control" /><br />
                    <button type="submit" name="submit" class="btn btn-primary">Submit Data</button>
                </div>
                <div class="col">
                    <label>Lot</label>
                    <input type="text" name="lot" class="form-control" /><br />
                    <label>Latitude</label>
                    <input type="text" name="latitude" class="form-control" /><br />
                    <label>Longitude</label>
                    <input type="text" name="longitude" class="form-control" /><br />
                </div>
                <div class="col">
                    <label>Centroid Northing</label>
                    <input type="text" name="cnorthing" class="form-control" /><br />
                    <label>Centroid Easting</label>
                    <input type="text" name="ceasting" class="form-control" /><br />
                    <label>NE Corner Latitude</label>
                    <input type="text" name="neclatitude" class="form-control" /><br />
                </div>
                <div class="col">
                    <label>NE Corner Longitude</label>
                    <input type="text" name="neclongitude" class="form-control" /><br />
                    <label>NW Corner Latitude</label>
                    <input type="text" name="nwclatitude" class="form-control" /><br />
                    <label>NW Corner Longitude</label>
                    <input type="text" name="nwclongitude" class="form-control" /><br />
                </div>
                <div class="col">
                    <label>SE Corner Latitude</label>
                    <input type="text" name="seclatitude" class="form-control" /><br />
                    <label>SE Corner Longitude</label>
                    <input type="text" name="seclongitude" class="form-control" /><br />
                    <label>SW Corner Latitude</label>
                    <input type="text" name="swclatitude" class="form-control" /><br />
                </div>
                <div class="col">
                    <label>SW Corner Longitude</label>
                    <input type="text" name="swclongitude" class="form-control" /><br />
                    <label>Boundy Plot</label>
                    <input type="text" name="bplot" class="form-control" /><br />
                    <label>Corner Plot</label>
                    <input type="text" name="cplot" class="form-control" /><br />
                </div>
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>