<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <button type="button" class="btn btn-outline-danger mx-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Signup
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Student Signup page</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="partials/_signupHandler.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Registration Number</label>
                                    <input type="text" name="registration" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Enter your Registration Number">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">College Roll No</label>
                                    <input type="text" name="roll" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your college roll number">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your phone number">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Enter your Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Choose your Branch</label>
                                    <select class="form-select" name="branch" aria-label="Default select example">
                                        <option selected>Choose your Branch</option>
                                        <option value="1">Computer Science Engineering</option>
                                        <option value="2">Mechanical Engineering</option>
                                        <option value="3">Electrical Engineering</option>
                                        <option value="4">Metallurgy Engineering</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Session Year</label>
                                    <input type="text" name="session-year" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Ex: 2018-21">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal1">
                Login
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="partials/_loginHandler.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Student Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Registration Number</label>
                                    <input type="text" name="registration" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Enter a valid registration number">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>