<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        {{$title}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/flatpickr/flatpickr.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/noUiSlider/nouislider.min.css')}}">
        @vite(['resources/scss/light/plugins/flatpickr/custom-flatpickr.scss'])
        @vite(['resources/scss/dark/plugins/flatpickr/custom-flatpickr.scss'])
        @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
        @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        
        <!--  END CUSTOM STYLE FILE  -->
        
        <style>
            .toggle-code-snippet { margin-bottom: 0px; }
            body.dark .toggle-code-snippet { margin-bottom: 0px; }
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>

    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Document</li>
                <li class="breadcrumb-item active" aria-current="page">Dooring</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->        
    <div class="row layout-top-spacing">

        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Form Dooring</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="padding: 1.5%;">
                    <form class="row g-3 needs-validation" action="{{ route('dooring.store') }}"  method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">No PO</label>
                            <select class="form-select" name="no_po" id="cb_po" required>
                                <option selected disabled value="">Pilih...</option>                                
                                @foreach ($po as $po)
                                    <option value="{{ $po->id_track }}">{{ $po->no_po }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                No PO tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Rute</label>
                            <input disabled name="rute" type="text" class="form-control" id="rute" placeholder="Rute">
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">PO Kebun</label>
                            <input disabled name="po_kebun" type="text" class="form-control" id="po_kebun" placeholder="PO Kebun">
                        </div>                
                        <div class="col-md-3">
                            <label for="validationCustom03" class="form-label">Nama PT Kebun</label>
                            <input disabled name="nm_kebun" type="text" class="form-control" id="nm_kebun" placeholder="Nama PT Kebun">
                        </div>        
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Estate</label>
                            <input disabled name="simb" type="text" class="form-control" id="est" placeholder="Estate">
                            <div class="invalid-feedback">
                                Form estate tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Jenis Pupuk</label>
                            <input disabled name="simb" type="text" class="form-control" id="brg" placeholder="Jenis Pupuk">
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Upload File Surat BAP</label>
                            <div class="mb-3">
                                <input name="file_bap" accept=".jpg, .png, .pdf" class="form-control file-upload-input" style="height: 48px; padding: 0.75rem 1.25rem;" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Upload File Rekap Kebun</label>
                            <div class="mb-3">
                                <input name="file_rekap" accept=".jpg, .png, .pdf" class="form-control file-upload-input" style="height: 48px; padding: 0.75rem 1.25rem;" type="file" id="formFile">
                            </div>
                        </div>                         

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tabel Dooring</h4>
                            <p> {{ $details }} </p>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="style-3" class="table style-3 dt-table-hover" style="width:100%;">
                                    <thead style="border-bottom: none;">
                                        <tr>
                                            <th>No PO</th>
                                            <th>Rute</th>
                                            <th>Dari Curah</th>
                                            <th>Dari Container</th>
                                            <th>Total Sudah Muat</th>
                                            <th>Total Belum Muat</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($details==0)
                                            @foreach ($trackzero as $tra)
                                            <tr>
                                                <td>{{ $tra->no_po }}</td>
                                                <td>{{ $tra->nama_pol }} - {{ $tra->nama_pod }}</td>
                                                @if ($tra->qty_curah_track==null)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $tra->qty_curah_track }}</td>
                                                @endif
                                                @if ($tra->qty_curah_cont==null)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $tra->qty_curah_cont }}</td>
                                                @endif                                                
                                                <td>0</td>
                                                <td>{{ $tra->total_tonase_track }}</td>
                                                <td class="text-center"><span class="shadow-none badge badge-danger">{{ $tra->status == 1 ? 'Pending' : '' }}</span></td>
                                                <td class="text-center">
                                                    @if($tra->qty != 0)
                                                        <a href="#detailcur" class="btn btn-outline-primary bs-tooltip me-2" data-bs-toggle="modal" data-placement="top" title="Add Curah">Curah</a>
                                                    @endif                                            
                                                    @if($tra->qty2 != 0)
                                                        <a href="#detailcont" class="btn btn-outline-primary bs-tooltip me-2" data-bs-toggle="modal" data-placement="top" title="Add Container">Container</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td>123</td>
                                            {{-- @foreach ($track as $trac)
                                            <tr>
                                                <td>{{ $trac->no_po }}</td>
                                                <td>{{ $trac->nama_pol }} - {{ $trac->nama_pod }}</td>
                                                <td>{{ $trac->muat_curah }}</td>
                                                <td>{{ $trac->muat_container }}</td>
                                                <td>{{ $trac->muat_container + $trac->muat_curah }}</td>
                                                <td>{{ ($trac->total_qty) - ($trac->muat_curah + $trac->muat_container)}}</td>
                                                <td class="text-center"><span class="shadow-none badge badge-danger">{{ $trac->status == 1 ? 'Pending' : '' }}</span></td>
                                                <td class="text-center">
                                                    @if($trac->qty != 0)
                                                        <a href="#detailcur" class="btn btn-outline-primary bs-tooltip me-2" data-bs-toggle="modal" data-placement="top" title="Add Curah">Curah</a>
                                                    @endif                                            
                                                    @if($trac->qty2 != 0)
                                                        <a href="#detailcont" class="btn btn-outline-primary bs-tooltip me-2" data-bs-toggle="modal" data-placement="top" title="Add Container">Container</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach --}}
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tabel Detail Dooring</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="style-4" class="table style-4 dt-table-hover" style="width:100%;">
                                    <thead style="border-bottom: none;">
                                        <tr>
                                            <th>Tgl Muat</th>
                                            <th>Gudang Muat</th>
                                            <th>Nopol</th>
                                            <th>No Container</th>
                                            <th>No Segel</th>
                                            <th>Tonase</th>
                                            <th>SAK</th>
                                            <th>Timbangan</th>
                                            <th>No Surat Jalan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($dtrack as $tra)
                                        <tr>
                                            <td>{{ $tra->tgl_muat }}</td>
                                            <td>{{ $tra->nama_gudang }}</td>
                                            <td>{{ $tra->nopol }}</td>
                                            <td>{{ $tra->no_container }}</td>
                                            <td>{{ $tra->no_segel }}</td>
                                            <td>{{ $tra->qty_tonase }}</td>
                                            <td>{{ $tra->jml_sak }}</td>
                                            <td>{{ $tra->qty_timbang }}</td>
                                            <td>{{ $tra->no_sj }}</td>
                                            <td class="text-center"><span class="shadow-none badge badge-danger">{{ $tra->status == 1 ? 'Pending' : '' }}</span></td>
                                            <td class="text-center">
                                                <a href="" class="bs-tooltip" data-bs-toggle="modal" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                            </td>
                                        </tr>
                                        @endforeach                                                                     --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tabel Dooring</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="show-hide-col" class="table show-hide-col dt-table-hover" style="width:100%;">
                                    <thead style="border-bottom: none;">
                                        <tr>
                                            <th>Customer</th>
                                            <th>SPK</th>
                                            <th>Rute</th>
                                            <th>PO Kebun</th>
                                            <th>PT Kebun</th>
                                            <th>Estate</th>
                                            <th>Description Barang</th>
                                            <th>Qty Dooring</th>
                                            <th>KG</th>
                                            <th>SAK</th>
                                            <th>Date Berangkat</th>
                                            <th>Date Tiba</th>
                                            <th>No Tiket Timbang</th>
                                            <th>No CONT</th>
                                            <th>Nopol</th>
                                            <th>Qty Timbang Kebun</th>
                                            <th>Nama Kapal</th>
                                            <th>TD</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($tbl_po as $tra)
                                        <tr>
                                            <td>{{ $tra->nama_customer }}</td>
                                            <td>{{ $tra->total_qty }}</td>
                                            <td>{{ $tra->nama_pol }} - {{ $tra->nama_pod }}</td>
                                            <td>{{ $tra->nama_gudang }}</td>
                                            <td>{{ $tra->nama_penerima }}</td>
                                            <td>{{ $tra->nama_barang }}</td>
                                            <td>{{ $tra->no_pl }}</td>
                                            <td>{{ $tra->po_muat }}</td>
                                            <td>{{ $tra->po_kebun }}</td>
                                            <td>{{ $tra->qty_muat }}</td>
                                            <td>{{ $tra->jml_bag }}</td>
                                            <td>{{ $tra->qty_timbang }}</td>
                                            <td>{{ $tra->nopol }}</td>
                                            <td>{{ $tra->no_container }}</td>
                                            <td>{{ $tra->kode_kapal }} {{ $tra->nama_kapal }} {{ $tra->voyage }}</td>
                                            <td>{{ $tra->tgl_muat }}</td>                                            
                                            <td>{{ $tra->td }}</td>
                                            <td>{{ $tra->td_jkt }}</td>
                                            <td>{{ $tra->eta }}</td>
                                            <td class="text-center">{!! $tra->status == 1 ? '<span class="shadow-none badge badge-success">Proses Muat</span>' : ($tra->status == 2 ? '<span class="shadow-none badge badge-warning">Selesai Muat</span>' : '') !!}</td>
                                        </tr>
                                        @endforeach                                                                     --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>            

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        
        <script type="module" src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
        <script type="module" src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
        @vite(['resources/assets/js/forms/bootstrap_validation/bs_validation_script.js'])
        <script type="module" src="{{asset('plugins/global/vendors.min.js')}}"></script>
        @vite(['resources/assets/js/custom.js'])
        {{-- <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
        <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
        {{-- <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script> --}}

        <script type='text/javascript'>
            $(document).ready(function() {
                $('#cb_po').change(function() {
                        var selectedId = $(this).val();
                        // $('#sel_emp').find('option').not(':first').remove();
                        if (selectedId !== '') {
                            $.ajax({
                                url: "{{ route('getPoDooring', ['id' => ':id']) }}"
                                    .replace(':id', selectedId),
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    var data = response[0];
                                    $("#po_kebun").empty();
                                    $("#nm_kebun").empty();
                                    $("#est").empty();
                                    $("#brg").empty();
                                    $("#rute").empty();
                                    if (response.length > 0) {
                                        for (var i=0; i<response.length; i++) {

                                            $('#po_kebun').val(response[i].po_kebun);
                                            $('#nm_kebun').val(response[i].nama_penerima);
                                            $('#est').val(response[i].estate);
                                            $('#brg').val(response[i].nama_barang);
                                            $('#rute').val(response[i].nama_pol+" - "+response[i].nama_pod);
                                        }
                                    }else{
                                        console.log("no data");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log("AJAX Error: " + error);
                                }
                            });
                        } else {
                            $('#po_kebun').val('');
                            $('#nm_kebun').val('');
                            $('#est').val('');
                            $('#brg').val('');                                                        
                            $('#rute').val(''); 
                        }
                });
            });
        </script>
        <script>
            var table = $('#show-hide-col').DataTable( {
                "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                },
                buttons: [                 
                    {
                        text: 'Customer',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 0 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'SPK',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 1 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Rute',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 2 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'PO Kebun',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 3 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'PT Kebun',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 4 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Estate',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 5 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Description Barang',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 6 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'QTY Dooring',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 7 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'KG',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 8 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'SAK',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 9 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Date Berangkat',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 10 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Date Tiba',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 11 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'No Tiket Timbang',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 12 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'No CONT',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 13 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Nopol',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 14 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'QTY Timbang Kebun',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 15 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Nama Kapal',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 16 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'TD',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 17 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Status',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 18 );
                            column.visible( ! column.visible() );
                        }
                    },
                    {
                        text: 'Action',
                        className: 'btn btn-secondary toggle-vis mb-1',
                        action: function(e, dt, node, config ) {
                            var column = dt.column( 19 );
                            column.visible( ! column.visible() );
                        }
                    },
                ],
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7,
            });
            // Create a reusable configuration object
            const dataTableConfig = {
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10,
                "responsive": true
            };

            // Initialize DataTables using the configuration
            $('#style-3, #style-4').DataTable(dataTableConfig);            
        </script>
        
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>    