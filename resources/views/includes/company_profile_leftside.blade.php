<div class="widget">
    <h5 class="widget-title bg-gray"><i class="lni lni-home"></i> Mening profilim</h5>
    <div class="right-sideabr">
        <ul class="list-group">
            <a href="{{ route('vacancy.index') }}" class="list-group-item @if(request()->segment(1) == 'vacancy' && request()->segment(2) == null) active @endif"><i class="lni lni-list"></i> Vakantlar</a>
            @if(auth()->user()->can_login == 1)
                <a href="{{ route('vacancy.create') }}" class="list-group-item @if(request()->segment(1) == 'vacancy' && request()->segment(2) == 'create') active @endif"><i class="lni lni-plus"></i> Vakant qo'shish</a>
            @endif
            <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lni lni-exit"></i> {{ __('Tizimdan chiqish') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
