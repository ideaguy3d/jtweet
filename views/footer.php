<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 4/5/2017
 * Time: 12:19 AM
 */

?>


<footer class="footer">
    <div class="container">
        <p>Built by &copy; <a href="http://www.julius3d.com" target="_blank">Julius3D Studios</a> </p>
    </div>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<!-- Modal Section: -->
<section class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal header: -->
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Login</h5>
                <!-- The 'x' button in top right corner -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal body: -->
            <div class="modal-body">
                <div id="login-alert" class="alert alert-danger"></div>
                <form>
                    <input id="loginActive" type="hidden" name="loginActive" value="1">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input id="email" type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" placeholder="Password">
                    </div>
                </form>
            </div>
            <!-- modal foooter: -->
            <div class="modal-footer">
                <a id="toggleLogin">Sign up</a>
                <button id="loginSignupButton" type="button" class="btn btn-secondary" data-dismiss="modal">Login</button>
            </div>
        </div>
    </div>
</section>

<script>
    (function($){
        $("#toggleLogin").click(function() {
            if($("#loginActive").val() === "1") {
                $('#loginActive').val('0');
                $('#loginModalTitle').html('Sign Up');
                $('#loginSignupButton').html('Sign Up');
                $('#toggleLogin').html('Login');
            } else {
                $('#loginActive').val('1');
                $('#loginModalTitle').html('Login');
                $('#loginSignupButton').html('Login');
                $('#toggleLogin').html('Sign Up');
            }
        });
        
        $('#loginSignupButton').click(function(e) {
            $.ajax({
                type: 'POST',
                url: 'actions.php?action=loginSignup',
                data: 'email='+$('#email').val()+"&password="+$('#password').val()
                    +"&loginActive="+$('#loginActive').val(),
                success: function(result) {
                    if (result == '1') {
                        console.log("user was logged in succussfully");
                        window.location.assign("localhost:81/jtweet");
                    }
                    else {
                        e.preventDefault();
                        $('#login-alert').html(result).show();
                    }
                }
            });
        });

        $('.toggleFollow').click(function(e) {
//            alert("userId = "+$(this).attr('data-userId'));
            var j_id = $(this).attr('data-userId');
            $.ajax({
                type: 'POST',
                url: 'actions.php?action=toggleFollow',
                data: 'userId='+j_id,
                success: function(result) {
                    if(result == '1') {
                        $("a[data-userId='" + j_id + "']").html('Follow');
                    } else if (result === '2') {
                        $("a[data-userId='" + j_id + "']").html('Unfollow');
                    }
                }
            });
        });
    })(jQuery);
</script>

</body>
