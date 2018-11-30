<?php
  //fetch.php
  $connect = mysqli_connect("localhost", "root", "", "quanlydoan");
  $output = '';
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
    <div class="table-responsive">
      <table class="table" id="table-modal" style="margin-left: 0px;">
        <tr>
          <th>Mã Số Sinh Viên</th>
          <th>Tên Sinh Viên</th>
          <th>Lớp</th>
        </tr>
    ';
    $row = mysqli_fetch_array($result);
    $output .= '
    <tr>
      <td>'.$row["maSV"].'</td>
      <td>'.$row["tenSV"].'</td>
      <td>'.$row["maLop"].'</td>
      <td><button type="submit" class="btn"><i class="fa fa-check"></i></button></td>
    </tr>';
    echo $output;
  } else {
    echo 'Data Not Found';
  }
?>