<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/navbarfixed_style.css">
    <link rel="stylesheet" href="templates/css/dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
<?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
        <div class="dashboard-body">
          <div class="dashboard-left">
            <div class="dashboard-section">
              <h5>ACCOUNTS</h5>
              <div class="dashboard-section-content">
                <div id="image">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Logo" class="account">
    </div>

    <div class="input">
          <input type="number" name="account1" placeholder="Account1" readonly/>
    </div>
    </div>
    <div class="dashboard-section-content">
      <div id="image">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1920px-PayPal.svg.png" alt="Logo" class="account">
      </div>

      <div class="input">
        <input type="number" name="account2" placeholder="Account2" readonly/>
      </div>
      </div>
      </div>
      </div>
      <div class="dashboard-right">
        <div class="dashboard-section">
          <h5>GOALS</h5>
          <div class="dashboard-section-content">
            <!-- Content ng GOALS ditu -->
            <p>

            </p>
          </div>
        </div>

      <div class="dashboard-section">
        <h5>BRANCH VISIT</h5>
        <div class="dashboard-section-content">
            <!-- Content ng BRANCH VISIT ditu -->

        </div>
      </div>

      <div class="dashboard-section">
        <h5>OTHER OPTIONS</h5>
        <div class="dashboard-section-content">
          <!-- Content ng other options ditu -->

        </div>
      </div>
        </div>               
      </div>
    </div>
</body>
</html>