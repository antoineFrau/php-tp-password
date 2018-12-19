<!DOCTYPE html>
<html>
    <head>
        <title>Template MVC PHP PDO BOOTSTRAP - Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php    
        require_once 'header.html'; 
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="?action=home">Password TP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item <?php echo $_GET["action"] == "home" ? "active" : "";?>">
                    <a class="nav-link" href="?action=home">Home</a>
                </li>
                <li class="nav-item <?php echo $_GET["action"] == "users" ? "active" : ""; ?>">
                    <a class="nav-link" href="?action=users">Users</a>
                </li>
                </ul>
            </div>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <?php 
                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case 'users':
                            echo '<li class="breadcrumb-item active"><a href="?action=users">Users</a></li>';
                            break;
                    }
                }
                ?>
            </ol>
        </nav>
        <div class="container">
            <?php 
            if (isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case 'users':
                        require_once 'users.html';
                        break;
                    default:
                        require_once 'home.html';
                        break;
                }
            }
            ?>
        </div>
        <?php 
            require_once 'footer.html';
        ?>    
        
    </body>
</html>
