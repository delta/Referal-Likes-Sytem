<?php
        session_start();
        $fbid=$_SESSION['fbid'];
        $access_token=$_SESSION['access_token'];
        
        if(!isset($_SESSION['fbid']))
        {
            ?>
                    <script type="text/javascript">
                        function redirect()
                            {
                                window.location="http://delta.nitt.edu/~schezwan/fblikes/index.php";
                            }
                        alert("Session Not initiated Properly");
                        setTimeout(redirect(), 1000);
                    </script>
            <?php
        
        }