    <style> .fa-sort-desc:before{content:"\f0dd"}.fa-sort-up:before,.fa-sort-asc:before{content:"\f0de"}
 </style>
  <div id="content-wrapper" ng-controller="albumCtrl">

      <div class="col-md-12">
        <h4>Company Details</h4>
		<button type="button" class="btn btn-primary" ng-click="add()">Create New Company</button>
		<span ng-if=" get.data && isAnySelected(get.data)"><button class="btn btn-danger" data-title="Delete" ng-click="deleteItemsConfirm()">Delete</button></span>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped" ng-show="get.data.length != 0 ">
                   
                   <thead>
                   
                   <th rowspan="2" class="text-center" width="5%"> <input class="checkbox" id="checkAll" type="checkbox" 
                    ng-model="allChecked" 
                    ng-click="toggleAll(get.data, allChecked)" 
                    ng-checked="get.data && isAllSelected(get.data)">
                    <label for="checkAll"></label></th>
                   <th>Company name</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Website</th>
                      <th>Edit</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
    
    <tr ng-repeat="item in get.data">
    <td class="text-center">	<input class="checkbox" id="check{{item.id}}" type="checkbox" ng-model="item.checked">
					<label for="check{{item.id}}"></label></td>
    <td>{{item.title}}</td>
    <td>{{item.address}}</td>
    <td>{{item.email}}</td>
    <td>{{item.website}}</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ng-click="edit(item)"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
	
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" ng-click="deleteItemsConfirm(item.id)"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    

    
   
    
    </tbody>
        
</table>

 <div class="d-flex justify-content-between flex-wrap f-14 mt15 mt-md30" ng-show="get.data.length != 0 ">
			 <div class="d-flex justify-content-start align-items-center mb5">
				Show           
				<span class="bs-h40 entries-width px15">
						<select class="selectpicker" ng-model="params.items_per_page" ng-change="get()">
							<option>10</option>
							<option>20</option>
							<option>30</option>
						</select>
						</span>
					<span class="d-none d-xl-block">
						Showing {{((params.current_page-1)*params.items_per_page)+1}} to 
						{{((params.current_page-1)*params.items_per_page)+get.data.length}} of 
						{{get.total_items}} entries
					</span>
			 </div>
			 <div class="mb5">
					<ul uib-pagination class="rounded-pagination f-14"
					ng-model="params.current_page"
					ng-change="get()" 
					total-items="get.total_items" 
					max-size="2"
					boundary-link-numbers="true"
					items-per-page="params.items_per_page"
					previous-text="&#9668;"
					next-text="&#9658;"
					></ul>
			 </div>
				
			 
		  </div>
		  <div class="row" ng-show="get.data.length == 0 ">
			<div class="col-12 text-center blank-page-h d-flex align-items-center">
				<div class="w-100">
					<img src="assets/images/no-data-found-icon.png" class="img-fluid d-block mx-auto">
					<p class="mt15 mt-md25 w700 lato-font">No Record found</p>
					
			  </div>
			</div>
		  </div>
                
            </div>
            
        </div>
	</div>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

    
    <!-- /.content-wrapper -->

  