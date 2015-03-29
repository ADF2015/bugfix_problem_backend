<?php
session_start();
require_once ('../config.php');
print_header();

try {
    $dbh = new PDO(DSN, DBUSER, DBPASSWORD);
} catch(PDOException $e) {
    print ('Error:' . $e->getMessage());
    die();
}

$dbh->query("INSERT INTO guestbooks (name, email, comment) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['comment'] . "' )");

$select_sql = "SELECT name, email, comment FROM guestbooks";
foreach ($dbh->query($select_sql) as $row) {
?>

<b><?php echo $row['name']; ?></b>
<a href="mailto:<?php echo $row['email']; ?>"> <?php echo $row['email']; ?> </a>
<ol><i><?php echo $row['comment']; ?></i></ol>
<hr>
 
<?php
}
print_footer();
