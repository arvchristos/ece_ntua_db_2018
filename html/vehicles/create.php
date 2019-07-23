<?php

    require 'database.php';
    include 'template.php';

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM stores";
    $q = $pdo->prepare($sql);
    $q->execute();
    //$data = $q->fetch(PDO::FETCH_ASSOC);


    Database::disconnect();

    if ( !empty($_POST)) {
        // keep track validation errors

        $plateError = null;
        $store_idError = null;
        $veh_typeError = null;
        $brandError = null;
        $ccError = null;
        $horse_powerError = null;
        $b_yearError = null;
        $kmetersError = null;
        $next_serviceError = null;
        $last_serviceError = null;
        $insurance_endError = null;
        $malfuncsError = null;
        $flawsError = null;

        // keep track post values
        $plate = $_POST['plate'];
        $store_id = $_POST['store_id'];
        $brand = $_POST['brand'];
        $veh_type = $_POST['veh_type'];
        $cc = $_POST['cc'];
        $horse_power = $_POST['horse_power'];
        $b_year = $_POST['b_year'];
        $kmeters = $_POST['kmeters'];
        $next_service = $_POST['next_service'];
        $last_service = $_POST['last_service'];
        $insurance_end = $_POST['insurance_end'];
        $malfuncs = $_POST['malfuncs'];
        $flaws = $_POST['flaws'];

        // validate input
        $valid = true;
        if (empty($plate)) {
            $plateError = 'Εισάγετε Α.Φ.Μ.';
            $valid = false;
        }
        if (empty($store_id)) {
            $store_idError = 'Επιλέξτε ID καταστήματος';
            $valid = false;
        }

        if (empty($veh_type)) {
            $veh_typeError = 'Εισάγετε Επώνυμο';
            $valid = false;
        }

        if (empty($cc)) {
            $ccError = 'Εισάγετε Όνομα';
            $valid = false;
        }

        if (empty($horse_power)) {
            $horse_powerError = 'Εισάγετε Πατρώνυμο';
            $valid = false;
        }
        if (empty($b_year)) {
            $b_yearError = 'Εισάγετε Δ.Ο.Υ.';
            $valid = false;
        }

        if (empty($kmeters)) {
            $kmetersError = 'Επιλέξτε Οικογενειακή Κατάσταση';
            $valid = false;
        }

        if (empty($next_service)) {
            $next_serviceError = 'Εισάγετε αριθμό άδειας οδήγησης';
            $valid = false;
        }

        if (empty($last_service)) {
            $last_serviceError = 'Εισάγετε Ημερομηνία λήξης άδειας οδήγησης';
            $valid = false;
        }

        if (empty($insurance_end)) {
            $insurance_endError = 'Εισάγετε Πόλη';
            $valid = false;
        }



        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ".$_dbtable." (store_id,plate,veh_type,brand,cc,horse_power,b_year,kmeters,next_service,last_service,insurance_end,malfuncs,flaws) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($store_id,$plate,$veh_type,$brand,$cc,$horse_power,$b_year,$kmeters,$next_service,$last_service,$insurance_end,$malfuncs,$flaws));

            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Εισαγωγή νέου υπαλλήλου</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($plateError)?'error':'';?>">
                        <label class="control-label">Αριθμός Κυκλοφορίας</label>
                        <div class="controls">
                            <input name="plate" type="text"  placeholder="Αριθμός κυκλοφορίας" value="<?php echo !empty($plate)?$plate:'';?>">
                            <?php if (!empty($plateError)): ?>
                                <span class="help-inline"><?php echo $plateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($store_idError)?'error':'';?>">
                        <label class="control-label">Υποκατάστημα</label>
                        <div class="controls">
                          <select class="selectpicker" name="store_id">
                            <?php
                            while ($row = $q->fetch(PDO::FETCH_ASSOC))
                            {
                              echo '<option value="'.$row['store_id'].'">'.$row['store_id'].' - '.$row['town'].'</option>';
                            }
                            ?>
                          </select>
                          <?php if (!empty($store_idError)): ?>
                              <span class="help-inline"><?php echo $store_idError;?></span>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($veh_typeError)?'error':'';?>">
                        <label class="control-label">Τύπος</label>
                        <div class="controls">
                            <select class="selectpicker" name="veh_type">
                                <option value="car">Car</option>
                                <option value="motorcycle">Motorcycle</option>
                                <option value="atv">ATV</option>
                                <option value="truck">Truck</option>
                                <option value="mini_van">Mini van</option>
                            </select>
                            <?php if (!empty($veh_typeError)): ?>
                                <span class="help-inline"><?php echo $veh_typeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($brandError)?'error':'';?>">
                        <label class="control-label">Μάρκα</label>
                        <div class="controls">
                            <input name="brand" type="text"  placeholder="Μάρκα" value="<?php echo !empty($brand)?$brand:'';?>">
                            <?php if (!empty($brandError)): ?>
                                <span class="help-inline"><?php echo $brandError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($ccError)?'error':'';?>">
                        <label class="control-label">Κυβισμός</label>
                        <div class="controls">
                            <input name="cc" type="text"  placeholder="Κυβισμός" value="<?php echo !empty($cc)?$cc:'';?>">
                            <?php if (!empty($ccError)): ?>
                                <span class="help-inline"><?php echo $ccError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($horse_powerError)?'error':'';?>">
                        <label class="control-label">Ιπποδύναμη</label>
                        <div class="controls">
                            <input name="horse_power" type="text"  placeholder="Ιπποδύναμη" value="<?php echo !empty($horse_power)?$horse_power:'';?>">
                            <?php if (!empty($horse_powerError)): ?>
                                <span class="help-inline"><?php echo $horse_powerError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($b_yearError)?'error':'';?>">
                        <label class="control-label">Ημερομηνία αγοράς</label>
                        <div class="controls">
                            <input name="b_year" type="text"  placeholder="Ημερομηνια αγοράς" value="<?php echo !empty($b_year)?$b_year:'';?>">
                            <?php if (!empty($b_yearError)): ?>
                                <span class="help-inline"><?php echo $b_yearError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($kmetersError)?'error':'';?>">
                        <label class="control-label">Χιλιόμετρα</label>
                        <div class="controls">
                            <input name="kmeters" type="text"  placeholder="Χιλιόμετρα" value="<?php echo !empty($kmeters)?$kmeters:'';?>">
                            <?php if (!empty($kmetersError)): ?>
                                <span class="help-inline"><?php echo $kmetersError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($next_serviceError)?'error':'';?>">
                        <label class="control-label">Επόμενο service</label>
                        <div class="controls">
                            <input name="next_service" type="text"  placeholder="Επόμενο service" value="<?php echo !empty($next_service)?$next_service:'';?>">
                            <?php if (!empty($next_serviceError)): ?>
                                <span class="help-inline"><?php echo $next_serviceError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($last_serviceError)?'error':'';?>">
                        <label class="control-label">Τελευταίο service</label>
                        <div class="controls">
                            <input name="last_service" type="text"  placeholder="Τελευταίο service" value="<?php echo !empty($last_service)?$last_service:'';?>">
                            <?php if (!empty($last_serviceError)): ?>
                                <span class="help-inline"><?php echo $last_serviceError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($insurance_endError)?'error':'';?>">
                        <label class="control-label">Τέλος Ασφάλειας</label>
                        <div class="controls">
                            <input name="insurance_end" type="text"  placeholder="Τέλος Ασφάλειας" value="<?php echo !empty($insurance_end)?$insurance_end:'';?>">
                            <?php if (!empty($insurance_endError)): ?>
                                <span class="help-inline"><?php echo $insurance_endError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($malfuncsError)?'error':'';?>">
                        <label class="control-label">Ζημιές</label>
                        <div class="controls">
                            <textarea rows="2" name="malfuncs" type="text" placeholder="Ζημιές" value="<?php echo !empty($malfuncs)?$malfuncs:'';?>"></textarea>
                            <?php if (!empty($malfuncsError)): ?>
                                <span class="help-inline"><?php echo $malfuncsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($flawsError)?'error':'';?>">
                        <label class="control-label">Ελλατώματα</label>
                        <div class="controls">
                            <textarea rows="2" name="flaws" type="text"  placeholder="Ελλατώματα" value="<?php echo !empty($flaws)?$flaws:'';?>"></textarea>
                            <?php if (!empty($flawsError)): ?>
                                <span class="help-inline"><?php echo $flawsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
