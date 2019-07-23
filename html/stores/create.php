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


              $townError = null;
              $postal_codeError = null;
              $streetError = null;
              $street_numError = null;
              $phonesError = null;
              $emailsError = null;




              // keep track post values

              $town = $_POST['town'];
              $postal_code = $_POST['postal_code'];
              $street = $_POST['street'];
              $street_num = $_POST['street_num'];
              $phones = $_POST['phones'];
              $emails = $_POST['emails'];


                // validate input
                $valid = true;
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




        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ".$_dbtable." (town,postal_code,street,street_num) values(?, ?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($town,$postal_code,$street,$street_num));
            $store_id = $pdo->lastInsertId();

            if (!empty($phones)) {

              $phones = explode(",",$phones);
              foreach ($phones as $phone) {
                $phone_int = (int)$phone;
                $sql2 = "INSERT INTO store_phone (store_id,phone) values(".$store_id.",".$phone_int.")";
                $q2 = $pdo->prepare($sql2);
                $q2->execute();
              }
              # code...
            }

            if (!empty($emails)) {


              $emails = explode(",",$emails);
              foreach ($emails as $email) {
                $sql3 = "INSERT INTO store_email (store_id,email) values(".$store_id.",'".$email."')";
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
                        <h3>Εισαγωγή νέου καταστήματος</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">


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
