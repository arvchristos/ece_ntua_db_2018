<?php
    require 'database.php';
    include 'template.php';

    $store_id = null;
    if ( !empty($_GET['store_id'])) {
        $store_id = $_REQUEST['store_id'];
    }

    if ( null==$store_id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
      // keep track validation errors




      $store_idError = null;
      $townError = null;
      $postal_codeError = null;
      $streetError = null;
      $street_numError = null;
      $phonesError = null;
      $emailsError = null;




      // keep track post values
      $store_id = $_POST['store_id'];
      $town = $_POST['town'];
      $postal_code = $_POST['postal_code'];
      $street = $_POST['street'];
      $street_num = $_POST['street_num'];
      $phones = $_POST['phones'];
      $emails = $_POST['emails'];


        // validate input
        $valid = true;
        if (empty($store_id)) {
            $store_idError = 'Επιλέξτε ID καταστήματος';
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



        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE stores SET `store_id` = ?,  `town` = ?, `postal_code` = ?, `street` = ?, `street_num` = ? WHERE `store_id` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($store_id,$town,$postal_code,$street,$street_num,$store_id));



//delete previous records
            $sql = "DELETE FROM store_phone WHERE store_id = ? ";
            $q = $pdo->prepare($sql);
            $q->execute(array($store_id));

            $sql = "DELETE FROM store_email WHERE store_id = ? ";
            $q = $pdo->prepare($sql);
            $q->execute(array($store_id));

if (!empty($phones)) {
  $phones = explode(",",$phones);
  foreach ($phones as $phone) {
    $phone_int = (int)$phone;
    $sql2 = "INSERT INTO store_phone (store_id,phone) values(".$store_id.",".$phone_int.")";
    $q2 = $pdo->prepare($sql2);
    $q2->execute();
  }
}

if (!empty($emails)) {
  $emails = explode(",",$emails);
  foreach ($emails as $email) {
    $sql3 = "INSERT INTO store_email (store_id,email) values(".$store_id.",'".$email."')";
    $q3 = $pdo->prepare($sql3);
    $q3->execute();
  }
}

            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$_dbtable." where store_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($store_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $store_id = $data['store_id'];
        $town = $data['town'];
        $postal_code = $data['postal_code'];
        $street = $data['street'];
        $street_num = $data['street_num'];

        $sql = "SELECT * FROM store_phone where store_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($store_id));
        $phones = $q->fetchAll();

        $sql = "SELECT * FROM store_email where store_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($store_id));
        $emails = $q->fetchAll();

        $phones = array_column($phones, 'phone');
        $emails = array_column($emails, 'email');

        $phones = implode(",",$phones);
        $emails = implode(",",$emails);

        Database::disconnect();
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
                        <h3>Update a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="update.php?store_id=<?php echo $store_id?>" method="post">

                      <div class="control-group <?php echo !empty($store_idError)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="store_id" type="text"  placeholder="Υποκατάστημα" value="<?php echo !empty($store_id)?$store_id:'';?>">
                            <?php if (!empty($store_idError)): ?>
                                <span class="help-inline"><?php echo $store_idError;?></span>
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
                      <div class="control-group <?php echo !empty($emailsError)?'error':'';?>">
                        <label class="control-label">Email Addresses (seperate by comma)</label>
                        <div class="controls">
                            <textarea rows="2" name="emails" type="text" placeholder="Email Addresses" value="<?php echo !empty($emails)?$emails:'';?>"><?php echo !empty($emails)?$emails:'';?></textarea>
                            <?php if (!empty($emailsError)): ?>
                                <span class="help-inline"><?php echo $emailsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($phonesError)?'error':'';?>">
                        <label class="control-label">Mobile Number(seperate by comma)</label>
                        <div class="controls">
                            <textarea rows="2" name="phones" type="text"  placeholder="Mobile Numbers" value="<?php echo !empty($phones)?$phones:'';?>"><?php echo !empty($phones)?$phones:'';?></textarea>
                            <?php if (!empty($phonesError)): ?>
                                <span class="help-inline"><?php echo $phonesError;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
