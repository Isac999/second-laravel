<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-white font-weight-bold"> Admin Control</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row justify-content-around" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link text-white" id="books" href="?page=books&pagina=1">Books</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="customers" href="?page=customers&pagina=1">Customers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="books_rentals" href="?page=books_rentals&pagina=1">Books Rentals</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="requests_to_suppliers" href="?page=requests_to_suppliers&pagina=1">Requests to Suppliers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="suppliers" href="?page=suppliers&pagina=1">Suppliers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="libraries" href="?page=libraries&pagina=1">Libraries</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand text-white font-weight-bold" href="{{ route('app.logout') }}">Logout</a>
    </div>
</nav>