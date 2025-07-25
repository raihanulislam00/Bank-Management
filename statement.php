<?php
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>RS Bank - Account Statement</title> 
<link href="images/Rs1.png" rel="icon">
<link href="images/Rs1.png" rel="apple-touch-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	background: #eeeeee;
}
.form-inline {
	display: inline-block;
}
.navbar-header.col {
	padding: 0 !important;
}
.navbar {		
	background: #fff;
	padding-left: 16px;
	padding-right: 16px;
	border-bottom: 1px solid #d6d6d6;
	box-shadow: 0 0 4px rgba(0,0,0,.1);
}
.nav-link img {
	border-radius: 50%;
	width: 36px;
	height: 36px;
	margin: -8px 0;
	float: left;
	margin-right: 10px;
}
.navbar .navbar-brand {
	color: #555;
	padding-left: 0;
	padding-right: 50px;
	font-family:  'Poppins', sans-serif;
}
.navbar .navbar-brand i {
	font-size: 20px;
	margin-right: 5px;
}
.navbar .nav-item i {
	font-size: 18px;
}
.navbar .dropdown-item i {
	font-size: 16px;
	min-width: 22px;
}
.navbar .nav-item.open > a {
	background: none !important;
}
.navbar .dropdown-menu {
	border-radius: 1px;
	border-color: #e5e5e5;
	box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.navbar .dropdown-menu a {
	color: #777;
	padding: 8px 20px;
	line-height: normal;
}
.navbar .dropdown-menu a:hover, .navbar .dropdown-menu a:active {
	color: #333;
}	
.navbar .dropdown-item .material-icons {
	font-size: 21px;
	line-height: 16px;
	vertical-align: middle;
	margin-top: -2px;
}
.navbar .badge {
	color: #fff;
	background: #f44336;
	font-size: 11px;
	border-radius: 20px;
	position: absolute;
	min-width: 10px;
	padding: 4px 6px 0;
	min-height: 18px;
	top: 5px;
}
.navbar a.notifications, .navbar a.messages {
	position: relative;
	margin-right: 10px;
}
.navbar a.messages {
	margin-right: 20px;
}
.navbar a.notifications .badge {
	margin-left: -8px;
}
.navbar a.messages .badge {
	margin-left: -4px;
}	
.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
	background: transparent !important;
}
@media (min-width: 1200px){
	.form-inline .input-group {
		width: 300px;
		margin-left: 30px;
	}
}
@media (max-width: 1199px){
	.form-inline {
		display: block;
		margin-bottom: 10px;
	}
	.input-group {
		width: 100%;
	}
}

img {
    vertical-align: -15px;
    border-style: none;
    margin-right: 10px;
}
b, strong {
    font-weight: 600;
}

/* Navbar active item */
.nav-item.active .nav-link {
    color: #007bff;
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .navbar-nav {
        margin-top: 5px;
    }
    .navbar-collapse {
        padding: 5px 0;
    }
    .navbar-nav.ml-auto {
        margin-top: 10px;
    }
}

/* Statement page specific styles */
.container {
    padding: 20px;
}

.transaction-card {
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.transaction-card .card-body {
    padding: 15px;
}

.transaction-card .card-footer {
    padding: 10px 15px;
    background: #f8f9fa;
}
</style>
</head>

<?php require 'includes/db_conn.php'; ?>
<?php require 'includes/function.php'; ?>
<?php 
$con = new mysqli('localhost','root','','charusat_bank');
$ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
$userData = $ar->fetch_assoc();
?>
<body>

<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a href="home.php" class="navbar-brand">
        <img src="images/Rs1.png" width="45" alt="" class="logo-img">
        <b>RS Bank</b>
    </a>
  
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <div class="navbar-nav">
            <a href="home.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>">Home</a>
            <a href="account.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'account.php' ? 'active' : ''; ?>">Account</a>
            <a href="statement.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'statement.php' ? 'active' : ''; ?>">Account Statement</a>
            <a href="funds_transfer.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'funds_transfer.php' ? 'active' : ''; ?>">Funds Transfer</a>
        </div>

        <div class="navbar-nav ml-auto">
            <a href="" class="btn btn-warning" data-toggle="tooltip" title="Your current Account Balance">
                Account Balance: $<?php echo $userData['deposit']; ?>
            </a>&nbsp;&nbsp;
            <a href="notice.php">
                <button type="button" class="nav-item nav-link notifications">
                    <i class="fa fa-bell-o"></i>
                </button>
            </a>&nbsp;
            <button type="button" class="nav-item nav-link notifications" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-envelope-o"></i>
            </button>
            
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                    <img src="<?php echo "images/".$userData['profile'];?>" width="100px" alt="profile">
                    <?php echo $userData['name']; ?> <b class="caret"></b>
                </a>
                <div class="dropdown-menu">
                    <a href="profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card transaction-card">
        <div class="card-header text-center">
            Transactions Performed on Your Account
        </div>
        <div class="card-body">
            <?php 
                $array = $con->query("select * from transaction where userid = '$userData[id]' order by date desc");
                if ($array->num_rows > 0) {
                    while ($row = $array->fetch_assoc()) {
                        if ($row['action'] == 'withdraw') {
                            echo "<div class='alert alert-secondary'>You have withdrawn $" . $row['debit'] . " from your account on " . $row['date'] . "</div>";
                        }
                        if ($row['action'] == 'deposit') {
                            echo "<div class='alert alert-success'>You have deposited $" . $row['credit'] . " to your account on " . $row['date'] . "</div>";
                        }
                        if ($row['action'] == 'deduction') {
                            echo "<div class='alert alert-danger'>$" . $row['debit'] . " has been deducted from your account on " . $row['date'] . ", Reason: " . $row['other'] . "</div>";
                        }
                        if ($row['action'] == 'transfer') {
                            echo "<div class='alert alert-warning'>$" . $row['debit'] . " has been transferred from your account on " . $row['date'] . ", To Account: " . $row['other'] . "</div>";
                        }
                    }
                } else {
                    echo "<div class='alert alert-info'>No transactions found</div>";
                }
            ?>  
        </div>
        <div class="card-footer text-muted text-center">
            Last Updated: <?php echo date("Y-m-d H:i:s"); ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" value="Manager" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="msg" required></textarea>
                    </div>
            </div>
            <?php
            if (isset($_POST['send']))
            {
                if ($con->query("insert into feedback (message,userid) values ('$_POST[msg]','$_SESSION[userid]')")) {
                    echo '<script>alert("Message sent successfully")</script>';
                } else {
                    echo "<div class='alert alert-danger'>Not sent. Error: ".$con->error."</div>";
                }
            }
            ?>  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="send" class="btn btn-primary">Send Message</button>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>