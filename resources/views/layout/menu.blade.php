

<?php $i=0; ?>
@foreach (session('menu') as $item)
    @if($item->status_under_menu == 1)

        @if (!session('under_menus')->where('main_menu_id',$item->id)->where('link', $_SERVER['REQUEST_URI'])->isEmpty())
<li class="nav-item has-treeview menu-open">
            <a href="{{ $item->link }}cc" class="nav-link active">
        @else
<li class="nav-item has-treeview ">

            <a href="{{ $item->link }}" class="nav-link ">
        @endif
    @else
<li class="nav-item has-treeview ">

        @if ($_SERVER['REQUEST_URI'] == $item->link)

            <a href="{{ $item->link }}" class="nav-link ">
        @else
            <a href="{{ $item->link }}" class="nav-link ">
        @endif
    @endif

      <i class="nav-icon {{ $item->icon }}"></i>
      <p>
        {{ $item->title }}
      </p>
      @if ($item->status_under_menu == 1)
        <i class="right fa fa-angle-left"></i>
      @endif
    </a>
    @if ($item->status_under_menu == 1)

    @if(session('under_menus')->where('main_menu_id',$item->id)->contains('link',$_SERVER['REQUEST_URI']))
        <ul class="nav nav-treeview" id="under-menus-status" style="display: block;">
    @else
        <ul class="nav nav-treeview" id="under-menus-status" style="display: none;">
    @endif

        @foreach (session('under_menus')->where('main_menu_id',$item->id) as $under_menus)
        <li class="nav-item under-menus menu-open">
            @if ($_SERVER['REQUEST_URI'] == $under_menus->link)
                <a href="{{ $under_menus->link }}" class="nav-link active">
            @else
                <a href="{{ $under_menus->link }}" class="nav-link ">
            @endif
            {{-- <a href="{{ $under_menus->link }}" class="nav-link"> --}}
              <i class="fas fa-dot-circle nav-icon"></i>
              <p> {{ $under_menus->title }} </p>
            </a>
          </li>

        @endforeach
      </ul>
    @endif

</li>
<?php $i++; ?>
@endforeach


