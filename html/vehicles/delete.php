<?php
    require 'database.php';
    include 'template.php';
    $plate = 0;
    if ( !empty($_GET['plate'])) {
        $plate = $_REQUEST['plate'];
    }


    if ( !empty($_POST)) {
        // keep track post values
        $plate = $_POST['plate'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM vehicles WHERE plate= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($plate));
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
                      <input type="hidden" name="plate" value="<?php echo $plate;?>"/>
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
