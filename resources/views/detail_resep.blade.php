   <!-- Responsive Datatable -->
                   <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                           <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Detail Resep</h4>
                                </div>
                            <div class="card-body table-responsive">
                                <table class=" table table-bordered table-striped table table-hover">
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
                                @foreach($data_detail_resep as $data)
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
