@foreach (session('menu') as $item)
<li class="nav-item has-treeview menu-open">
    @if ($_SERVER['REQUEST_URI'] == $item->link)
    <a href="{{ $item->link }}" class="nav-link active">
    @else
    <a href="{{ $item->link }}" class="nav-link ">
    @endif
      <i class="nav-icon {{ $item->icon }}"></i>
      <p>
        {{ $item->title }}
      </p>
    </a>
</li>
@endforeach
