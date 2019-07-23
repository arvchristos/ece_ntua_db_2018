<?php
    require 'database.php';
    include 'template.php';
    $plate = null;
    if ( !empty($_GET['plate'])) {
        $plate = $_REQUEST['plate'];
    }

    if ( null==$plate ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$_dbtable." WHERE plate = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($plate));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Στοιχεία ΟΧΗΜΑΤΟΣ</h3>
                    </div>

                    <div class="form-horizontal" >

                      <div class="control-group">
                        <label class="control-label">Υποκατάστημα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['store_id'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Αριθμός Κυκλοφορίας</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['plate'];?>
                            </label>
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">Τύπος</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['veh_type'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Μάρκα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['brand'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Κυβισμός</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['cc'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ιπποδύναμη</label>
                        <div class="controls">
                            <label class="checkbox">
                                            <?php echo $data['horse_power'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ετος αγοράς</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['b_year'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Χιλιόμετρα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['kmeters'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Επόμενο service</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['next_service'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Τελευταίο service</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['last_service'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Λήξη ασφάλειας</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['insurance_end'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ζημιές</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['malfuncs'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ελλατώματα</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['flaws'];?>
                            </label>
                        </div>
                      </div>

                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>

                    </div>

                </div>

    </div> <!-- /container -->
  </body>
</html>
