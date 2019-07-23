<?php
include 'template.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js'></script>
    <script src="js/dirPagination.js"></script>
    <script type="text/javascript">var _databasefile = "<?= $_databasefile ?>";</script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../">Media Libre</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li ><a href="../stores/">Stores</a></li>
              <li class="active"><a href="./">Employees</a></li>
              <li ><a href="../vehicles/">Vehicles</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Queries
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="../queries/query1">Join query 1</a></li>
                    <li><a href="../queries/query2">Join query 2</a></li>
                    <li><a href="../queries/query3">Aggregate query</a></li>
                    <li><a href="../queries/query4">Group By query</a></li>
                    <li><a href="../queries/query5">Order By query</a></li>
                    <li><a href="../queries/query6">Group By query 2</a></li>
                    <li><a href="../queries/query7">Group By Having query</a></li>
                    <li><a href="../queries/query8">Nested query</a></li>
                    <li><a href="../queries/query9">Nested,Join,Order by query</a></li>
                    <li><a href="../queries/query10">Order by query 2</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Views
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="../views/updateable/">Updateable View</a></li>
                      <li><a href="../views/readonly/">Read only View</a></li>
                    </ul>
                  </li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </nav>

  <div role="main" class="container theme-showcase">
      <div class="" style="margin-top:90px;">
        <div class="col-lg-8">
                    <div class="page-header">
                        <h2 id="tables">Λίστα υπαλλήλων της εταιρίας</h2>
                    </div>
                    <div class="bs-component" ng-controller="listdata">

                    </div>
                </div>
      </div>
    </div>

        <div class="container col-md-10 col-md-offset-1" ng-controller='userCtrl' ng-app="myapp">

    <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
                    <h3 class="panel-title">Entries</h3>
            </div>
            <div class="col col-xs-6 text-right">
                    <a href="create.php" class="btn btn-sm btn-primary btn-create">Create</a>
            </div>
          </div>
        </div>
    <div class="panel-body">
      <table class="table table-striped table-bordered table-list">
        <thead>
          <tr>
          <th ng-click="sort('afm')">ΑΦΜ <span class="glyphicon sort-icon" ng-show="sortKey=='afm'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('store_id')">ΚΑΤΑΣΤΗΜΑ <span class="glyphicon sort-icon" ng-show="sortKey=='store_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('last_name')">ΕΠΩΝΥΜΟ <span class="glyphicon sort-icon" ng-show="sortKey=='last_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('first_name')">ΟΝΟΜΑ <span class="glyphicon sort-icon" ng-show="sortKey=='firstName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('d_license')">ΑΔΕΙΑ ΟΔΗΓΗΣΗΣ <span class="glyphicon sort-icon" ng-show="sortKey=='d_license'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('town')">ΠΟΛΗ <span class="glyphicon sort-icon" ng-show="sortKey=='town'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('position')">ΘΕΣΗ <span class="glyphicon sort-icon" ng-show="sortKey=='position'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('salary')">ΑΜΟΙΒΗ <span class="glyphicon sort-icon" ng-show="sortKey=='salary'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('amka')">ΑΜΚΑ <span class="glyphicon sort-icon" ng-show="sortKey=='amka'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th ng-click="sort('id')">Α. ΤΑΥΤΟΤΗΤΑΣ <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
          <th >Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Display records -->
          <tr dir-paginate="employee in employees|orderBy:sortKey:reverse|filter:search|itemsPerPage:10">
          <td class="text-nowrap">{{employee.afm}}</td>
          <td>{{employee.store_id}}</td>
          <td>{{employee.last_name}}</td>
          <td>{{employee.first_name}}</td>
          <td>{{employee.d_license}}</td>
          <td>{{employee.town}}</td>
          <td>{{employee.position}}</td>
          <td>{{employee.salary}}</td>
          <td>{{employee.amka}}</td>
          <td>{{employee.id}}</td>
          <td width=250>
            <?php
              $id= "{{employee.afm}}";
              $last_name= "{{employee.last_name}}";
              echo '<a class="btn" href="read.php?afm='.$id.'">Read</a>';
              echo ' ';
              echo '<a class="btn btn-success" href="update.php?afm='.$id.'&afmprevp='.$id.'">Update</a>';
              echo '';
              echo '<a class="btn btn-danger" href="delete.php?afm='.$id.'">Delete</a>';
            ?>
          </td>
          </tr>

        </tbody>

          </table>
        </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col col-xs-12 text-right">
            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"> </dir-pagination-controls>
            <div class="col col-xs-3 text-left">
              <div class="input-group">
                <input type="text" class="form-control" ng-model="search"  placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

          </div>


        </div>

      </div>
        </div>
      </div>


  </body>
</html>
