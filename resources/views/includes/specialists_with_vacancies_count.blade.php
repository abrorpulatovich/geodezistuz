<!-- Categories Widget -->
<div class="widget">
    <h5 class="widget-title bg-gray">Geodeziya tarmoqlari bo'yicha vakantlar</h5>
    <div class="right-sideabr">
        <ul class="list-item">
            @foreach($specialists_with_vacancies_count as $specialist)
                <li>
                    <a href="{{ route('vacancies', ['id' => $specialist->id]) }}">
                        {{ $specialist->name }} <span class="num-posts"><span class="notinumber">{{ sizeof($specialist->vacancies) }}</span></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
