<?php
    require 'database.php';
    include 'template.php';
    $afm = null;
    if ( !empty($_GET['afm'])) {
        $afm = $_REQUEST['afm'];
    }

    if ( null==$afm ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$_dbtable." WHERE afm = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($afm));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $sql2 = "SELECT * FROM emp_email WHERE afm = ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($afm));
        $sql3 = "SELECT * FROM emp_phone WHERE afm = ?";
        $q3 = $pdo->prepare($sql3);
        $q3->execute(array($afm));


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
                        <h3>Στοιχεία Υπαλλήλου</h3>
                    </div>

                    <div class="form-horizontal" >

                      <div class="control-group">
                        <label class="control-label">Α.Φ.Μ.</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['afm'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Υποκατάστημα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['store_id'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Επώνυμο</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['last_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Όνομα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['first_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Πατρώνυμο</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['middle_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Α.Μ.Κ.Α.</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['amka'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Αριθμός Ταυτότητας</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['id'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Δ.Ο.Υ</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['doy'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Οικογενειακή Κατάσταση</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['per_state'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Αριθμός Άδειας Οδήγησης</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['d_license'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Λήξη Άδειας οδήγησης</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['d_license_expiration'];?>
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
                        <label class="control-label">Ταχυδρομικός Κώδικας</label>
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
                        <label class="control-label">Ημερομηνία πρόσληψης</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['hire_date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ημερομηνία απόλυσης</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['fire_date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Θέση</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['position'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Αμοιβή</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['salary'];?>
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
