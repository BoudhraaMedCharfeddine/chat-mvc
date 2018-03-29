<?php
if(!isset($_SESSION['id'])){
    header("location : ".strtok($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'], '?').'?route=/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <p></p>
    <div class="jumbotron">
        <h1>Chat Box</h1>
        <p>Chat with your friends.</p>
        <div class=" pull-right">
            Welcome <b><?php echo $_SESSION['username']; ?></b> <a href="<?php echo strtok($_SERVER['REQUEST_URI'], '?').'?route=/logout'?>">Logout</a>
        </div>
        <p></p>
    </div>

    <div class="row">
        <div class="col col-sm-8">
            <h2>List of messages</h2>
            <ul class="list-group">
                <?php
                foreach ($messages as $message){ ?>
                    <li class="list-group-item"><b><?php echo $message->getUser()->getUsername();?> </b> - <?php echo $message->getMessage();?> <span class="badge"><?php echo $message->getDate();?></span></li>
              <?php  }
                ?>

            </ul>
        </div>
        <div class="col col-sm-4">
            <h2>Send new message</h2>
            <form method="post">
                <input type="hidden" name="route" value="/message/new" />
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
