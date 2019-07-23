<?php
    require 'database.php';
    include 'template.php';

    $afm = null;
    $afmprev = null;
    if ( !empty($_GET['afm'])) {
        $afm = $_REQUEST['afm'];
    }

    if ( !empty($_GET['afmprev'])) {
        $afmprev = $_REQUEST['afmprev'];
    }

    if ( null==$afm ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
      // keep track validation errors

      $afmError = null;
      $storeError = null;
      $last_nameError = null;
      $first_nameError = null;
      $townError = null;
      $positionError = null;


      // keep track post values
      $afm = $_POST['afm'];
      $store = $_POST['store'];
      $last_name = $_POST['last_name'];
      $first_name = $_POST['first_name'];
      $town = $_POST['town'];
      $position = $_POST['position'];

        // validate input
        $valid = true;
        if (empty($afm)) {
            $afmError = 'Εισάγετε Α.Φ.Μ.';
            $valid = false;
        }
        if (empty($store)) {
            $storeError = 'Επιλέξτε ID καταστήματος';
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

        if (empty($town)) {
            $townError = 'Εισάγετε Πόλη';
            $valid = false;
        }
        if (empty($position)) {
            $positionError = 'Εισάγετε θέση';
            $valid = false;
        }

        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE simple_employees SET `afm` = ?, `store` = ?, `last_name` = ?, `first_name` = ? , `town` = ?, `position` = ?  WHERE `afm` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($afm, $store,$last_name,$first_name,$town,$position,$afmprev));



            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$_dbtable." where afm = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($afm));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $afm = $data['afm'];
        $store = $data['store'];
        $last_name = $data['last_name'];
        $first_name = $data['first_name'];
        $town = $data['town'];
        $position = $data['position'];

        $sql = "SELECT * FROM stores";
        $q4 = $pdo->prepare($sql);
        $q4->execute();
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
                        <h3>Update an employee</h3>
                    </div>

                    <form class="form-horizontal" action="update.php?afm=<?php echo $afm?>&afmprev=<?php echo $afmprev?>" method="post">

                      <div class="control-group <?php echo !empty($afmError)?'error':'';?>">
                        <label class="control-label">Α.Φ.Μ</label>
                        <div class="controls">
                            <input name="afm" type="text"  placeholder="Α.Φ.Μ." value="<?php echo !empty($afm)?$afm:'';?>">
                            <?php if (!empty($afmError)): ?>
                                <span class="help-inline"><?php echo $afmError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($storeError)?'error':'';?>">
  <label class="control-label">Υποκατάστημα</label>
  <div class="controls">
    <select class="selectpicker" name="store">
      <?php
      while ($row = $q4->fetch(PDO::FETCH_ASSOC))
      {
        echo '<option '.(($data['store']==$row['store_id'])?'selected="selected"':"").' value="'.$row['store_id'].'" >'.$row['store_id'].' - '.$row['town'].'</option>';
      }
      ?>
    </select>
    <?php if (!empty($storeError)): ?>
        <span class="help-inline"><?php echo $storeError;?></span>
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

                      <div class="control-group <?php echo !empty($townError)?'error':'';?>">
                        <label class="control-label">Πόλη</label>
                        <div class="controls">
                            <input name="town" type="text"  placeholder="Πόλη" value="<?php echo !empty($town)?$town:'';?>">
                            <?php if (!empty($townError)): ?>
                                <span class="help-inline"><?php echo $townError;?></span>
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
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
