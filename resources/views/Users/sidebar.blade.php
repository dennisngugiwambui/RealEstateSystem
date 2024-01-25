<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Tenant Portal</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="/home">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link active" href="{{ route('profile') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>



            <!-- Add Book Property Link -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="/book-property">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Book Property</span>
                </a>
            </li>

            <!-- Add My Account Link -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="/my-account">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">My Account</span>
                </a>
            </li>

            <!-- Add Messages Link -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="/messages">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Messages</span>
                </a>
            </li>

            <!-- Add Logout Link -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
