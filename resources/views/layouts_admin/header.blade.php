<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-white font-weight-bold"> Admin Control</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row justify-content-around" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link text-white" id="books" href="{{ route('admin.books') }}">Books</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="customers" href="{{ route('admin.customers') }}">Customers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="books_rentals" href="{{ route('admin.booksRentals') }}">Books Rentals</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="requests_to_suppliers" href="{{ route('admin.requestsToSuppliers') }}">Requests to Suppliers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="suppliers" href="{{ route('admin.suppliers') }}">Suppliers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="libraries" href="{{ route('admin.libraries') }}">Libraries</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" id="libraries" href="{{ route('admin.authors') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="libraries" href="{{ route('admin.categories') }}">Categories</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand text-white font-weight-bold" href="{{ route('admin.logout') }}">Logout</a>
    </div>
</nav>