<li class="nav-item mT-30">
  <a class='sidebar-link' href="" default>
      <span class="icon-holder">
          <i class="ti-home"></i>
      </span>
      <span class="title">Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class='sidebar-link' href="{{ route('list-cek') }}" default>
      <span class="icon-holder">
          <i class="ti-wallet"></i>
      </span>
      <span class="title">Data Pasien</span>
  </a>
</li>
<li class="nav-item">
  <a class='sidebar-link' href="{{ route('history') }}" default>
      <span class="icon-holder">
          <i class="ti-wallet"></i>
      </span>
      <span class="title">Riwayat Pasien</span>
  </a>
</li>
@php
  date_default_timezone_set('Asia/Jakarta');
  $month = date("m"); 
  $year = date("Y"); 
@endphp

<li class="nav-item">
  <a class='sidebar-link' href="{{ route('data-pemeriksaan',[$month ,$year]) }}" default>
      <span class="icon-holder">
          <i class="ti-credit-card"></i>
      </span>
      <span class="title">Informasi Lab</span>
  </a>
</li>

{{-- <li class="nav-item dropdown open">
    <a class="dropdown-toggle" href="javascript:void(0);">
      <span class="icon-holder">
        <i class="ti-wallet"></i> 
      </span>
      <span class="title">Informasi Lab</span> 
      <span class="arrow"><i class="ti-angle-right"></i></span>
    </a>
    <ul class="dropdown-menu" style="display: block;">
      <li>
        <a class="sidebar-link" href="basic-table.html">Basic Table</a>
      </li>
      <li>
        <a class="sidebar-link" href="datatable.html">Data Table</a>
      </li>
    </ul>
  </li> --}}
