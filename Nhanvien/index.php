<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template.css">
    <link rel="stylesheet" href="staff.css">
    <!--  Thêm file .css của trang riêng mình  -->
    <title>UWC2.0</title>
</head>

<body>

    <?php include '../header/header.php';?>
    <!-- Thêm code của phần riêng mình -->
    <?php
    $con = mysqli_connect("localhost", 'root', '', "examples");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error($con));
    }
    $sql = "SELECT * FROM staff_db";
    $records = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <div class="sub_header">
            <p style="text-align: center; font-weight: bold">TRANG CHỦ/NHÂN VIÊN</p>
        </div>
        <div class="sub_sub_header">
            <div class="add_staff">
                <a href="form_add.php"><button type="button" class="add_staff_button">Thêm nhân viên mới</button></a>
            </div>
            <div class="fillter">
                <img src="images/fill_staff.jpg" alt="fillstaff.jpg" style="width: 80%">
            </div>
            <div class="search">
                <img src="images/search_staff.jpg" alt="search_staff.jpg" style="width: 80%;">
            </div>
        </div>
        <div>
            <table>
                <tr>
                    <th class="idd">ID</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th class="type">Type</th>
                    <th>isBackOfficer</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($records)) {
                ?>
                    <tr>
                        <td><?php echo $row["ID"]; ?></td>
                        <td><?php echo $row["FULL_NAME"]; ?></td>
                        <td><?php echo $row["USER_NAME"]; ?></td>
                        <td><?php echo $row["TYPE"]; ?></td>
                        <td><?php echo $row["isBackOfficer"]; ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $row["ID"]; ?>"><button class="detail" type="button">chi tiết</button></a>
                            <a href="delete.php?id=<?php echo $row["ID"]; ?>"><button class="delete" "type="button">xóa</button></a>
                            <a href="edit_form.php?id=<?php echo $row["ID"]; ?>"><button class="edit" "type="button">cập nhật</button></a>
                            <a href="work_calender.php?id=<?php echo $row["ID"]; ?>"><button class="calender" type="button">lịch làm việc</button></a>
                            <a href="send_message.php?id=<?php echo $row["ID"]; ?>"><button class="message" type="button">gửi tin nhắn</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div style="text-align:center;">
                <img src="images/transision_bar.jpg" alt="" style="width: 300px; height: 40px">
            </div>
        </div>

    </div>
    <?php
    mysqli_close($con);
    ?>

    <footer>
        <span>Organization X copyright © by Group2_L01</span>
    </footer>

</body>

</html>