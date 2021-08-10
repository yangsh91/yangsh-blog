<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

        <!-- Masthead-->
       <?php include WEB_COMM_DIR . "/layout/{$lang}/layout.{$lang}.inc.php"; ?>
        <!-- Portfolio Modals-->
        <?php include WEB_COMM_DIR . "/layout/{$lang}/pop_layout.inc.php"; ?>

        <script type="text/javascript">
            $(function() {

                $(".progress").each(function() {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

                })

                function percentageToDegrees(percentage) {

                return percentage / 100 * 360

                }

            });   

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("source");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            }         


            


            function goSendMail(){

                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var message = $('#message').val();

                if(!name){ alert('<?php echo $S_LNG['A00001']; ?>'); return; }
                if(!email){ alert('<?php echo $S_LNG['A00002']; ?>'); return; }
                if(!phone){ alert('<?php echo $S_LNG['A00003']; ?>'); return; }
                if(!message){ alert('<?php echo $S_LNG['A00004']; ?>'); return; }

                
                var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
                if(!reg_email.test(email)) {                            
                    alert('<?php echo $S_LNG['A00005']; ?>');
                    return;         
                }     
                
                $('#loadingButton').css('display','block');
                $('#sendMessageButton').css('display','none');

                $.ajax({
                    url : '/common/mail/contact_mailer.php',
                    type : 'post',
                    data : {'name' : name, 'email' : email, 'phone' : phone, 'message' : message},
                    dataType : 'json',
                    success : function(result){

                        if(result.suc == false){
                            alert(result.msg);
                            $('#loadingButton').css('display','none');
                            $('#sendMessageButton').css('display','block');
                            return;        
                        }else{
                            alert('<?php echo $S_LNG['A00006']; ?>');
                            location.reload();                            
                        }

                    }
                });            
            }
        </script>