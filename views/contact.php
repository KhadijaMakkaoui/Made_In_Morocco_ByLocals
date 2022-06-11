
<section class="mb-4">

    <!--Section heading-->
    <h2 class=" font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Your name</label>
                          <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left mt-4">
                <a class="btn btn-outline-dark" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Marrakech, Maroc </p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+212 612345678</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@madeinmorocco.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
<!-- <h1>Contact us</h1>
<form action="" method="post">
  <div class="mb-3">
    <label  class="form-label">Subject</label>
    <input type="text" name="subject" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" >
  </div>
  <div class="mb-3">
    <label >Body</label>
    <textarea class="form-control" name="body" class="form-control"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<!--Section: Contact v.2-->