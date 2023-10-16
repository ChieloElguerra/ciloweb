<?php
  include_once ('include/headers.php')
?>

    <section class="inner-page pt-5">
      <div class="container">
        <div class="container text-left">
          <div class="row">
            <div class="col">
            <section class="container forms">
            <!-- Signup Form -->
            <div class="form signup">
                <div class="form-content">
                    <header>Signup</header>

                    <form action="database/register.php"  method="post">
                        <div class="field input-field">
                            <input type="text" name="firstname" placeholder="Firstname" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="text" name="lastname"  placeholder="Lastname" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="email" name="email"  placeholder="Email" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="text"name="address"  placeholder="address" class="input">
                        </div>


                        <div class="field input-field">
                            <input type="password" name="password"  placeholder="Create password" class="password">
                        </div>
                        <input type="hidden" name="role" value="user">
                        <input type="hidden" name="status" value="active">

                        <div class="field button-field">
                            <button name="submit">Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="login.php">Login</a></span>
                    </div>
                </div>

            </div>


        </section>
            <div class="col">
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      include_once ("include/footers.php")
      ?>

</body>

</html>