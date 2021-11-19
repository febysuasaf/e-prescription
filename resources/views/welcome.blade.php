@extends ('layouts.app') @section('content')

<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <!-- Basic multiple Column Form section start -->
        <section id="nav-filled">
            <div class="row match-height">
                <!-- Filled Tabs starts -->
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{URL::to('/add-resep')}}" class="report-repeater">
                                @csrf
                                  <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Buat Resep</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Filled Tabs ends -->
     </section>

              <!-- Responsive Datatable -->
                   <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                           <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Resep</h4>
                                </div>
                            <div class="card-body table-responsive">
                                <table class=" table table-bordered table-striped table table-hover example2">
                               <thead>
                                <tr>
                                    <th>ID Resep</th>
                                    <th>Created</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                              <tbody>
                                @foreach($data_resep as $data)
                                <tr>
                                    <td>{{ $data['id_resep'] }}</td>
                                    <td>{{ $data['created_at'] }}</td>
                                    <td><center>
                                    <a href="#" class="btn btn-outline-success mb-1" data-bs-toggle="modal" data-bs-target="#detail_obat"  data-mytitle='{{$data['id_resep']}}'
                                    data-id='{{$data['id_resep']}}' data-toggle="modal">
                                    Detail Data Resep</a>
                                    {{-- <a href="/delete-resep/{{$data->id}}" class="btn btn-outline-danger mb-1 swalDeletedInfo" role="button">
                                    Hapus Resep Obat</a> --}}
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            </div>
                           </div>
                        </div>
                    </div>
                   </section>
    </div>
</div>

<div class="modal fade text-start" id="detail_obat" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Detail Data Resep</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body detail-obat">
                <br>
                <center>
                    <p>Harap Tunggu&hellip;</p>
                </center>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

@endsection
