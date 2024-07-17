<?php require 'application/controllers/signin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<!-- header and links -->
<?php include 'sections/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

  <!-- Top navigation bar -->
  <?php include 'sections/top-navigation-bar.php'; ?>

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg/bg-1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-0 bread">Sign In Account</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Sign In</span></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row block-9">
        <?php echo $message; ?>
        <div class="col-md-7 d-flex">
          <div class="cart-detail bg-white p-3 p-md-4"
            style="background-image: url('images/thrift login.jpg');background-size: cover;">
            <h3 class="mb-4 text-center mt-2" style="color: #e4e8ec; font-weight: bolder;">
              Welcome to ThriftSthetic Online Store
            </h3>
          </div>
        </div>
        <div class="col-md-5 d-flex">
          <form method="post" class="cart-detail bg-white p-3 p-md-4 contact-form" data-parsley-validate>
            <h3 class="mb-4 billing-heading text-center">Sign In</h3>
            <div class="form-group">
              <label for="emailaddress">Email Address</label>
              <input type="email" name="email-address" class="form-control" required="">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required="">
            </div>
            <div class="form-group">
              <input type="submit" name="signin" value="Sign In" class="btn btn-primary py-3 px-5">
            </div>
            <div class="form-group">
              <p class="breadcrumbs text-center">
                <span class="mr-2">
                  <a href="sign-up.php">Create Account</a> |
                  <a style="cursor: pointer;" onclick="resetPassword()">Forgot Password?</a>
                </span>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>     function generateOTP() {
      // Implement OTP generation logic here
      return Math.floor(100000 + Math.random() * 900000).toString(); // Example OTP generation
    }

    function resetPassword() {
      Swal.fire({
        title: 'Reset Password',
        input: 'email',
        inputLabel: 'Enter your Email',
        inputPlaceholder: 'name@gmail.com',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: (email) => {
          if (!email) {
            Swal.showValidationMessage(`No input`);
          } else {
            const otp = generateOTP();
            const data = new FormData();
            data.append('email', email);
            data.append('otp', otp);

            return fetch('email.php', {
              method: 'POST',
              body: data
            })
              .then(response => {
                if (!response.ok) {
                  throw new Error(response.statusText);
                }
                return response.json();
              })
              .then(result => {
                if (result.status === 'success') {
                  return Swal.fire({
                    title: 'OTP Sent!',
                    text: `An OTP has been sent to ${email}`,
                    icon: 'success',
                    input: 'text',
                    inputLabel: 'Enter the OTP',
                    inputPlaceholder: 'Enter your OTP here',
                    inputAttributes: {
                      autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Verify',
                    showLoaderOnConfirm: true,
                    preConfirm: (inputOtp) => {
                      if (!inputOtp) {
                        Swal.showValidationMessage(`No input`);
                      } else if (inputOtp === otp) {
                        return Swal.fire({
                          title: 'OTP Verified!',
                          text: 'Your OTP has been successfully verified. Please enter your new password:',
                          input: 'password',
                          inputPlaceholder: 'Enter your new password',
                          showCancelButton: true,
                          confirmButtonText: 'Change Password',
                          showLoaderOnConfirm: true,
                          preConfirm: (newPassword) => {
                            if (!newPassword) {
                              Swal.showValidationMessage(`No input`);
                            } else {
                              const newPasswordData = new FormData();
                              newPasswordData.append('email', email);
                              newPasswordData.append('password', newPassword);

                              return fetch('changepassword.php', {
                                method: 'POST',
                                body: newPasswordData
                              })
                                .then(response => {
                                  if (!response.ok) {
                                    throw new Error(response.statusText);
                                  }
                                  return response.json();
                                })
                                .then(result => {
                                  if (result.success) {
                                    Swal.fire({
                                      title: 'Password Changed!',
                                      text: 'Your password has been successfully changed.',
                                      icon: 'success'
                                    });
                                  } else {
                                    Swal.fire({
                                      title: 'Error!',
                                      text: 'Failed to change password. Please try again later.',
                                      icon: 'error'
                                    });
                                  }
                                })
                                .catch(error => {
                                  Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to change password. Please try again later.',
                                    icon: 'error'
                                  });
                                });
                            }
                          },
                          allowOutsideClick: () => !Swal.isLoading()
                        });
                      } else {
                        Swal.showValidationMessage(`Incorrect OTP`);
                      }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                  });
                } else {
                  throw new Error(result.message || 'Unknown error');
                }
              })
              .catch(error => {
                console.log(error.message);
                Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: error.message || 'Failed to reset password.'
                });
              });
          }
        },
        allowOutsideClick: () => !Swal.isLoading()
      });
    }
  </script>

  <!-- footer -->
  <?php include 'sections/footer.php'; ?>
  <!-- loader -->
  <?php include 'sections/loader.php'; ?>
  <!-- scripts -->
  <?php include 'sections/scripts.php'; ?>

</body>

</html>