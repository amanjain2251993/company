<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
   <!--Load Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!--Load Google Fonts -->
    <!--Load External CSS -->
    <link rel="stylesheet" href="assests/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="assests/css/style.css" type="text/css" />
    <link rel="stylesheet" href="assests/css/icomoon.css" type="text/css" />
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" type="text/css" />
    <!--Load External JS -->
    <script type='text/javascript' src='assests/js/jquery.min.js'></script>
    <script type="text/javascript" src="assests/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 30px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left; 
        line-height: 24px;       
    }
	.social-btn .btn i {
		float: left;
		margin: 4px 15px  0 5px;
        min-width: 15px;
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>

<body ng-app="myApp">
<div class="login-form" ng-controller="myCtrl">
    <form action="" method="post">
        <h2 class="text-center">Sign in</h2>		
       
		
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email" ng-model="email" required="required">
            </div>
			{{detail.error.email}}
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" ng-model="password" required="required">
            </div>
        </div>
			{{detail.error.password}}        
        <div class="form-group">
            <button type="button" class="btn btn-success btn-block login-btn" ng-click="submit()">Sign in</button>
        </div>
        <div class="clearfix">
            <!-- <label class="pull-left checkbox-inline"><input type="checkbox" name="remember_me" ng-model="remember_me" ng-true-value="'true'" ng-true-value="'false'"> Remember me</label> -->
            <a href="#" class="pull-center text-success" ng-click="forget_password()">Forgot Password?</a>
        </div>  
        
    </form>
    <div class="hint-text small">Don't have an account? <a href="" class="text-success" ng-click="register()">Register Now!</a></div>
</div>



</body>
</html>  
<script>
    var app = angular.module('myApp',[]);
    app.controller('myCtrl',function($scope,$http,$httpParamSerializerJQLike,$window,$timeout){
    $scope.submit = function(){		
        $http({
            url: "<?php echo base_url() ?>login/user_login",
            method: 'POST',
            data : $.param({
                'email': $scope.email, 'password': $scope.password,'remember_me':$scope.remember_me
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function Success(response) {
            if(response.data.result == 1){
				$scope.detail  = response.data;
            $scope.Success = "Valid login";
            $scope.Success = true;
            $timeout(function () {
            $scope.Success = false;
            var landingUrl = "" + "<?php echo base_url() ?>" + "dashboard";
            $window.location.href = landingUrl;
            })}
            else if(response.data.result == 0){
				$scope.detail  = response.data;
				alert('Username and Password is Invalid');
            }else{
				$scope.detail  = response.data;
			}
        }, function Error(response){
             alert('Please Enter Valid Username');
        })
    }
	$scope.register =  function(){
		window.location.href="<?php echo base_url() ?>"+"register";
	}
	$scope.forget_password = function(){
		window.location.href ="<?php echo base_url() ?>"+"forget_password";
	}




    })




</script>                          