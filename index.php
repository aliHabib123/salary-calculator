<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Salary Calculator</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
.bg-dark {
    background-color: rgb(71, 157, 220) !important;
}
.numberofchildren{
	display: none;
}
</style>

</head>

<body>
<?php if (isset($_POST) && !empty($_POST)) {
    
    $status = $_POST['status'];
    $currency = $_POST['currency'];
    $numberOfChildren = $_POST['numberofchildren'];
    $salary = $_POST['salary'];
    $currencyLabel = "L.L";
    if ($currency == 'dollar') {
        $salary = $salary * 1507.5;
        $currencyLabel = "$";
    }

    if ($status == 'single') {
        $nonTaxable = 625000;
    }elseif ($status == 'married') {
        $nonTaxable = 625000 + (2500000/12) + (500000 /12 * $numberOfChildren);
    }elseif ($status == 'widowed') {
        $nonTaxable = 625000 + (500000 /12 * $numberOfChildren);
    }elseif ($status == 'divorced') {
        $nonTaxable = 625000 + (500000 /12 * $numberOfChildren);
    }
    
    $salaryArray = [];
    
    $toBeCalculated0 = ($nonTaxable <= $salary) ? $nonTaxable : $salary;
    $arr1 = [
        'name' => "1",
        'amount' => $toBeCalculated0,
        'isTaxable' => 'no',
        'taxPercent' => '0%',
        'taxAmount' => '0'
    ];
    array_push($salaryArray, $arr1);
    
    $remainingSalary = $salary - $nonTaxable;
    
    if ($remainingSalary > 0){
        $toBeCalculated1 = ($remainingSalary >= 500000) ? 500000 : $remainingSalary;
        $tax1 = $toBeCalculated1 * (2/100);
        $arr2 = [
            'name' => "2",
            'amount' => $toBeCalculated1,
            'isTaxable' => 'yes',
            'taxPercent' => '2%',
            'taxAmount' => $tax1,
        ];
        array_push($salaryArray, $arr2);
    }
    $remainingSalary = $remainingSalary - 500000;
    
    if ($remainingSalary > 0){
        $toBeCalculated2 = ($remainingSalary >= 750000) ? 750000 : $remainingSalary;
        $tax2 = $toBeCalculated2 * (4/100);
        $arr3 = [
            'name' => "3",
            'amount' => $toBeCalculated2,
            'isTaxable' => 'yes',
            'taxPercent' => '4%',
            'taxAmount' => $tax2,
        ];
        array_push($salaryArray, $arr3);
    }
    $remainingSalary = $remainingSalary - 750000;
    
    if ($remainingSalary > 0){
        $toBeCalculated3 = ($remainingSalary >= 1250000) ? 1250000 : $remainingSalary;
        $tax3 = $toBeCalculated3 * (7/100);
        $arr4 = [
            'name' => "4",
            'amount' => $toBeCalculated3,
            'isTaxable' => 'yes',
            'taxPercent' => '7%',
            'taxAmount' => $tax3,
        ];
        array_push($salaryArray, $arr4);
    }
    $remainingSalary = $remainingSalary - 1250000;
    
    if ($remainingSalary > 0){
        $toBeCalculated4 = ($remainingSalary >= 2500000) ? 2500000 : $remainingSalary;
        $tax4 = $toBeCalculated4 * (11/100);
        $arr5 = [
            'name' => "5",
            'amount' => $toBeCalculated4,
            'isTaxable' => 'yes',
            'taxPercent' => '11%',
            'taxAmount' => $tax4,
        ];
        array_push($salaryArray, $arr5);
    }
    $remainingSalary = $remainingSalary - 2500000;
    
    
    if ($remainingSalary > 0){
        $toBeCalculated5 = ($remainingSalary >= 5000000) ? 5000000 : $remainingSalary;
        $tax5 = $toBeCalculated5 * (15/100);
        $arr6 = [
            'name' => "6",
            'amount' => $toBeCalculated5,
            'isTaxable' => 'yes',
            'taxPercent' => '15%',
            'taxAmount' => $tax5,
        ];
        array_push($salaryArray, $arr6);
    }
    $remainingSalary = $remainingSalary - 5000000;
    
    
    
    if ($remainingSalary > 0){
        $toBeCalculated6 = $remainingSalary;
        $tax6 = $toBeCalculated6 * (20/100);
        $arr7 = [
            'name' => "7",
            'amount' => $toBeCalculated6,
            'isTaxable' => 'yes',
            'taxPercent' => '20%',
            'taxAmount' => $tax6,
        ];
        array_push($salaryArray, $arr7);
    }
    
}?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img alt="" src="logo.png" style="max-height: 67px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Salary Calculator
              <span class="sr-only">(current)</span>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row" style="margin-top: 25px">
     <!--  <div class="col-lg-12 text-center">
        <h1 class="mt-5">A Bootstrap 4 Starter Template</h1>
        <p class="lead">Complete with pre-defined file paths and responsive navigation!</p>
        <ul class="list-unstyled">
          <li>Bootstrap 4.5.0</li>
          <li>jQuery 3.5.1</li>
        </ul>
      </div> -->
      <div class="col-lg-6" >
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <div class="form-row">
		    <div class="form-group col-md-12">
		      <label for="inputCity">Dollar Rate</label>
		      <input type="text" class="form-control" id="dollarrate" name="dollarrate" disabled value="1507.5">
		    </div>
	  </div>
      <fieldset class="form-group">
		    <div class="row">
		      <legend class="col-form-label col-sm-3 pt-0">Salary Currency</legend>
		      <div class="col-sm-9">
		        <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="currency" id="dollar" value="dollar" checked>
		          <label class="form-check-label" for="dollar">
		            Dollar
		          </label>
		        </div>
		        <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="currency" id="lebanese" value="lebanese">
		          <label class="form-check-label" for="lebanese">
		            Lebanese Pound
		          </label>
		        </div>
		      </div>
		    </div>
		  </fieldset>
        <fieldset class="form-group">
		    <div class="row">
		      <legend class="col-form-label col-sm-3 pt-0">Marital Status</legend>
		      <div class="col-sm-9">
		        <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="single" checked>
		          <label class="form-check-label" for="gridRadios1">
		            Single
		          </label>
		        </div>
		        <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="married">
		          <label class="form-check-label" for="gridRadios2">
		            Married
		          </label>
		        </div>
		        <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="divorced">
		          <label class="form-check-label" for="gridRadios3">
		            Divorced
		          </label>
		        </div>
		         <div class="form-check form-check-inline">
		          <input class="form-check-input" type="radio" name="status" id="gridRadios4" value="widowed">
		          <label class="form-check-label" for="gridRadios4">
		            Widowed
		          </label>
		        </div>
		      </div>
		    </div>
		  </fieldset>
		  
		  <div class="form-group numberofchildren" >
		    <label for="exampleFormControlSelect1">Number of children</label>
		    <select class="form-control" id="numberofchildren" name="numberofchildren">
		      <option>0</option>
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		      <option>6</option>
		      <option>7</option>
		      <option>8</option>
		      <option>9</option>
		      <option>10</option>
		    </select>
		    <small id="emailHelp" class="form-text text-muted">Maximum 10 allowed</small>
		  </div>
		  
		  <div class="form-row">
		    <div class="form-group col-md-12">
		      <label for="inputCity">Salary</label>
		      <input type="number" class="form-control" id="salary" name="salary" required>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Calculate</button>
		</form>
      </div>
      
      <div class="col-lg-6">
      <?php if (isset($_POST) && !empty($_POST)) {?>
      <div class="row" style="margin-bottom: 25px;">
      <div class="col-md-6">
      <b>Status: </b><?php echo ucfirst($status);?>
      </div>
       <div class="col-md-6">
      <b>Number of children: </b><?php echo $numberOfChildren;?>
      </div>
       <div class="col-md-6">
      <b>Currency: </b><?php echo ucfirst($currency);?>
      </div>
       <div class="col-md-6">
      <b>Salary: </b><?php echo number_format($salary). 'L.L';?>
      </div>
      </div>
      <?php }?>
      <?php if (isset($_POST) && !empty($_POST)) {?>
      <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Amount</th>
		      <th scope="col">Taxable</th>
		      <th scope="col">%</th>
		      <th scope="col">Tax</th>
		    </tr>
		  </thead>
		  <tbody>
		   <?php
		   $totalTax = 0;
		   foreach ($salaryArray as $row) {?>
			 <tr>
		      <th scope="row"><?php echo $row['name']?></th>
		      <td><?php echo number_format($row['amount']).'L.L'?></td>
		      <td><?php echo $row['isTaxable']?></td>
		      <td><?php echo $row['taxPercent']?></td>
		      <td><?php echo number_format($row['taxAmount']).'L.L'?></td>
		    </tr>		   
		   <?php 
		   $totalTax+=$row['taxAmount'];
		   }?>
		   <tr>
              <th colspan="4">Total Tax :</th>
              <td><?php echo number_format($totalTax).'L.L';?></td>
            </tr>
            <tr>
              <th colspan="4">Total Remaining Salary in L.L :</th>
              <td><?php echo number_format($salary - $totalTax).'L.L';?></td>
            </tr>
            <tr>
              <th colspan="4">Total Remaining Salary in $ :</th>
              <td><?php echo number_format(($salary - $totalTax)/1507.5).'$';?></td>
            </tr>
		  </tbody>
		</table>
      <?php }?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="calculator.js"></script>

</body>

</html>
