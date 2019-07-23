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

        $afmError = null;
        $store_idError = null;
        $last_nameError = null;
        $first_nameError = null;
        $middle_nameError = null;
        $doyError = null;
        $per_stateError = null;
        $d_licenseError = null;
        $d_license_expirationError = null;
        $townError = null;
        $postal_codeError = null;
        $streetError = null;
        $street_numError = null;
        $hire_dateError = null;
        $fire_dateError = null;
        $positionError = null;
        $amkaError = null;
        $idError = null;
        $phonesError = null;
        $emailsError = null;
        $salaryError = null;


        // keep track post values
        $afm = $_POST['afm'];
        $store_id = $_POST['store_id'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $doy = $_POST['doy'];
        $per_state = $_POST['per_state'];
        $d_license = $_POST['d_license'];
        $d_license_expiration = $_POST['d_license_expiration'];
        $town = $_POST['town'];
        $postal_code = $_POST['postal_code'];
        $street = $_POST['street'];
        $street_num = $_POST['street_num'];
        $hire_date = $_POST['hire_date'];
        $fire_date = $_POST['fire_date'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $amka = $_POST['amka'];
        $id = $_POST['id'];
        $phones = $_POST['phones'];
        $emails = $_POST['emails'];

        // validate input
        $valid = true;
        if (empty($afm)) {
            $afmError = 'Εισάγετε Α.Φ.Μ.';
            $valid = false;
        }
        if (empty($store_id)) {
            $store_idError = 'Επιλέξτε ID καταστήματος';
            $valid = false;
        }

        if (empty($last_name)) {
            $last_nameError = 'Εισάγετε Επώνυμο';
            $valid = false;
        }

        if (empty($first_name)) {
            $first_nameError = 'Εισάγετε Όνομα';
            $valid = false;
        }

        if (empty($middle_name)) {
            $middle_nameError = 'Εισάγετε Πατρώνυμο';
            $valid = false;
        }
        if (empty($doy)) {
            $doyError = 'Εισάγετε Δ.Ο.Υ.';
            $valid = false;
        }

        if (empty($per_state)) {
            $per_stateError = 'Επιλέξτε Οικογενειακή Κατάσταση';
            $valid = false;
        }

        if (empty($town)) {
            $townError = 'Εισάγετε Πόλη';
            $valid = false;
        }

        if (empty($postal_code)) {
            $postal_codeError = 'Εισάγετε Τ.Κ.';
            $valid = false;
        }

        if (empty($street)) {
            $streetError = 'Εισάγετε Οδό';
            $valid = false;
        }
        if (empty($street_num)) {
            $street_numError = 'Εισάγετε αριθμό';
            $valid = false;
        }
        if (empty($hire_date)) {
            $hire_dateError = 'Εισάγετε Ημερομηνία πρόσληψης';
            $valid = false;
        }


        if (empty($position)) {
            $positionError = 'Εισάγετε θέση';
            $valid = false;
        }
        if (empty($salary)) {
            $salaryError = 'Εισάγετε αμοιβή';
            $valid = false;
        }

        if (empty($amka)) {
            $amkaError = 'Εισάγετε ΑΜΚΑ';
            $valid = false;
        }
        if (empty($id)) {
            $idError = 'Εισάγετε Αριθμό ταυτότητας';
            $valid = false;
        }



        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ".$_dbtable." (afm,store_id,last_name,first_name,middle_name,doy,per_state,d_license,d_license_expiration,town,postal_code,street,street_num,hire_date,fire_date,position,amka,id,salary) values(?, ?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($afm,$store_id,$last_name,$first_name,$middle_name,$doy,$per_state,$d_license,$d_license_expiration,$town,$postal_code,$street,$street_num,$hire_date,$fire_date,$position,$amka,$id,$salary));

            if (!empty($phones)) {

              $phones = explode(",",$phones);
              foreach ($phones as $phone) {
                $phone_int = (int)$phone;
                $sql2 = "INSERT INTO emp_phone (afm,phone) values(".$afm.",".$phone_int.")";
                $q2 = $pdo->prepare($sql2);
                $q2->execute();
              }
              # code...
            }
            if (!empty($emails)) {

              $emails = explode(",",$emails);
              foreach ($emails as $email) {
                $sql3 = "INSERT INTO emp_email (afm,email) values(".$afm.",'".$email."')";
                $q3 = $pdo->prepare($sql3);
                $q3->execute();
              }
              # code...
            }

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
                      <div class="control-group <?php echo !empty($afmError)?'error':'';?>">
                        <label class="control-label">Α.Φ.Μ</label>
                        <div class="controls">
                            <input name="afm" type="text"  placeholder="Α.Φ.Μ." value="<?php echo !empty($afm)?$afm:'';?>">
                            <?php if (!empty($afmError)): ?>
                                <span class="help-inline"><?php echo $afmError;?></span>
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

                      <div class="control-group <?php echo !empty($last_nameError)?'error':'';?>">
                        <label class="control-label">Επώνυμο</label>
                        <div class="controls">
                            <input name="last_name" type="text"  placeholder="Επώνυμο" value="<?php echo !empty($last_name)?$last_name:'';?>">
                            <?php if (!empty($last_nameError)): ?>
                                <span class="help-inline"><?php echo $last_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($first_nameError)?'error':'';?>">
                        <label class="control-label">Όνομα</label>
                        <div class="controls">
                            <input name="first_name" type="text"  placeholder="Όνομα" value="<?php echo !empty($first_name)?$first_name:'';?>">
                            <?php if (!empty($first_nameError)): ?>
                                <span class="help-inline"><?php echo $first_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($middle_nameError)?'error':'';?>">
                        <label class="control-label">Πατρώνυμο</label>
                        <div class="controls">
                            <input name="middle_name" type="text"  placeholder="Πατρώνυμο" value="<?php echo !empty($middle_name)?$middle_name:'';?>">
                            <?php if (!empty($middle_nameError)): ?>
                                <span class="help-inline"><?php echo $middle_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($doyError)?'error':'';?>">
                        <label class="control-label">Δ.Ο.Υ.</label>
                        <div class="controls">
                            <input name="doy" type="text"  placeholder="Δ.Ο.Υ." value="<?php echo !empty($doy)?$doy:'';?>">
                            <?php if (!empty($doyError)): ?>
                                <span class="help-inline"><?php echo $doyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($per_stateError)?'error':'';?>">
                        <label class="control-label">Οικογενειακή Κατάσταση</label>
                        <div class="controls">
                          <select class="selectpicker" name="per_state">
                            <option value="Παντρεμένος">Παντρεμένος</option>
                            <option value="Ανύπαντρος">Ανύπαντρος</option>
                          </select>
                          <?php if (!empty($per_stateError)): ?>
                              <span class="help-inline"><?php echo $per_stateError;?></span>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($d_licenseError)?'error':'';?>">
                        <label class="control-label">Άδεια οδήγησης</label>
                        <div class="controls">
                            <input name="d_license" type="text"  placeholder="Άδεια οδήγησης" value="<?php echo !empty($d_license)?$d_license:'';?>">
                            <?php if (!empty($d_licenseError)): ?>
                                <span class="help-inline"><?php echo $d_licenseError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($d_license_expirationError)?'error':'';?>">
                        <label class="control-label">Λήξη Άδειας Οδήγησης</label>
                        <div class="controls">
                            <input name="d_license_expiration" type="text"  placeholder="Λήξη Άδειας Οδήγησης" value="<?php echo !empty($d_license_expiration)?$d_license_expiration:'';?>">
                            <?php if (!empty($d_license_expirationError)): ?>
                                <span class="help-inline"><?php echo $d_license_expirationError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($townError)?'error':'';?>">
                        <label class="control-label">Πόλη</label>
                        <div class="controls">
                            <input name="town" type="text"  placeholder="Πόλη" value="<?php echo !empty($town)?$town:'';?>">
                            <?php if (!empty($townError)): ?>
                                <span class="help-inline"><?php echo $townError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($postal_codeError)?'error':'';?>">
                        <label class="control-label">Τ. Κώδικας</label>
                        <div class="controls">
                            <input name="postal_code" type="text"  placeholder="Τ. Κώδικας" value="<?php echo !empty($postal_code)?$postal_code:'';?>">
                            <?php if (!empty($postal_codeError)): ?>
                                <span class="help-inline"><?php echo $postal_codeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($streetError)?'error':'';?>">
                        <label class="control-label">Οδός</label>
                        <div class="controls">
                            <input name="street" type="text"  placeholder="Οδός" value="<?php echo !empty($street)?$street:'';?>">
                            <?php if (!empty($streetError)): ?>
                                <span class="help-inline"><?php echo $streetError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($street_numError)?'error':'';?>">
                        <label class="control-label">Αριθμός</label>
                        <div class="controls">
                            <input name="street_num" type="text"  placeholder="Αριθμός" value="<?php echo !empty($street_num)?$street_num:'';?>">
                            <?php if (!empty($street_numError)): ?>
                                <span class="help-inline"><?php echo $street_numError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($hire_dateError)?'error':'';?>">
                        <label class="control-label">Ημερομηνία Πρόσληψης</label>
                        <div class="controls">
                            <input name="hire_date" type="text"  placeholder="Ημερομηνία Πρόσληψης" value="<?php echo !empty($hire_date)?$hire_date:'';?>">
                            <?php if (!empty($hire_dateError)): ?>
                                <span class="help-inline"><?php echo $hire_dateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($fire_dateError)?'error':'';?>">
                        <label class="control-label">Ημερομηνία Απόλυσης</label>
                        <div class="controls">
                            <input name="fire_date" type="text"  placeholder="Ημερομηνία Απόλυσης" value="<?php echo !empty($fire_date)?$fire_date:'';?>">
                            <?php if (!empty($fire_dateError)): ?>
                                <span class="help-inline"><?php echo $fire_dateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($positionError)?'error':'';?>">
                        <label class="control-label">Θέση</label>
                        <div class="controls">
                            <input name="position" type="text"  placeholder="Θέση" value="<?php echo !empty($position)?$position:'';?>">
                            <?php if (!empty($positionError)): ?>
                                <span class="help-inline"><?php echo $positionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($salaryError)?'error':'';?>">
                        <label class="control-label">Αμοιβή</label>
                        <div class="controls">
                            <input name="salary" type="text"  placeholder="Αμοιβή" value="<?php echo !empty($salary)?$salary:'';?>">
                            <?php if (!empty($salaryError)): ?>
                                <span class="help-inline"><?php echo $salaryError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($amkaError)?'error':'';?>">
                        <label class="control-label">Α.Μ.Κ.Α.</label>
                        <div class="controls">
                            <input name="amka" type="text"  placeholder="Α.Μ.Κ.Α." value="<?php echo !empty($amka)?$amka:'';?>">
                            <?php if (!empty($amkaError)): ?>
                                <span class="help-inline"><?php echo $amkaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">Αριθμός Ταυτότητας</label>
                        <div class="controls">
                            <input name="id" type="text"  placeholder="Αριθμός Ταυτότητας" value="<?php echo !empty($id)?$id:'';?>">
                            <?php if (!empty($idError)): ?>
                                <span class="help-inline"><?php echo $idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailsError)?'error':'';?>">
                        <label class="control-label">Email Addresses (seperate by comma)</label>
                        <div class="controls">
                            <textarea rows="2" name="emails" type="text" placeholder="Email Addresses" value="<?php echo !empty($emails)?$emails:'';?>"></textarea>
                            <?php if (!empty($emailsError)): ?>
                                <span class="help-inline"><?php echo $emailsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($phonesError)?'error':'';?>">
                        <label class="control-label">Mobile Number(seperate by comma)</label>
                        <div class="controls">
                            <textarea rows="2" name="phones" type="text"  placeholder="Mobile Numbers" value="<?php echo !empty($phones)?$phones:'';?>"></textarea>
                            <?php if (!empty($phonesError)): ?>
                                <span class="help-inline"><?php echo $phonesError;?></span>
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
