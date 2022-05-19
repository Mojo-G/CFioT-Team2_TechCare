<!--Logout Modal-->

<div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">You are going to Log Out</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="text-gradient text-danger mt-4">Attention</h4>
              <p>Make sure all data has been saved</p>
            </div>
          </div>
          <div class="modal-footer">
              
         <form action="include/logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn bg-gradient-danger">Logout</button>
          </form>
            <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
<div class="col-md-4">
    <div class="modal fade" id="modal-delete-patient" tabindex="-1" role="dialog" aria-labelledby="modal-delete-patient" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-delete-patient">Are you sure want to delete this patient?</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <input type="text" name="hapus_id_dokter" id="hapus_id_dokter">
              <i class="fa-regular fa-circle-exclamation"></i>
              <h4 class="text-gradient text-danger mt-4">Attention</h4>
              <p>All deleted data cannot reverted back</p>
            </div>
          </div>
          <div class="modal-footer">
              
         <form action="include/logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn bg-gradient-danger">Delete</button>
          </form>
            <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>