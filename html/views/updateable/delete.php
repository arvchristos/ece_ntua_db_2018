<?php
    require 'database.php';
    include 'template.php';
    $afm = 0;
    if ( !empty($_GET['afm'])) {
        $afm = $_REQUEST['afm'];
    }


    if ( !empty($_POST)) {
        // keep track post values
        $afm = $_POST['afm'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM simple_employees WHERE afm= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($afm));
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
                      <input type="hidden" name="afm" value="<?php echo $afm;?>"/>
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
