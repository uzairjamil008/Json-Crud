<?php
if(file_exists('file.json')) {	
	$filename = 'file.json';
	$data = file_get_contents($filename); //data read from json file
	$users = json_decode($data);  //decode a data 
	 $message = "<h3 class='text-success'>JSON File Data</h3>";
} else {
	 $message = "<h3 class='text-danger'>JSON file Not found</h3>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Json Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
#a {
    text-decoration: none;
    border: 2px solid #FF5A5A;
    border-radius: 5px;
    padding: 5px;
    background-color: green;
    color: white;
}

#del {
    text-decoration: none;
    border: 2px solid #FF5A5A;
    border-radius: 5px;
    padding: 5px;
    background-color: red;
    color: white;
}

.divScroll {
    overflow: scroll;
    height: 950px;
    width: 1100px;
}
</style>
<header>
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
                    <a class="nav-link active" aria-current="page" href="insertdatainjason.php">Insert Data</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>
    <?php  
			 if(isset($message))  
			 {  
				  echo $message;  
	  ?>
    <table class="table">
        <thead class="table table-dark table-striped">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">UniqueId</th>
                <th scope="col">Price</th>
                <th scope="col">Row</th>
                <th scope="col">Plot</th>
                <th scope="col">Lot</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">CentroidNorthing</th>
                <th scope="col">CentroidEasting</th>
                <th scope="col">NECornerLatitude</th>
                <th scope="col">NECornerLongitude</th>
                <th scope="col">NWCornerLatitude</th>
                <th scope="col">NWCornerLongitude</th>
                <th scope="col">SECornerLatitude</th>
                <th scope="col">SECornerLongitude</th>
                <th scope="col">SWCornerLatitude</th>
                <th scope="col">SWCornerLongitude</th>
                <th scope="col">BoundyPlot</th>
                <th scope="col">CornerPlot</th>
                <th scope="col">PriceWithTax</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php foreach ($users as $user) { ?>
        <tbody class="table table-success table-striped">
            <tr>
                <td><?=$user->id;?></td>
                <td><?=$user->szPlotIdUniqueKey;?></td>
                <td><?=$user->fPrice;?></td>
                <td><?=$user->szRow;?></td>
                <td><?=$user->szPlot;?></td>
                <td><?=$user->szLot;?></td>
                <td><?=$user->szCentroidLatitude;?></td>
                <td><?=$user->szCentroidLongtitude;?></td>
                <td><?=$user->szCentroidNorthing;?></td>
                <td><?=$user->szCentroidEasting;?></td>
                <td><?=$user->szNECornerLatitude;?></td>
                <td><?=$user->szNECornerLongitude;?></td>
                <td><?=$user->szNWCornerLatitude;?></td>
                <td><?=$user->szNWCornerLongitude;?></td>
                <td><?=$user->szSECornerLatitude;?></td>
                <td><?=$user->szSECornerLongitude;?></td>
                <td><?=$user->szSWCornerLatitude;?></td>
                <td><?=$user->szSWCornerLongitude;?></td>
                <td><?=$user->boundaryPlot;?></td>
                <td><?=$user->cornerPlot;?></td>
                <td><?=$user->PriceWithTax;?></td>
                <td><button type="button" data-bs-toggle="modal" class="up_date" data-bs-target="#exampleModal"
                        update-id="<?php echo $user->id;?>" id="a">Update</button></td>
                <td><button type="button" data-bs-toggle="modal" class="del" data-bs-target="#example"
                        data-id="<?php echo $user->id;?>" id="del">Delete</button></td>
                <td><button type="button" data-bs-toggle="modal" class="view" data-bs-target="#exampleM"
                        view-data="<?php echo $user->id;?>" id="a">view</button></td>
            </tr>
            <?php } 
	}
			 else
			 echo $message; 
	?>
        </tbody>
    </table>
    <!-- this is modal used for show popup when user view a record -->
    <!-- Modal Start-->
    <div class="modal fade" id="exampleM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="card mb-3 divScroll">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div id="googleMap" style="width:100%;height:100%;"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <label>ID</label>
                                            <li class="list-group-item">
                                                <p id="id"></p>
                                            </li>
                                            <label>Unique ID</label>
                                            <li class="list-group-item">
                                                <p id="uniqueid"></p>
                                            </li>
                                            <label>Price</label>
                                            <li class="list-group-item">
                                                <p id="prince"></p>
                                            </li>
                                            <label>Row</label>
                                            <li class="list-group-item">
                                                <p id="row"></p>
                                            </li>
                                            <label>Plot</label>
                                            <li class="list-group-item">
                                                <p id="plot"></p>
                                            </li>
                                            <label>Lot</label>
                                            <li class="list-group-item">
                                                <p id="lot"></p>
                                            </li>
                                            <label>Latitude</label>
                                            <li class="list-group-item">
                                                <p id="latitude"></p>
                                            </li>
                                            <label>Longitude</label>
                                            <li class="list-group-item">
                                                <p id="longitute"></p>
                                            </li>
                                            <label>Centroid Northing</label>
                                            <li class="list-group-item">
                                                <p id="cnorthing"></p>
                                            </li>
                                            <label>Centroid Easting</label>
                                            <li class="list-group-item">
                                                <p id="ceasting"></p>
                                            </li>
                                            <label>NE Corner Latitude</label>
                                            <li class="list-group-item">
                                                <p id="neclatitude"></p>
                                            </li>
                                            <label>NE Corner Longitude</label>
                                            <li class="list-group-item">
                                                <p id="neclongitude"></p>
                                            </li>
                                            <label>NW Corner Latitude</label>
                                            <li class="list-group-item">
                                                <p id="nwclatitude"></p>
                                            </li>
                                            <label>NW Corner Longitude</label>
                                            <li class="list-group-item">
                                                <p id="nwclongitude"></p>
                                            </li>
                                            <label>SE Corner Latitude</label>
                                            <li class="list-group-item">
                                                <p id="seclatitude"></p>
                                            </li>
                                            <label>SE Corner Longitude</label>
                                            <li class="list-group-item">
                                                <p id="seclongitude"></p>
                                            </li>
                                            <label>SW Corner Latitude</label>
                                            <li class="list-group-item">
                                                <p id="swclatitude"></p>
                                            </li>
                                            <label>SW Corner Longitude</label>
                                            <li class="list-group-item">
                                                <p id="swclongitude"></p>
                                            </li>
                                            <label>Boundy Plot</label>
                                            <li class="list-group-item">
                                                <p id="bplot"></p>
                                            </li>
                                            <label>Corner Plot</label>
                                            <li class="list-group-item">
                                                <p id="cplot"></p>
                                            </li>
                                            <label>Price With Tax</label>
                                            <li class="list-group-item">
                                                <p id="pricewithtex"></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Modal END -->
    <!-- this is modal used for show popup when user delete a record its show confirmation box -->
    <!-- Modal Start-->
    <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Delete Data Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="deletedata.php" method="POST">
                        <h6>Do You Want To Really Delete Data ?</h6>
                        <input type="hidden" name="id" id="id_delete">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Modal END -->
    <!-- this is modal used for show popup when user update a record -->
    <!-- Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="updatedata.php">
                        <input type="hidden" name="id" id="id_update">
                        <div class="row">
                            <div class="col">
                                <label class="mt-3">ID</label>
                                <input type="text" name="id" class="form-control" id="id1" /><br />
                                <label>Unique Id</label>
                                <input type="text" name="uniqueid" class="form-control" id="unique_id" /><br />
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" id="price" /><br />
                                <label>Row</label>
                                <input type="text" name="row" class="form-control" id="row2" /><br />
                                <label>Price With Tax</label>
                                <input type="text" name="pwithtax" class="form-control" id="pwith_tax" /><br />
                            </div>
                            <div class="col">
                                <label>Plot</label>
                                <input type="text" name="plot" class="form-control" id="plot3" /><br />
                                <label>Lot</label>
                                <input type="text" name="lot" class="form-control" id="lot4" /><br />
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="latitude5" /><br />
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="longitude" /><br />
                            </div>
                            <div class="col">
                                <label>Centroid Northing</label>
                                <input type="text" name="cnorthing" class="form-control" id="c_northing" /><br />
                                <label>Centroid Easting</label>
                                <input type="text" name="ceasting" class="form-control" id="c_easting" /><br />
                                <label>NE Corner Latitude</label>
                                <input type="text" name="neclatitude" class="form-control" id="nec_latitude" /><br />
                                <label>NE Corner Longitude</label>
                                <input type="text" name="neclongitude" class="form-control" id="nec_longitude" /><br />
                            </div>
                            <div class="col">
                                <label>NW Corner Latitude</label>
                                <input type="text" name="nwclatitude" class="form-control" id="nwc_latitude" /><br />
                                <label>NW Corner Longitude</label>
                                <input type="text" name="nwclongitude" class="form-control" id="nwc_longitude" /><br />
                                <label>SE Corner Latitude</label>
                                <input type="text" name="seclatitude" class="form-control" id="sec_latitude" /><br />
                                <label>SE Corner Longitude</label>
                                <input type="text" name="seclongitude" class="form-control" id="sec_longitude" /><br />
                            </div>
                            <div class="col">
                                <label>SW Corner Latitude</label>
                                <input type="text" name="swclatitude" class="form-control" id="swc_latitude" /><br />
                                <label>SW Corner Longitude</label>
                                <input type="text" name="swclongitude" class="form-control" id="swc_longitude" /><br />
                                <label>Boundy Plot</label>
                                <input type="text" name="bplot" class="form-control" id="b_plot" /><br />
                                <label>Corner Plot</label>
                                <input type="text" name="cplot" class="form-control" id="c_plot" /><br />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="update">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- this script is written in javascript for delete data mean json file in javascript -->
    <script>
    butdel = document.getElementsByClassName('del');
    for (let i = 0; i < butdel.length; i++) {
        butdel[i].addEventListener('click', function(e) {
            let delid = butdel[i].getAttribute('data-id');
            console.log("delid", delid);

            //fetch jsonfile with javascript
            fetch("file.json", {
                    cache: "reload"
                })
                .then(response => {
                    return response.json();
                })
                .then(jsondata => {
                    plots = jsondata;
                    console.log(plots);
                    //array find Index method javascript to delete data through id
                    var index = plots.findIndex(plot => plot.id == delid);
                    console.log("index", index);
                    document.getElementById('id_delete').value = plots[index]['id'];
                });
        })
    }
    // this script is written in javascript for update data mean json file in javascript
    butup = document.getElementsByClassName('up_date');
    for (let i = 0; i < butup.length; i++) {
        butup[i].addEventListener('click', function(e) {
            let upid = butup[i].getAttribute('update-id');
            console.log("upid", upid);

            //fetch json file with javascript
            fetch("file.json", {
                    cache: "reload"
                })
                .then(response => {
                    return response.json();
                })
                .then(jsondata => {
                    plots = jsondata;
                    console.log(plots);
                    //array findIndex method javascript to update data
                    var index = plots.findIndex(plot => plot.id == upid);
                    console.log("index", index);
                    document.getElementById('id_update').value = plots[index]['id'];
                    document.getElementById('id1').value = plots[index]['id'];
                    document.getElementById('unique_id').value = plots[index]['szPlotIdUniqueKey'];
                    document.getElementById('price').value = plots[index]['fPrice'];
                    document.getElementById('row2').value = plots[index]['szRow'];
                    document.getElementById('plot3').value = plots[index]['szPlot'];
                    document.getElementById('lot4').value = plots[index]['szLot'];
                    document.getElementById('latitude5').value = plots[index]['szCentroidLatitude'];
                    document.getElementById('longitude').value = plots[index]['szCentroidLongtitude'];
                    document.getElementById('c_northing').value = plots[index]['szCentroidNorthing'];
                    document.getElementById('c_easting').value = plots[index]['szCentroidEasting'];
                    document.getElementById('nec_latitude').value = plots[index]['szNECornerLatitude'];
                    document.getElementById('nec_longitude').value = plots[index]['szNECornerLongitude'];
                    document.getElementById('nwc_latitude').value = plots[index]['szNWCornerLatitude'];
                    document.getElementById('nwc_longitude').value = plots[index]['szNWCornerLongitude'];
                    document.getElementById('sec_latitude').value = plots[index]['szSECornerLatitude'];
                    document.getElementById('sec_longitude').value = plots[index]['szSECornerLongitude'];
                    document.getElementById('swc_latitude').value = plots[index]['szSWCornerLatitude'];
                    document.getElementById('swc_longitude').value = plots[index]['szSWCornerLongitude'];
                    document.getElementById('b_plot').value = plots[index]['boundaryPlot'];
                    document.getElementById('c_plot').value = plots[index]['cornerPlot'];
                    document.getElementById('pwith_tax').value = plots[index]['PriceWithTax'];
                });
        })
    }
    // this script is written in javascript for view data mean json file in javascript
    butview = document.getElementsByClassName('view');
    for (let i = 0; i < butview.length; i++) {
        butview[i].addEventListener('click', function(e) {
            let viewid = butview[i].getAttribute('view-data');
            console.log("viewid", viewid);

            //fetch json file with javascript
            fetch("file.json")
                .then(response => {
                    return response.json();
                })
                .then(jsondata => {
                    plots = jsondata;
                    console.log(plots);
                    //array findIndex method javascript to update data
                    var index = plots.findIndex(plot => plot.id == viewid);
                    console.log("index", index);
                    document.getElementById('id').innerHTML = plots[index]['id'];
                    document.getElementById('uniqueid').innerHTML = plots[index]['szPlotIdUniqueKey'];
                    document.getElementById('prince').innerHTML = plots[index]['fPrice'];
                    document.getElementById('row').innerHTML = plots[index]['szRow'];
                    document.getElementById('plot').innerHTML = plots[index]['szPlot'];
                    document.getElementById('lot').innerHTML = plots[index]['szLot'];
                    document.getElementById('latitude').innerHTML = plots[index]['szCentroidLatitude'];
                    document.getElementById('longitute').innerHTML = plots[index]['szCentroidLongtitude'];
                    document.getElementById('cnorthing').innerHTML = plots[index]['szCentroidNorthing'];
                    document.getElementById('ceasting').innerHTML = plots[index]['szCentroidEasting'];
                    document.getElementById('neclatitude').innerHTML = plots[index]['szNECornerLatitude'];
                    document.getElementById('neclongitude').innerHTML = plots[index]['szNECornerLongitude'];
                    document.getElementById('nwclatitude').innerHTML = plots[index]['szNWCornerLatitude'];
                    document.getElementById('nwclongitude').innerHTML = plots[index]['szNWCornerLongitude'];
                    document.getElementById('seclatitude').innerHTML = plots[index]['szSECornerLatitude'];
                    document.getElementById('seclongitude').innerHTML = plots[index]['szSECornerLongitude'];
                    document.getElementById('swclatitude').innerHTML = plots[index]['szSWCornerLatitude'];
                    document.getElementById('swclongitude').innerHTML = plots[index]['szSWCornerLongitude'];
                    document.getElementById('bplot').innerHTML = plots[index]['boundaryPlot'];
                    document.getElementById('cplot').innerHTML = plots[index]['cornerPlot'];
                    document.getElementById('pricewithtex').innerHTML = plots[index]['PriceWithTax'];
                });
        })
    }

    //for show map in view foam
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(30.3753, 69.3451),
            zoom: 10,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfUroDQu3kObHcbvYvCoGNbwfDPrAJ3aw&callback=myMap">
    </script>
</body>
</html>