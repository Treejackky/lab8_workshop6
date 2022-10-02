<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
    <script>
        function confirmDelete(username) {
            var ans = confirm("ต้องการลบผู้ใช้งาน" + username);
            if (ans == true)
                document.location = "delete.php?username=" + username;
        }
    </script>
</head>

<body>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "ชื่อ" . $row["name"] . "<br>";
        echo "ชื่อผู้ใช้งาน :" . $row["username"] . "<br>";
        echo "รหัสผ่าน :" . $row["password"] . "<br>";
        echo "ที่อยู่ : " . $row["address"] . "<br>";
        echo "มือถือ :" . $row["mobile"] . "<br>";
        echo "อีเมล :" . $row["email"] . "<br>";
        echo "<a href='editform.php?username=" . $row["username"] . "'>แก้ไข</a> | " ;
        echo "<a href='#' onclick= confirmDelete('" . $row ["username"] ."')>ลบ</a>"; // onclikc = confirmDelete('username')
        echo "<hr>\n";
    }
    ?>
</body>

</html>