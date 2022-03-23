<!-- Categories Widget -->
<div class="widget">
    <h5 class="widget-title bg-gray">Geodeziya tarmoqlari bo'yicha rezumelar</h5>
    <div class="right-sideabr">
        <ul class="list-item">
            @foreach($specialists_with_rezumes_count as $specialist)
                <li>
                    <a href="#">{{ $specialist->name }} <span class="num-posts"><span class="notinumber">{{ sizeof($specialist->vacancies) }}</span></span></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
