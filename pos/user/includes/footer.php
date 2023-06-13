
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hedingh3 text_align_left">
                            <img src="images/logo.png" alt="#" width="200">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hedingh3 text_align_left">
                            <h3> Explore</h3>
                            <ul class="menu_footer">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="shop.php">Meats</a></li>
                                <li><a href="faq.php">FAQs</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hedingh3 text_align_left">
                            <h3>Get in Touch</h3>
                            <ul class="top_infomation">
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="Javascript:void(0)">sjrenewableenergy@gmail.com</a>
                                </li>
                                <li><a href="Javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i>09123456789</a></li>
                                <li><a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i>SJ Renewable Energy</a></li>
                                <li><a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i>@SJRenewable</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hedingh3  text_align_left">
                            <h3>Newsletter</h3>
                            <form id="colof" class="form_subscri">
                                <input class="newsl" placeholder="Enter Email" type="text" name="Email">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});

    </script>
    </body>

    </html>