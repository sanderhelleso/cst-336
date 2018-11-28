<html>
    
        <?php echo $_SERVER['REQUEST_URI']; ?>


<head>

   <title>Earthquake API </title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

    <header>

      <h1>Earthquake Info</h1>

    </header>



      <form method="post">

        Start Time:   <input type="text" id="starttime" value="2018-10-01"> <br><br>

        End Time:     <input type="text" id="endtime" value="2018-10-31"> <br><br>

        Latitude:     <input type="text" id="latitude" value="36.6"> <br><br>

        Longitude:    <input type="text" id="longitude" value="-121.9"> <br><br>

        Max Radius:   <input type="text" id="maxradius" value="10"> <br><br>

        Magnitud (0 to 7): <input type="number" id="minmag" min="0" value="3" max="7"> <br><br>

      </form>

        Change any value to update results.<br><br>

     

      <div id="earthquakeResult"></div>



  <script> 

    

    $("input").change(getEarthquakes);

    

    function getEarthquakes() {      

      $('#earthquakeResult').html("<img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width='200'/>");

      $.ajax({

            type: "get",

             url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?=" + value,

        dataType: "json",

            data: {

                   "format":"json",

                   "starttime":$("#starttime").val(),

                   "endtime"  :$("#endtime").val(),

                   "latitude" :$("#latitude").val(),

                   "longitude":$("#longitude").val(),

                   "maxradius":$("#maxradius").val(),

                   "minmag"   :$("#minmag").val()

            },

            success: function(data,status) {

              $('#earthquakeResult').html(data["metadata"].title + "<br>");

                 for (var i=0; i < data['features'].length; i++ ) {

                  $('#earthquakeResult').append(data['features'][i]['properties']["mag"] + " - " + data['features'][i]['properties'].place  + "<br/>");

                 }

              },

            complete: function(data,status) { //optional, used for debugging purposes

                 //alert(status);

            }

         });

    }



  </script>

  </body>

  </html>