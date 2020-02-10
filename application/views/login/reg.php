<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style>
.alert-positions{
	position: fixed;
top: 10px;
right: 10px;
width: 95%;
z-index: 1092;
max-width: 30%;
box-sizing: border-box;
}
</style>
<body>
<div class="card bg-light" ng-app="myApp">
<div ng-controller="registerCtrl">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>	
	<form class="form" action="" method="">
	
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" ng-model="username">
		{{detail.error.name}}
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" ng-model="email">
				{{detail.error.email}}  
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		
		<select name="phcode" class="custom-select" style="max-width: 120px;" ng-model="phcode">
		    <option value="">+91</option>
		    <option value="1">+92</option>
		    <option value="2">+93</option>
		    <option value="3">+94</option>
		</select>
    	<input name="phone" class="form-control" placeholder="Phone number" type="text" ng-model="phone_number">
		{{detail.error.phone_number}}
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select name="jobtype" class="form-control" ng-model="jobtype">
			<option value=""> Select job type</option>
			<option value="designer">Designer</option>
			<option value="manager">Manager</option>
			<option value="accounting">Accaunting</option>
		</select>
		{{detail.error.jobtype}}
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password" ng-model="password">
				{{detail.error.password}}
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="confirm_password" class="form-control" placeholder="Repeat password" type="password" ng-model="confirm_password">
		{{detail.error.confirm_password}} 
    </div> <!-- form-group// -->
	
    <div class="form-group">
        <button type="button" class="btn btn-primary btn-block" value="submit" ng-click="user_register()"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="" ng-click="login()">Log In</a> </p>                                                                 
</form>
</article>



</div> <!-- card.// -->

</div> 
<!--container end.//-->

</article>
</div>
</body>
<script>
    var app = angular.module('myApp',[]);
    app.controller('registerCtrl',function($scope,$http,$httpParamSerializerJQLike,$window,$timeout){
  
	$scope.login =  function(){
		window.location.href="<?php echo base_url() ?>"+"login";
	}
	$scope.user_register =  function(){
		var queryStr = "<?php echo base_url() ?>"+"signup/user_register";
		var formData = $.param({
			name: $scope.username,
			email: $scope.email,
			phcode: $scope.phcode,
			phone_number:$scope.phone_number,
			jobtype:$scope.jobtype,
			password:$scope.password,
			confirm_password:$scope.confirm_password			
		});		
		$http({
            method: 'POST',
            url: queryStr,
            data: formData,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;' }
        })
		.then(function(response){
if(response.data.status == 'success'){			
			$scope.detail  = response.data;
			alert('Activation link send your email Id please activate account');
			window.location.href="<?php echo base_url() ?>"+"login";
}else if(response.data.status == 'error'){
	$scope.detail  = response.data;
}
		});
	}
	

     




    })




</script>  