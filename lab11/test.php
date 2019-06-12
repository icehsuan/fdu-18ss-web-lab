<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
  $con=mysqli_connect("localhost:3306","root","","travel");
  if (mysqli_connect_errno($con))
  {
      echo "连接 MySQL 失败: " . mysqli_connect_error();
  }
  $Continent=$_GET['continent'];
  // echo $select_value;
  $Country=$_GET['country'];
  $Title=$_GET['title'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />



    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="test.php" method="get" class="form-horizontal">
              <div class="form-inline">

              <select name="continent" class="form-control" id="continent" onchange="">
                <option value="0">Select Continent</option>

                <?php
                //Fill this place
                //****** Hint ******
                //display the list of continents
                $sql="SELECT ContinentName,ContinentCode FROM Continents";
                $result=mysqli_query($con,$sql);

                // 关联数组
                $row=mysqli_fetch_assoc($result);

                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }

                mysqli_free_result($result);
                ?>
              </select>

              <select name="country" class="form-control" id = "country">
                <option value="0">Select Country</option>
                <?php
                //Fill this place

                //****** Hint ******
                /* display list of countries */
                $sql="SELECT CountryName,ISO FROM Countries";
                $result=mysqli_query($con,$sql);
                // 关联数组
                $row=mysqli_fetch_assoc($result);
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }

                mysqli_free_result($result);
                ?>
              </select>
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>


		<ul class="caption-style-2">
            <?php
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>
            */
            function findByALL(){
              $con=mysqli_connect("localhost:3306","root","","travel");
              if (mysqli_connect_errno($con))
              {
                  echo "连接 MySQL 失败: " . mysqli_connect_error();
              }
              $sql="SELECT Title,Path,ImageID FROM ImageDetails";
              $result=mysqli_query($con,$sql);
              // 关联数组
              $row=mysqli_fetch_assoc($result);
              while($row = $result->fetch_assoc()) {
                echo '<li>
                  <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                    <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                    <div class="caption">
                      <div class="blur"></div>
                      <div class="caption-text">
                        <h1>' . $row['Title'] . '</h1>
                      </div>
                    </div>
                  </a>
                </li>';
              }
              mysqli_free_result($result);
              mysqli_close($con);
            }
            function findByContinents($ContinentCode){
              $con=mysqli_connect("localhost:3306","root","","travel");
              if (mysqli_connect_errno($con))
              {
                  echo "连接 MySQL 失败: " . mysqli_connect_error();
              }
              $sql="SELECT Title,Path,ImageID,ContinentCode FROM ImageDetails WHERE ContinentCode = '".$ContinentCode."'";
              $result=mysqli_query($con,$sql);
              // 关联数组
              $row=mysqli_fetch_assoc($result);
              while($row = $result->fetch_assoc()) {
                echo '<li>
                  <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                    <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                    <div class="caption">
                      <div class="blur"></div>
                      <div class="caption-text">
                        <h1>' . $row['Title'] . '</h1>
                      </div>
                    </div>
                  </a>
                </li>';
              }
              mysqli_free_result($result);
              mysqli_close($con);
            }
            // $ContinentCode = $_GET['continent'];
            // $ContinentCode = 'AS';
            // echo $ContinentCode."<br />";
            // findByContinents($ContinentCode);
            function findByCountry($CountryCodeISO){
              $con=mysqli_connect("localhost:3306","root","","travel");
              if (mysqli_connect_errno($con))
              {
                  echo "连接 MySQL 失败: " . mysqli_connect_error();
              }
              $sql="SELECT Title,Path,ImageID,ContinentCode FROM ImageDetails WHERE CountryCodeISO = '".$CountryCodeISO."'";
              $result=mysqli_query($con,$sql);
              // 关联数组
              $row=mysqli_fetch_assoc($result);
              while($row = $result->fetch_assoc()) {
                echo '<li>
                  <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                    <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                    <div class="caption">
                      <div class="blur"></div>
                      <div class="caption-text">
                        <h1>' . $row['Title'] . '</h1>
                      </div>
                    </div>
                  </a>
                </li>';
              }
              mysqli_free_result($result);
              mysqli_close($con);
            }
            // $CountryCodeISO = 'PE';
            // findByCountry($CountryCodeISO);
            function findByTitle($Title){
              $con=mysqli_connect("localhost:3306","root","","travel");
              if (mysqli_connect_errno($con))
              {
                  echo "连接 MySQL 失败: " . mysqli_connect_error();
              }
              $sql="SELECT Title,Path,ImageID,ContinentCode FROM ImageDetails WHERE Title Like '%".$Title."%'";
              $result=mysqli_query($con,$sql);
              // 关联数组
              $row=mysqli_fetch_assoc($result);
              while($row = $result->fetch_assoc()) {
                echo '<li>
                  <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                    <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                    <div class="caption">
                      <div class="blur"></div>
                      <div class="caption-text">
                        <h1>' . $row['Title'] . '</h1>
                      </div>
                    </div>
                  </a>
                </li>';
              }
              mysqli_free_result($result);
              mysqli_close($con);
            }


            echo "<script>
            var c = document.getElementById('continent');
            var continent = c.options[c.selectedIndex].value;
            </script>";
            $ContinentCode = "<script>document.write(continent);</script>";
            // $ContinentCode = 'AS';
            // echo $ContinentCode;
            // findByContinents($ContinentCode);
            // echo "<script>
            // c.addEventListener('click',".findByALL().",true);
            // </script>";
            echo "<script>
            var d = document.getElementById('country');
            var country = d.options[d.selectedIndex].value;
            </script>";
            $CountryCodeISO = "<script>document.write(country)</script>";
            // if ($ContinentCode == 0 && $CountryCodeISO == 0){
            //   findByALL();
            // }
            // else if($ContinentCode != 0 && $CountryCodeISO == 0){
            //   findByContinents($ContinentCode);
            // }
            ?>
       </ul>


    </main>

    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>
        </div>


    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
