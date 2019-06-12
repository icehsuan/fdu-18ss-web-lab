<?php
    $ContinentCode = $_GET('continent');
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

?>
