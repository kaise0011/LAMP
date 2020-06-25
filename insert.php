<?php
$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'tateno';
$password = 'Ttntennis1123';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $age  $_POST['age'];

    $sql = "insert into user values(:id, :name, :age)";
    $stmt = $dbh->prepare($sql);
    $params = array(':id' => $id, 'name' => $name, 'age' => $age); 

    $stmt->execute($params);
    header('Location: ./index.php?fg=1');

    echo "接続成功\n";
} catch (PDOException $e) {
    //echo "接続失敗: " . $e->getMessage() . "\n";
    header('Location: ./index.php?fg=2?err=$e->getMessage()');
    exit();
}
?>