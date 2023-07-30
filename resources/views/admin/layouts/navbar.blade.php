<nav class="navbar d-flex g-0 w-100">
    <div class="d-flex">
        <a href="{{ route('admin') }}" class="text-white text-decoration-none">
            <div class="fs-4 d-flex justify-content-center" style="width: 17.5rem; color: green">Админ панель</div>
        </a>
    </div>
    <div class="flex-grow-1 d-flex justify-content-end logout-link">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a type="button"
               class="p-2 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
        </form>
    </div>
</nav>
