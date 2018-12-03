<?php
  //fetch.php
  header('Content-Type: text/html; charset=UTF-8');
  $connect = mysqli_connect("localhost", "root", "", "quanlydoan");
  $output = '';
  $output1 = '';
  $output2 = array();
  if(isset($_POST["query"])) {
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
    SELECT * FROM sinh_vien 
    WHERE maSV LIKE '%".$search."%'";
  }

  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0) {
    $output2['table'] = '
    <div class="table-responsive">
      <table class="table" id="table-modal" style="margin-left: 0px;">
        <tr>
          <th>Mã Số Sinh Viên</th>
          <th>Tên Sinh Viên</th>
          <th>Lớp</th>
        </tr>
    ';
    $row = mysqli_fetch_array($result);
    $output2['row'] = $row;
    //echo $output1;
    //echo $output;

    echo json_encode($output2);
    $connect->close();
  }
?>