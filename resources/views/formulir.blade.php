@extends ('layouts.app') @section('content')
{{-- Message --}}
@include('alert')
{{-- End Message --}}
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Form Obat</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Forms</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Form Obat</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic multiple Column Form section start -->
                <section id="nav-filled">
                    <div class="row match-height">
                        <!-- Filled Tabs starts -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Resep Racik</h4>
                                </div>
                                <div class="card-body">
                                     <form action="{{URL::to('/post-racikan')}}" method="POST" class="report-repeater">
                                         @csrf
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemquantity">Nama Racikan</label>
                                                <input type="hidden" name="id_resep" value="{{$id_resep}}">
                                                <input type="text" class="form-control" id="nama_racikan" required name="nama_racikan" aria-describedby="nama_racikan" placeholder="Nama Racik" />
                                            </div>
                                        </div>
                                            <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="select2-multiple">Signa/Ketentuan</label>
                                                    <select class="form-select" name="signa">
                                                        <option value="">Pilih Signa</option>
                                                    @foreach ($data_signa as $signa)
                                                        <option value="{{$signa->signa_id}}">{{$signa->signa_nama}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemquantity">Qty Racikan</label>
                                                <input type="number" class="form-control" id="qty_racikan" required name="qty_racikan" aria-describedby="qty_racikan" placeholder="Qty" />
                                            </div>
                                        </div>
                                        </div>


                                        <h6>Rincian Obat</h6>
                                        <div data-repeater-list="group">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-7 col-12">
                                                        <div class="mb-1">
                                                             <label class="form-label" for="select2-multiple">Obat</label>
                                                              <select class="form-select" name="obat" required>
                                                                  <option value="">Pilih Obat</option>
                                                                @foreach ($data_obat as $obat)
                                                                    <option value="{{$obat->obatalkes_id}}">{{$obat->obatalkes_nama}} / Stok : {{round($obat->stok)}}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Qty</label>
                                                            <input type="number" class="form-control" id="itemquantity" required name="itemquantity" aria-describedby="itemquantity" placeholder="Qty" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div>

                                         <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    </div>
                                    </div>
                            </form>

                                </div>
                            </div>
                        </div>
                        <!-- Filled Tabs ends -->

                        <!-- Justified Tabs starts -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Resep Non Racik</h4>
                                </div>
                                <div class="card-body">
                                           <form action="{{URL::to('/post-obat')}}" method="POST" class="report-repeater">
                                            @csrf
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-8 col-12">
                                                        <input type="hidden" name="id_resep" value="{{$id_resep}}">
                                                        <div class="mb-1">
                                                             <label class="form-label" for="select2-multiple">Obat</label>
                                                              <select class="form-select" name="obat" required>
                                                                  <option value="">Pilih Obat</option>
                                                                @foreach ($data_obat as $obat)
                                                                    <option value="{{$obat->obatalkes_id}}">{{$obat->obatalkes_nama}} / Stok : {{round($obat->stok)}}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Qty</label>
                                                            <input type="number" class="form-control" id="itemquantity" required name="itemquantity" aria-describedby="itemquantity" placeholder="Qty" />
                                                        </div>
                                                    </div>
                                                     <div class="col-md-8 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="select2-multiple">Signa/Ketentuan</label>
                                                                    <select class="form-select" name="signa">
                                                                        <option value="">Pilih Signa</option>
                                                                    @foreach ($data_signa as $signa)
                                                                        <option value="{{$signa->signa_id}}">{{$signa->signa_nama}}</option>
                                                                    @endforeach
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    </div>
                                    </div>
                            </form>

                                </div>
                            </div>
                        </div>
                        <!-- Justified Tabs ends -->
                    </div>
                </section>


        <!-- Basic Floating Label Form section end -->

     <!-- Responsive Datatable -->
             <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                           <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Obat</h4>
                                </div>
                            <div class="card-body table-responsive">
                                <table class=" table table-bordered table-striped table table-hover example1">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Nama Racikan</th>
                                    <th>Signa/Keterangan</th>
                                    <th>Quantity</th>
                                    <th>Jenis Obat</th>
                                </tr>
                            </thead>
                              <tbody>
                                @foreach($data_resep as $data)
                                <tr>
                                    @if( $data['obatalkes_nama'] != 'Obat Racik' )
                                    <td>{{ $data['obatalkes_nama'] }}</td>
                                    @else
                                    <td>-</td>
                                    @endif

                                    @if( $data['nama_racikan'] != 'NULL' )
                                   <td>{{ $data['nama_racikan'] }}</td>
                                    @else
                                    <td>-</td>
                                    @endif

                                    <td>{{ $data['signa_nama'] }}</td>
                                    <td>{{ $data['quantity'] }}</td>
                                    <td>{{ $data['jenis_obat'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                            </div>
                           </div>
                        </div>
                    </div>
                   </section>

 <section id="responsive-datatable">
        <div class="row">
                <form action="{{URL::to('/')}}" class="report-repeater">
                    @csrf
                        <div class="row mb-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1">Kembali Buat Resep Baru</button>
                        </div>
                        </div>
                    </form>
                </div>
</section>

    </div>
</div>

@endsection
