<?php
    require 'database.php';
    include 'template.php';
    $store_id = 0;
    if ( !empty($_GET['store_id'])) {
        $store_id = $_REQUEST['store_id'];
    }


    if ( !empty($_POST)) {
        // keep track post values
        $store_id = $_POST['store_id'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM stores WHERE store_id= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($store_id));
        Database::disconnect();
        header("Location: index.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete an Entry</h3>
                    </div>

                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="store_id" value="<?php echo $store_id;?>"/>
                      <p class="alert alert-error">Are you sure to delete this entry from this table?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="index.php">No</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
