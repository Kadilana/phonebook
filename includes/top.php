<div class="contained my-3">
    <span>
        <h5><b><i><?=strtoupper($details['username']);?>'S PHONEBOOK</i></b></h5>
    </span>

    <div class="top">
        <span data-toggle="modal" data-target="#exampleModal">
            <img src="icons/add.png">
        </span>

        <span data-toggle="modal" data-target="#notifyModal">
            <?php if(mysqli_num_rows($sharedRows) == 0) { ?>
                <img src="icons/notify.png">
            <?php } else { ?>
                    <img src="icons/notify.png">
                    <span class="badge bg-danger position-absolute translate-middle top-0 left-0 border rounded-circle">
                        <?=$totalShared;?>
                    </span>
            <?php } ?>
        </span>
        
        <div class="btn-group dropright">
            <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="icons/list.png">
            </span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="home.php?user=<?=$user;?>">Home</a>
                <a class="dropdown-item" href="profile.php?user=<?=$user;?>">Profile</a>
                <a class="dropdown-item" href="logout.php?user=<?=$user;?>">Log out</a>
            </div>
        </div>
    </div>
</div>