<?php
    require 'database.php';
    include 'template.php';
    $store_id = null;
    if ( !empty($_GET['store_id'])) {
        $store_id = $_REQUEST['store_id'];
    }

    if ( null==$store_id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$_dbtable." WHERE store_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($store_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $sql2 = "SELECT * FROM store_email WHERE store_id = ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($store_id));
        $sql3 = "SELECT * FROM store_phone WHERE store_id = ?";
        $q3 = $pdo->prepare($sql3);
        $q3->execute(array($store_id));


        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Στοιχεία Καταστήματος</h3>
                    </div>

                    <div class="form-horizontal" >

                      <div class="control-group">
                        <label class="control-label">Αριθμός Καταστήματος</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['store_id'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Πόλη</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['town'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Τ.Κ.</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['postal_code'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Οδός</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Αριθμός</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street_num'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">CAR</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['car'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Motorcycle</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['motorcycle'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">ATV</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['atv'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Truck</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['truck'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mini van</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mini_van'];?>
                            </label>
                        </div>
                      </div>

                      <div class="row">
                          <h4>Στοιχεία Επικοινωνίας</h4>
                      </div>
                      <div class="row">
                          <h5>Tηλέφωνο</h5>
                      </div>
                      <ul class="list-group">
                        <?php
                        while ($row = $q3->fetch(PDO::FETCH_ASSOC))
                        {
                          echo '<li class="list-group-item">'.$row['phone'].'</li>';
                        }
                        ?>
                      </ul>
                      <div class="row">
                          <h5>Email</h5>
                      </div>
                      <ul class="list-group">
                        <?php
                        while ($row = $q2->fetch(PDO::FETCH_ASSOC))
                        {
                          echo '<li class="list-group-item">'.$row['email'].'</li>';
                        }
                        ?>
                      </ul>

                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>

                    </div>

                </div>

    </div> <!-- /container -->
  </body>
</html>
