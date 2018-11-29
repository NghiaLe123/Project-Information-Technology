<?php
  //fetch.php
  $connect = mysqli_connect("localhost", "root", "", "quanlydoan");
  $output = '';
  $output2 = '';
  if(isset($_POST["query"])) {
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
    SELECT * FROM sinh_vien 
    WHERE maSV LIKE '%".$search."%'";
  }
  else {
    $query = "
    SELECT * FROM sinh_vien
    ";
  }

  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0) {
    $output .= '
      <div class="table-responsive"">
      <table class="table table bordered">
        <tr>
        <th>Mã Số Sinh Viên</th>
        <th>Tên Sinh Viên</th>
        <th>Lớp</th>
        </tr>
    ';
    $row = mysqli_fetch_array($result);
    $d=new DOMDocument;
    $output .= '
    <tr>
      <td>'.$row["maSV"].'</td>
      <td>'.$row["tenSV"].'</td>
      <td>'.$row["maLop"].'</td>
      <td><button type="submit" class="btn"><i class="fa fa-check"></i></button></td>
    </tr>
    </table>.';
    
    //echo '$d->getElementById('add-list')->tagName';
    $output2 .= ''.$row["tenSV"];
    //$output .= ''.$row["tenSV"];
    echo $output;
  } else {
    echo 'Data Not Found';
  }
?>