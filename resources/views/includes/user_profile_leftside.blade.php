<div class="widget">
    <h5 class="widget-title bg-gray"><i class="lni lni-user"></i> Mening profilim</h5>
    <div class="right-sideabr">
        <ul class="list-group">
            <a href="{{ route('user_profile') }}" class="list-group-item @if(request()->segment(3) == 'rezumes') active @endif"><i class="lni lni-list"></i> Mening rezumelarim</a>
            @if(auth()->user()->can_login == 1)
                <a href="{{ route('user_add_rezume') }}" class="list-group-item @if(request()->segment(3) == 'addrezume') active @endif"><i class="lni lni-plus"></i> Rezume qo'shish</a>
            @endif
            <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lni lni-exit"></i> {{ __('Tizimdan chiqish') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
