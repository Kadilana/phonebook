<?php include "includes/query.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/styles.css">
    <title>Home</title>
</head>
<body class="bg-secondary">
    <div class="container contain bg-light py-2 px-5">
        <?php include "includes/top.php"; ?>

        <table class="table table-hover table-striped table-secondary">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach($contacts as $contact): $i++;  ?>
                    <tr>
                        <th scope="row"><?=$i;?></th>
                        <td><?=$contact['name'];?></td>
                        <td><?=$contact['phone_no'];?></td>
                        <td><?=$contact['email'];?></td>
                        <td>
                            <a class="mx-1" href="tel: <?=$contact['phone_no'];?>">
                                <img src="icons/call.png" class="border border-white rounded-circle bg-info p-1">
                            </a>
                            <a class="mx-1" href="home.php?user=<?=$user;?>&edit_id=<?=$contact['id'];?>">
                                <img src="icons/edit.png">
                            </a>
                            <a class="mx-1" href="process/user-data-process.php?user=<?=$user;?>&del_id=<?=$contact['id'];?>">
                                <img src="icons/delete.png">
                            </a>
                            <a class="mx-1 hvr" href="home.php?user=<?=$user;?>&shared=<?=$contact['id'];?>">
                                <img src="icons/share.png">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
        
    <!--add contact Modal -->
        <div class="modal fade" id="exampleModal" tabhome="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">NEW CONTACT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="process/user-data-process.php" method="post" id="form">
                            <input type="hidden" name="user" value="<?=$user?>">
                            <div class="form-group">
                                <label for="exampleInputUser1">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputUser1" placeholder="Enter contact name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone1">Phone</label>
                                <input name="phone" type="tel" class="form-control" id="exampleInputPhone1" placeholder="The contact">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="add" form="form" class="btn btn-primary">Add Contact</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- modal end -->

    <!--edit contact Modal -->
    <div class="modal fade" id="editModal" tabhome="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="exampleInputUser2">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputUser2" value="<?=$edit['name'];?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone2">Phone</label>
                                <input name="phone" type="tel" class="form-control" id="exampleInputPhone2" value="<?=$edit['phone_no'];?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" value="<?=$edit['email'];?>">
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

    <!--share contact Modal -->
    <div class="modal fade" id="shareModal" tabhome="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php include "includes/query.php"; ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SHARING CONTACT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>To: </h3>
                        <form action="process/user-data-process.php" method="post" id="share">
                            <input type="hidden" name="share_from" value="<?=$user;?>">
                            <input type="hidden" name="shared" value="<?=$_GET['shared'];?>">
                            <select name="share_to" id="share" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Share to</option>
                                <?php foreach($contacts as $contact): ?>
                                    <option value="<?=$contact['name'];?>">
                                        <?=$contact['name'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="share" form="share" class="btn btn-primary">Share</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- modal end -->

    <!--notification Modal -->
    <div class="modal fade" id="notifyModal" tabhome="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php if(mysqli_num_rows($sharedRows) != 0) { ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">YOU HAVE SHARED CONTACT(S)!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card m-auto" >
                                <ul class="list-group list-group-flush">
                                    <?php foreach($sharedRows as $sharedRow): 
                                        $shared_contact_id = $sharedRow['shared'];
                                        $shared_contact = mysqli_query($conn, "SELECT * FROM contacts WHERE id=$shared_contact_id");
                                        $shared_datas = mysqli_fetch_assoc($shared_contact); 
                                    ?>
                                        <li class="list-group-item"><h6>From : </h6> <?=$sharedRow['share_from'];?></li>
                                        <li class="list-group-item">
                                            <h6>Shared Contact :</h6> 
                                            <?=$shared_datas['name'];?>
                                        </li>
                                        
                                        <li class="list-group-item"><h6>Shared At : </h6> <?=$sharedRow['at'];?></li>
                                        <div class="modal-footer">
                                            <a class="mx-1" href="process/user-data-process.php?user=<?=$user;?>&denied_share_id=<?=$sharedRow['id'];?>">
                                                <button type="button" class="btn btn-danger">
                                                    Decline
                                                </button>
                                            </a>
                                            <a class="mx-1" href="process/user-data-process.php?user=<?=$user;?>&accepted_share_id=<?=$sharedRow['id'];?>&name=<?=$shared_datas['name'];?>&phone=<?=$shared_datas['phone_no'];?>&email=<?=$shared_datas['email'];?>">
                                                <button type="button" class="btn btn-primary">
                                                    Accept
                                                </button>
                                            </a>
                                        </div>
                                        <li class="list-group-item py-3 bg-secondary"></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="modal-footer">  
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">NO SHARED CONTACT!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card m-auto" >
                                <div class="card-body">
                                    <h5>Oops! No any notification, check in later...</h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    <?php } ?>
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
        const editIdParameter = url.match(/[?&]edit_id=([^&]+)/);
        const sharedParameter = url.match(/[?&]shared=([^&]+)/);

        if (editIdParameter) {
            // 'edit_id' parameter is present in the URL
            const editId = editIdParameter[1];
            // Trigger the Bootstrap modal to open here
            $('#editModal').modal('show');
        }

        if (sharedParameter) {
            // 'shared' parameter is present in the URL
            const shared = sharedParameter[1];
            // Trigger the Bootstrap modal to open here
            $('#shareModal').modal('show');
        }
    </script>
</body>
</html>