<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />

        <!-- css untuk select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!-- choose one -->
        <script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
        <title>Mini Pos</title>
        @include('includes.css-custom')

    </head>
    <body>
        <div class="container-fluid px-4">
            @if(Session::get('success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{ Session::get('success') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @elseif(Session::get('error'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '{{ Session::get('error') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif
            <div class="row vh-100">
                <div class="col-12 col-md-4 col-lg-4 d-none d-md-flex"></div>
                <div class="col-12 col-md-4 col-lg-4 align-self-center">
                    <div class="my-auto">
                        <h3 class="t-dark text-center mb-5">
                            MiniPos <i class="ms-2 pb-1" data-feather="shopping-bag" width="24" height="24"></i>
                        </h3>
                        @guest
                            <h3 class="t-dark text-center mb-5">
                                Login Admin
                            </h3>
                            <div class="card">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="card-body mt-3">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="contoh : user@gmail.com"  required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" name="password" placeholder="min. 8 huruf" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                            <i class="ms-2" data-feather="log-in" width="13" height="13"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="card text-center">
                                <a class="btn btn-primary" href="{{ route('home') }}">
                                    Kembali ke dashboard
                                    <i class="ms-2" data-feather="log-in" width="13" height="13"></i>
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4"></div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            feather.replace();
        </script>
        @include('includes.script')
    </body>
</html>
