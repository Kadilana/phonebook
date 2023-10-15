<?php include "includes/query.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/styles.css">
    <title>Profile</title>
</head>
<body class="bg-secondary">
    <div class="container contain w-75 bg-light p-4">
        <div class="topp mb-3">
            <div class="btn-group dropright">
                <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="images/list.png">
                </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?user=<?=$user;?>">Home</a>
                    <a class="dropdown-item" href="profile.php?user=<?=$user;?>">Profile</a>
                    <a class="dropdown-item" href="logout.php?user=<?=$user;?>">Log out</a>
                </div>
            </div>
        </div>

        <div class="card m-auto" style="width: 40rem;" >
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-header">
                <h3 class="card-title">MY PROFILE</h3> 
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h6>Username : </h6> <?=$details['username'];?></li>
                <li class="list-group-item"><h6>Email :</h6> <?=$details['email'];?></li>
                <li class="list-group-item"><h6>Phone no. : </h6> <?=$details['phone_no'];?></li>
                <li class="list-group-item"><h6>Password : </h6> <?=$details['password'];?></li>
                <li class="list-group-item"><h6>Total Contacts : </h6> <?=$total_contacts;?></li>
            </ul>
            <div class="card-body">
                <a class="mx-1" href="profile.php?user=<?=$user;?>&user_edit_id=<?=$details['id'];?>">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                        Edit Details
                    </button>
                </a>
            </div>
        </div>
    </div>
    
    <!--edit contact Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php include "includes/query.php"; ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDITING CONTACT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="process/user-data-process.php" method="post" id="editor">
                            <input type="hidden" name="user" value="<?=$user;?>">
                            <div class="form-group">
                                <label for="exampleInputUser2">Username</label>
                                <input name="username" type="text" class="form-control" id="exampleInputUser2" value="<?=$edit['username'];?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" value="<?=$edit['email'];?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone2">Phone</label>
                                <input name="phone" type="tel" class="form-control" id="exampleInputPhone2" value="<?=$edit['phone_no'];?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone2">Password</label>
                                <input name="pwd" type="password" class="form-control" id="exampleInputPassword2" value="<?=$edit['password'];?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit" form="editor" class="btn btn-primary">Edit Contact</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- modal end -->

    
    <script src="vendor/jquery.js"></script>  
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>  
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script>
        // Get the current URL
        const url = window.location.href;

        // Use regular expressions to check for the 'edit_id' parameter
        const userEditIdParameter = url.match(/[?&]user_edit_id=([^&]+)/);

        if (userEditIdParameter) {
            // 'user_edit_id' parameter is present in the URL
            const userEditId = userEditIdParameter[1];
            // Trigger the Bootstrap modal to open here
            $('#editModal').modal('show');
        }
    </script>
</body>
</html>