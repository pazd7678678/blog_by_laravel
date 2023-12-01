<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">منو</li>

        @foreach(config('ConfigPanel.menus') as $item)
            <li>
                <a href="{{$item['url']}}">
                    <i class="{{$item['icon']}}"></i>
                    <span> {{$item['title']}} </span>
                </a>
            </li>
        @endforeach


    </ul>

</div>
