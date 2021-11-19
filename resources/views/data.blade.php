@extends ('layouts.app') @section('content')

<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Obat</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">List Data</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Data Obat</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">

                   <!-- Responsive Datatable -->
                  <!-- Responsive Datatable -->
                   <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                           <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Obat</h4>
                                </div>
                            <div class="card-body table-responsive">
                                <table class=" table table-bordered table-striped table table-hover example2">
                                <thead>
                                        <tr>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Stock Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_obat as $data)
                                        <tr>
                                            <td>{{ $data['obatalkes_kode'] }}</td>
                                            <td>{{ $data['obatalkes_nama'] }}</td>
                                            <td>{{ round($data['stok']) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                           </div>
                        </div>
                    </div>
                   </section>
                <!--/ Responsive Datatable -->

    </div>
</div>

@endsection
