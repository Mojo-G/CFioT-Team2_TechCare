
<?php
include ('security.php');
include ('include/header.php');
include ('include/navbar.php');
include ('include/slider.php');
include ('include/modals.php');
include_once ('dbconfig.php');
?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Inpatient Database</h6>
            </div>
            
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                  
                  
          <!---Buat ngambil data--->
        <?php
        //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
        $query = "SELECT * FROM `patient`";
        $query_run = mysqli_query($connection, $query);
        ?>
                  
                <table class="table align-items-center mb-0" id="patient-table">
                  <thead>
                    <tr>
                      <th class="text-center text-sm font-weight-bolder mb-0">Patient Name</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">ID Number</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Age</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Room</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Address</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Status</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Doctor</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">Enter Date</th>
                      <th class="text-center text-sm font-weight-bolder mb-0">  </th>
                    </tr>
                  </thead>
                  
                  
                  
                  <tbody>
                      
            <?php
            //mengambil data dari database
            //tipe kolom yang nantinya akan diambil
            if (mysqli_num_rows($query_run) > 0) {
              while($row = mysqli_fetch_assoc($query_run)){
            ?>

                      <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['name']; ?> </p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['idnumber']; ?> </p>
                      </td>
                      
                       <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['age']; ?> </p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['room']; ?> </p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['address']; ?> </p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $row['status']; ?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold mb-0"> <?php echo $row['doctor']; ?> </p>
                      </td>
                      
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold"><?php echo $row['enterdate']; ?></span>
                      </td>
                    </tr>
                    </tr>
                     
        <?php
              }
            }
                     
            //Jika gagal ngambil data akan mengeluarkan peringatan
            else {
              echo "Data tidak ditemukan";
            }
              ?>

                  </tbody>
                  
                  
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Device Usage</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-xs font-weight-bold">Device</th>
                      <th class="text-uppercase text-xs font-weight-bold">Hardware ID</th>
                      <th class="text-uppercase text-xs font-weight-bold">Status</th>
                      <th class="text-uppercase text-xs font-weight-bold">Memory Usage</th>
                      <th class="text-uppercase text-xs font-weight-bold">Process Usage</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                  
                  
                  
                  
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2">

                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Raspberry Pi</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">192.168.102.3</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">Working</span>
                      </td>
                      
                      
                      
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">60%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">60%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>                      
                      
                      
                      
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
<?php
include ('include/footer.php');
?>