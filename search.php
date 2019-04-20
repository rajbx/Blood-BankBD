<!-- search.php -->
<?php  
 $connect = mysqli_connect("localhost", "root", "", "raj");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM users WHERE name LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["name"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Country Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  