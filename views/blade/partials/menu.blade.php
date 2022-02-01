@foreach ($menu as $item)
    @if ($item->childItems()->count())
        <li class="nav-item dropdown{{ $dropEnd ?? '' }}">
            <a class="d-inline-block nav-link" href=" {{ $item->url }}">{{ $item->title }}</a>
            <a class="d-inline-block nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"> </a>
            <ul class="dropdown-menu">
                @include('partials.menu', ['menu' => $item->childItems(), 'dropdownItem' => ' dropdown-item', 'dropEnd'
                => ' dropend'])
            </ul>
        </li>
    @else
        <li class="nav-item{{ $dropdownItem ?? '' }}">
            <a class=" nav-link" href="{{ $item->url }}">
                {{ $item->title }}
            </a>
        </li>
    @endif
@endforeach
