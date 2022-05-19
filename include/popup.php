<?php 
    include_once ('dbconfig.php');
?>                   
                            <script src="assets/vendor/sweetalert2.min.js"></script>
                            <link rel="stylesheet" href="assets/vendor/sweetalert2.min.css">
                            <script>
                                Swal.fire({
                                    title   : "test",
                                    icon    : "test",
                                    text    : "test",
                                    confirmButtonText: 'Ok'
                                });
                            </script>
       
       
       
       
                            
<?php
 //Ngambil dardi database, tapi cuma satu baris terakhir aja yg diambil    
$query = "SELECT * FROM `detection` ORDER BY `detection`.`timestamp` DESC LIMIT 1";
    $query_run = mysqli_query($connection, $query);
                            
        if (mysqli_num_rows($query_run) > 0)
        foreach ($query_run as $row)

                
                                if($row['status'] == 1){
                                    echo "Ok";
                                }
                                else if($row['status'] == 0){
                                    echo "Patient Fall";
                                }
                                else{
                                    echo "data error";
                                }
                                
                                ?>
                      