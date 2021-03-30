<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Forum/partials/_handleSignup.php" method="POST">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" id="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" id="cpassword" name="cpassword" class="form-control"
                            id="floatingPassword" placeholder="Confirm Password">
                        <label for="floatingPassword">ConfirmPassword</label>
                    </div>

                    <div class="my-2 text-center">
                        <button type="submit" class="btn btn-primary">Signup</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>