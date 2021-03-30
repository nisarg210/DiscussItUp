<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Forum/partials/_handleLogin.php" method="POST">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="my-2 text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>