<?php
session_start();

if(!isset($_SESSION['noteContent'])){
    $_SESSION['thereIsAtLeastOneNote'] = 0;
    $_SESSION['noteContent']=array();
    $_SESSION['noteTitle']=array();
}
if(isset($_POST['noteContent'])){
    $_SESSION['thereIsAtLeastOneNote'] = 1;
    $taille = count($_SESSION['noteContent']);
    $title= $_POST['title'];
    $content = $_POST['noteContent'];
    $_SESSION['noteContent'][$taille] =$content;
    $_SESSION['noteTitle'][$taille] = $title;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Google Keep</title>
    <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<nav>
    <div class="logo-area">
        <div class="tooltip">
            <span class="material-icons-outlined hover">menu</span>
            <span class="tooltip-text">Main Menu</span>
        </div>

        <img
                class="gb_uc gb_7d"
                src="https://www.gstatic.com/images/branding/product/1x/keep_2020q4_48dp.png"
                srcset="
            https://www.gstatic.com/images/branding/product/1x/keep_2020q4_48dp.png 1x,
            https://www.gstatic.com/images/branding/product/2x/keep_2020q4_48dp.png 2x
          "
                alt=""
                aria-hidden="true"
                style="width: 40px; height: 40px;"
        />
        <span class="logo-text">Keep</span>
    </div>

    <div class="search-area">
        <div class="tooltip">
            <span class="material-icons-outlined hover">search</span>
            <span class="tooltip-text">Search</span>
        </div>
        <input type="text" placeholder="Search" />
    </div>
    <div class="settings-area">
        <div class="tooltip">
            <span class="material-icons-outlined hover">refresh</span>
            <span class="tooltip-text">Refresh</span>
        </div>
        <div class="tooltip">
            <span class="material-icons-outlined hover">view_agenda</span>
            <span class="tooltip-text">List View</span>
        </div>
        <div class="tooltip">
            <span class="material-icons-outlined hover">settings</span>
            <span class="tooltip-text">Settings</span>
        </div>
    </div>
    <div class="profile-actions-area">
        <div class="tooltip">
            <span class="material-icons-outlined hover">apps</span>
            <span class="tooltip-text">Apps</span>
        </div>
        <div class="tooltip">
            <span class="material-icons-outlined hover">account_circle</span>
            <span class="tooltip-text">Account</span>
        </div>
    </div>
</nav>
<main>
    <div class="sidebar">
        <div class="sidebar-item">
            <span class="material-icons-outlined hover active">lightbulb</span>
            <span class="sidebar-text">Notes</span>
        </div>
        <div class="sidebar-item">
            <span class="material-icons-outlined hover">notifications</span>
            <span class="sidebar-text">Reminders</span>
        </div>
        <div class="sidebar-item">
            <span class="material-icons-outlined hover">edit</span>
            <span class="sidebar-text">Edit Labels</span>
        </div>
        <div class="sidebar-item">
            <span class="material-icons-outlined hover">archive</span>
            <span class="sidebar-text">Archive</span>
        </div>
        <div class="sidebar-item">
            <span class="material-icons-outlined hover">delete</span>
            <span class="sidebar-text">Trash</span>
        </div>
    </div>


    <div class="form-container active-form">
        <form action="" method="post">
            <input type="text" name="title" class="note-title" placeholder="Title" />
            <input class="note-text" name="noteContent" type="text" placeholder="Take a note..." />
            <div class="form-actions">
                <div class="icons">
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >add_alert</span
                >
                        <span class="tooltip-text">Remind me</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >person_add</span
                >
                        <span class="tooltip-text">Collaborator</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >palette</span
                >
                        <span class="tooltip-text">Change Color</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >image</span
                >
                        <span class="tooltip-text">Add Image</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >archive</span
                >
                        <span class="tooltip-text">Archive</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >more_vert</span
                >
                        <span class="tooltip-text">More</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >undo</span
                >
                        <span class="tooltip-text">Undo</span>
                    </div>
                    <div class="tooltip">
                <span class="material-icons-outlined hover small-icon"
                >redo</span
                >
                        <span class="tooltip-text">Redo</span>
                    </div>
                </div>
                <button class="close-btn" type="submit">Submit</button>

                <button class="close-btn" type="reset">Close</button>
            </div>
        </form>
    </div>


    <?php
    if($_SESSION["thereIsAtLeastOneNote"]){
        for ($i=0;$i<count($_SESSION['noteContent']);$i++){
            ?>

            <div class="notes">
                <div class="note">
                    <span class="material-icons check-circle">check_circle</span>
                    <div class="title">
                        <?php
                        echo $_SESSION['noteTitle'][$i];
                        ?>

                    </div>
                    <div class="text">
                        <?php
                        echo $_SESSION['noteContent'][$i];
                        ?>
                    </div>
                    <div class="note-footer">
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >add_alert</span
              >
                            <span class="tooltip-text">Remind me</span>
                        </div>
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >person_add</span
              >
                            <span class="tooltip-text">Collaborator</span>
                        </div>
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >palette</span
              >
                            <span class="tooltip-text">Change Color</span>
                        </div>
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >image</span
              >
                            <span class="tooltip-text">Add Image</span>
                        </div>
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >archive</span
              >
                            <span class="tooltip-text">Archive</span>
                        </div>
                        <div class="tooltip">
              <span class="material-icons-outlined hover small-icon"
              >more_vert</span
              >
                            <span class="tooltip-text">More</span>
                        </div>
                    </div>
                </div>
            </div>



            <?php
        }

    }
    ?>




    <div class="modal">
        <div class="modal-content">
            <div class="form-container active-form">
                <form>
                    <input type="text" class="note-title" placeholder="Title" />
                    <input
                            class="note-text"
                            type="text"
                            placeholder="Take a note..."
                    />
                    <div class="form-actions">
                        <div class="icons">
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >add_alert</span
                    >
                                <span class="tooltip-text">Remind me</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >person_add</span
                    >
                                <span class="tooltip-text">Collaborator</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >palette</span
                    >
                                <span class="tooltip-text">Change Color</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >image</span
                    >
                                <span class="tooltip-text">Add Image</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >archive</span
                    >
                                <span class="tooltip-text">Archive</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >more_vert</span
                    >
                                <span class="tooltip-text">More</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >undo</span
                    >
                                <span class="tooltip-text">Undo</span>
                            </div>
                            <div class="tooltip">
                    <span class="material-icons-outlined hover small-icon"
                    >redo</span
                    >
                                <span class="tooltip-text">Redo</span>
                            </div>
                        </div>
                        <button class="close-btn">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
