<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=g031o041', 'g031o041','TAGHRUK18QknZc9Y');
    
    if($_POST != null){
    $stmt = $dbh -> prepare("INSERT INTO users (user_name, password, created, modified) VALUES (:user_name, :password, :created, :modified)");
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':created', $created, PDO::PARAM_STR);
    $stmt->bindParam(':modified', $modified, PDO::PARAM_STR);
    
    $user_name = htmlspecialchars($_POST['user_name']);
    $password = htmlspecialchars($_POST['password']);
    $created = date("Y-m-d H:i:s");
    $modified = $created;

    $stmt->execute();
?>
<p>レコードの挿入に成功しました</p>
<?php
    }
?>
<table>
  <tr>
    <th>user_id</th>
    <th>user_name</th>
    <th>password</th>
    <th>created</th>
    <th>modified</th>
  </tr>
<?php
    foreach($dbh->query('SELECT * from users') as $row):
?>
<tr>
  <th><?php echo $row["user_id"]; ?></th>
  <th><?php echo $row["user_name"]; ?></th>
  <th><?php echo $row["password"]; ?></th>
  <th><?php echo $row["created"]; ?></th>
  <th><?php echo $row["modified"]; ?></th>
</tr>
<?php
    endforeach;
?>
</table>
<?php
    $dbh = null;
  } catch (PDOException $e) {
    print "エラー!: " . $e->getMessage() . "<br/>";
    die();
}
?>
