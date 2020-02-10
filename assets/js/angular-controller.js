var base_url = 'http://localhost/company/';

    app.controller('myCtrl',function($scope,$http,$httpParamSerializerJQLike,$window,$timeout){
		$scope.base_url = 'http://localhost/company/';
		
	
	})
	app.controller('albumCtrl',function($scope,$http,$httpParamSerializerJQLike,$window,$timeout){
		$scope.isAllSelected = function(list) {
			if(list === undefined){return false;}
			return list.length && list.every(function(item) { return item.checked; });
			};
		$scope.isAnySelected = function(list) {
			if(list === undefined){return false;}
			return list.length && list.some(function(item) { return item.checked; });
			};
		$scope.toggleAll = function(list, allChecked) {
			angular.forEach(list, function(item) { item.checked = allChecked; });
		};
		

		$scope.getData = function(){
		
		if($scope.params === undefined){
			$scope.params = {
				'current_page':1,
				'items_per_page':'10',
				'search_key':'',
				'order_by':'title',
				'order_type':'desc'
			}
		}
		
		var queryStr = base_url+'company/get',concate = '?';
		angular.forEach($scope.params, function(value, key) {
			queryStr += concate+key + '=' + value;
			concate = '&';
		});
        //var id = $this->session->userdata('id');
        $http({
            url: queryStr,
            method: "GET",						
            headers: {"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8;"}
        }).then(function(response){	
            $scope.get = response.data;			
        })
     }
		$scope.getData();
		$scope.deleteItemsConfirm = function(id){				
			if(id){
				var selected = id;
				deleteConfirm(function(){$scope.deleteItems(selected)},"Are you sure to delete team profile?", 'Confirm Delete?');
			}
			else{
				var selected = [];
				angular.forEach($scope.get.data, function(item){
					if(item.checked)
						selected.push(item.id)
				});
				deleteConfirm(function(){$scope.deleteItems(selected)},"Are you sure to delete team profile?", 'Confirm Delete?');
			}
		}
		$scope.deleteItems = function(selected){
			var actionUrl = base_url +'company/delete';
			var formData = new FormData();
			formData.append('id', selected);
			$http({
				method  : 'POST',
				url     : actionUrl,
				data    : formData,
				headers : { 'Content-Type': undefined}
				})
			.then(function(response) {
					$scope.delete_data = response.data;
					sagNotify('Company Successfully delete','success');
					 $scope.getData();
			});
		}
		
		$scope.add = function(){
			$('#smart-team-member .smart-list-yes-btn').off('click');
			$('#smart-team-member .smart-list-title').html('Add');
			$('#smart-team-member .smart-list-yes-btn').html('Create');
			$('#smart-team-member .field-name').val('');
			$('#smart-team-member .field-address').val('');
			$('#smart-team-member .field-website').val('');
			$('#smart-team-member .field-email').val('');
			$('#smart-team-member').modal({
				backdrop: 'static',
				keyboard: false
			});
			$('#smart-team-member .smart-list-yes-btn').on('click', function (e) {
				var focusSet = false;
				if (!$('.field-name').val() || !$('.field-email').val()) {
					if ($(".field-name").parent().next(".validation").length == 0) // only add if not added
					{
						$(".field-name").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter name</div>");
					}else{
						$(".field-name").parent().next(".validation").remove();
					}
					if ($(".field-email").parent().next(".validation").length == 0) // only add if not added
					{
						$(".field-email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email</div>");
					}else{
						$(".field-email").parent().next(".validation").remove();
					}				
					e.preventDefault(); // prevent form from POST to server
					$('.field-name').focus();
					focusSet = true;
					return;
				} else {
					$(".field-name").parent().next(".validation").remove();
					$(".field-email").parent().next(".validation").remove();
				}
				
				var formData = $.param({
					name: $('#smart-team-member .field-name').val(),
					address: $('#smart-team-member .field-address').val(),
					website: $('#smart-team-member .field-website').val(),
					email: $('#smart-team-member .field-email').val()
				});	
					var queryStr = base_url+'company/create';
				$http({
						method: 'POST',
						url: queryStr,
						data: formData,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
						}
					})
					.then(function (response) {
						console.log(response);
						if (response.data.status == "success") {
							$('#smart-team-member .field-name').val('');
							$('#smart-team-member .field-email').val('');
							$('#smart-team-member .field-website').val('');
							$('#smart-team-member .field-address').val('');
							$("#smart-team-member").modal("hide");
							$scope.getData();
						}else if(response.data.status == "error"){
							$scope.message = response.data.message;
							if($scope.message.title != ''){
								alert($scope.message.title);
							}else{
								alert($scope.message.email);
								
							}
						}

					});
			});
		}
		$scope.edit = function (item) {
			$('#smart-team-member .smart-list-yes-btn').off('click');
			$('#smart-team-member .smart-list-title').html('Update');
			$('#smart-team-member .field-id').val(item.id);
			$('#smart-team-member .field-name').val(item.title);
			$('#smart-team-member .field-address').val(item.address);
			$('#smart-team-member .field-website').val(item.website);
			$('#smart-team-member .field-email').val(item.email);
			$('#smart-team-member .smart-list-yes-btn').html('Update');

			$('#smart-team-member').modal({
			backdrop: 'static',
			keyboard: false
			});
			$('#smart-team-member .smart-list-yes-btn').on('click', function (e) {
		var formData = $.param({
			id: $('#smart-team-member .field-id').val(),
			name: $('#smart-team-member .field-name').val(),
			address: $('#smart-team-member .field-address').val(),
			website: $('#smart-team-member .field-website').val(),
			email: $('#smart-team-member .field-email').val()
		});
		var queryStr = base_url+'company/update';
		$http({
				method: 'POST',
				url: queryStr,
				data: formData,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
				}
			})
			.then(function (response) {
				sagNotify(response.data.message, response.data.status);
				if (response.data.status == "success") {
					$('#smart-team-member .field-id').val('');
					$('#smart-team-member .field-name').val('');
					$('#smart-team-member .field-description').val('');
					$("#smart-team-member").modal("hide");
					$scope.getData();
				}else if(response.data.status == "error"){
							$scope.message = response.data.message;
							console.log($scope.message);
							if($scope.message.title != ''){
								alert($scope.message.title);
							}else{
								alert($scope.message.email);								
							}
					}

			});
			});
		}
		
	})
	