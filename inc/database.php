<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This is the main database file where most functions are.
-->
<?php
    class database{
        private $servername = "172.31.22.43";
        private $username = "Samarpreet200510621";
        private $password = "sd0JXz34Ay";
        private $database = "Samarpreet200510621";
        public $con;

        public function __construct(){
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if(mysqli_connect_error()){
                trigger_error("Failed to connect:" . mysqli_connect_error());
            }else{
                return $this->con;
            }
        }
        // variables and connection created.

        // this function displays all the users that are registered and only gets called if the person is logged in.
        public function displayRegistered(){
            $query = "SELECT * FROM registered_users";
            $results = $this->con->query($query);
            if($results->num_rows > 0){
                $registered = array();
                while($row = $results->fetch_assoc()){
                    // this note is for my reference because i didn't understand at first what line 25 was doing
                    /*
                It can be decoupled in the following steps:
                1 Calculate $row = $results->fetch_assoc() and return array with elements or NULL.
                2 Substitute $row = $results->fetch_assoc() in while with gotten value and get the following statements: while(array(with elements)) or while(NULL).
                3 If it's while(array(with elements)) it resolves the while condition in True and allow to perform an iteration.
                4 If it's while(NULL) it resolves the while condition in False and exits the loop.
                    */
                    $registered[] = $row;
                }
                return $registered;
            }else{
                echo "No records found";
            }
        }

        // this function is called in when the person clicks on an edit button for a user, after logging in.
        public function displayUsersById($id){
            $query = "SELECT * FROM registered_users WHERE user_id = '$id'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){ // so as long as we find at least 1 record
                $row = $result->fetch_assoc();
                return $row;
            }else{
                echo "No records found.";
            }
        }

        // this function is to actually update the user once the logged in person has made desired modifications.
        public function updateUser($postData){
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $id = $this->con->real_escape_string($_POST['user_id']);
            if(!empty($id) && !empty($postData)){
                    $query = "UPDATE registered_users SET email = '$email', username = '$username' WHERE user_id = '$id'";
                    header("Location:display-users.php?msg2=update"); //redirecting back to the display page to tell them their modifications are done.
                    $sql = $this->con->query($query);
                    }else{
                    echo "Sorry, could not update the record";
                }
            }

            // Method for when the person clicks on the delete button for a user after logging in.
            public function deleteUser($id){
                $query = "DELETE FROM registered_users WHERE user_id = '$id'";
                $sql = $this->con->query($query);
                if($sql == true){
                    header("Location:display-users.php?msg3=delete"); // these messages are picked up by the header file, which displays the corresponding message after action is complete.
                }else{
                    echo "Could not delete the record";
                }
            }

            // this function displays all the games in the database on the content page.
        public function displayGames(){
            $query = "SELECT * FROM games_catalogue";
            $results = $this->con->query($query);
            if($results->num_rows > 0){ // so as long as we have a record in our table, this will run.
                $games = array();
                while($row = $results->fetch_assoc()){ /*
                this can be decoupled in the following steps:
                1 Calculate $row = $results->fetch_assoc() and return array with elements or NULL.
                2 Substitute $row = $results->fetch_assoc() in while with gotten value and get the following statements: while(array(with elements)) or while(NULL).
                3 If it's while(array(with elements)) it resolves the while condition in True and allow to perform an iteration.
                4 If it's while(NULL) it resolves the while condition in False and exits the loop.
                    */
                    $games[] = $row;
                }
                return $games;
            }else{
                echo "No records found";
            }
        }

        // If person logs in and clicks the edit button, this function is called to find which game they want edited.
        public function displayGamesById($id){
            $query = "SELECT * FROM games_catalogue WHERE ID = '$id'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){ // so as long as we find at least 1 record
                $row = $result->fetch_assoc();
                return $row;
            }else{
                echo "No records found.";
            }
        }

        // for updating the game after user makes their modifications.
        public function updateGame($postData){
            $game_name = $this->con->real_escape_string($_POST['game_name']);
            $developer = $this->con->real_escape_string($_POST['developer']);
            $release_date = $this->con->real_escape_string($_POST['release_date']);
            $game_description = $this->con->real_escape_string($_POST['game_description']);
            $id = $this->con->real_escape_string($_POST['ID']);
            if(!empty($id) && !empty($postData)){
                    $query = "UPDATE games_catalogue SET game_name = '$game_name', developer = '$developer', release_date = '$release_date', game_description = '$game_description' WHERE ID = '$id'";
                    header("Location:content.php?msg2=update");
                    $sql = $this->con->query($query);
                    }else{
                    echo "Sorry, could not update the record";
                }
            }

            //deleting the game if person presses the delete button after logging in.
        public function deleteGame($id){
            $query = "DELETE FROM games_catalogue WHERE ID = '$id'";
            $sql = $this->con->query($query);
            if($sql == true){
                header("Location:content.php?msg3=delete");
            }else{
                echo "Could not delete the record";
            }
        }
    }
?>