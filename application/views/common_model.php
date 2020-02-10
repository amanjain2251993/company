<!-- Delete Modal Popup -->
<div class="modal" id="smart-confirmation-box" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-delete-size" role="document">
		<div class="modal-content radius5 border-0">
			<div class="modal-body p15 p-md30 smart-form">
				<img class="img-fluid d-block mx-auto mb15 mb-md20" ng-src="{{cdnUrl}}assets/images/delete-modal-icon.png">
				<div class="w400 vd-gblue-clr f-16 f-md-18 mb5 text-center delete-confirm-title">Confirm Delete Account?</div>
				<p class="f-14 d-gblue-clr text-center delete-confirm-msg">Are you sure you want to delete this account? </p>
			</div>
			<div class="p15 p-md30 custom-modal-foooter text-center">
				<a href="javascript:void(0)" class="base-btn default-btn f-14 mr5" data-dismiss="modal">No</a>
				<a href="#" class="base-btn blue-btn f-14 yes-btn">Yes</a>
			</div>
		</div>
	</div>
</div>

<div id="smart-team-member" class="modal fade" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title smart-list-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
               
                <input type="hidden" name="hiddenid" id="hiddenid" class="form-control field-id"   >
                      <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3"> Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control field-name" 
                         placeholder="Enter Name" name="name"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control field-address" 
                         placeholder="Enter Address" name="address" id="field-address"/>
                    </div>
                  </div>	
					<div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Website</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control field-website" 
                         placeholder="Enter Website" name="description" id="field-website"/>
                    </div>
                  </div>
				<div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control field-email" 
                         placeholder="Enter Email" name="description" id="field-email"/>
                    </div>
                  </div>					  
                  
                    
                                             
            </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary smart-list-yes-btn">Create</button>
      </div>
    </div>
  </div>
</div>

<div id="smart-team-profile" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title smart-list-title" id="exampleModalLabel">Add Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
               
                <input type="hidden" name="hiddenid" id="hiddenid" class="form-control field-id"   >
                    <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Album Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control field-profile-name" 
                         placeholder="Enter Name" name="name"/>
                    </div>
                  </div>
				  
				                           
            </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary smart-list-yes-btn">Create</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" id="smart-list-box" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-copy-size" role="document">
		<div class="modal-content radius5 border-0">
			<div class="modal-body p15 p-md30 smart-form">
				<img class="img-fluid d-block mx-auto mb15 mb-md20" ng-src="{{cdnUrl}}assets/images/create-list-icon.png">
				<div class="w400 vd-gblue-clr f-16 f-md-18 mb5 text-center smart-list-title">Create New List</div>
				<p class="f-14 d-gblue-clr text-center">What do you want to call this list?</p>

				<div class="form-group d-gblue-clr f-14 mb0 mt15 mt-md30">
					<label for="exampleSelect1">List Name</label>
					<input type="text" class="form-control field-h40 f-14 d-gblue-clr field-name" placeholder="Type your list name here">
				</div>
			</div>
			<div class="p15 p-md30 custom-modal-foooter text-center">
				<a href="javascript:void(0)" class="base-btn default-btn f-14 mr5" data-dismiss="modal">Cancel</a>
				<button type="button" class="base-btn blue-btn f-14 smart-list-yes-btn">Create</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="uploadfileModal" tabindex="-1" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Images</h4>
		
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	  <P> Maximum 5 Images Uploaded</p>
        <input  name="myFile" type="file"  multiple onchange="angular.element(this).scope().drop_upload(this.files)" >
		
		
		<!----- Files Listing-->
						<div class="d-flex justify-content-start mt15 mt-md30" ng-repeat="file in upload_loader" ng-if="file.active">
							<div class="d-flex align-items-center">									
									<i class="icon-image f-50 d-gblue-clr" ng-show="file.type=='image'"></i>
							</div>
							<div class="align-self-center ml10" ng-class="{'w-100':!file.complete}">
								<h5 class="vd-gblue-clr w400 f-14">{{file.title}}</h5>
								<div class="rounded-progress mt8" ng-hide="file.complete">
									<div class="rounded-progress-bar s-green-bg" ng-style="{'width':file.percent+'%'}"></div>
								</div>
								<div class="d-gblue-clr w400 f-12 mt8 d-flex justify-content-between flex-wrap">
								<div ng-hide="file.error">{{file.send}} of {{file.size}}</div>
								<div ng-show="file.error" class="vi-red-clr">{{file.message}}</div>
								<div ng-hide="file.complete">{{file.percent}}% Completed</div>
							
								</div>
							</div>							
						</div>
      </div>
	<div class="modal-footer">
        
		<button type="button" class="btn btn-success" ng-click="uploadDone()">Done</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

	
	
	