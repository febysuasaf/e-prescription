<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use App\Models\obatModels;
use App\Models\signaModels;
use App\Models\headerModels;
use App\Models\detailresepModels;
use App\Models\detailresepracikanModels;
use DB;


class HomeController extends Controller
{
    public function addResep(Request $request)
    {

        $id_resep = "RSP".Str::random(8);

        return redirect('view/'.$id_resep);
    }

    public function viewResep(Request $request , $id_resep){

            $data_obat = obatModels::all();
            $data_signa = signaModels::all();
            $data_header = headerModels::where('id_resep',$id_resep)->first();

            if(empty($data_header)){
                $header = headerModels::create([
                    'id_resep' => $id_resep
                ]);
            }

            Session::put('id_resep',$id_resep);

            $data_resep = headerModels::leftjoin('detail_resep','header.id', '=' , 'detail_resep.id_header_resep')
                        ->leftjoin('obatalkes_m','detail_resep.id_obat', '=' ,'obatalkes_m.obatalkes_id')
                        ->leftjoin('signa_m','detail_resep.id_signa','=','signa_m.signa_id')
                        ->select('header.id','header.id_resep','obatalkes_m.obatalkes_nama','detail_resep.nama_racikan', 'signa_m.signa_nama','detail_resep.quantity','detail_resep.jenis_obat')
                        ->where('header.id_resep',$id_resep)
                        ->get();

            return view('formulir')->with('data_obat',$data_obat)
            ->with('data_signa',$data_signa)
            ->with('data_resep',$data_resep)
            ->with('id_resep',$id_resep);

    }

        public function index(Request $request)
        {

        $data_signa = signaModels::all();
        $data_resep = headerModels::all();
        $id_resep = "RSP".Str::random(8);

        $data_detail_resep = headerModels::leftjoin('detail_resep','header.id', '=' , 'detail_resep.id_header_resep')
                            ->leftjoin('obatalkes_m','detail_resep.id_obat', '=' ,'obatalkes_m.obatalkes_id')
                            ->leftjoin('signa_m','detail_resep.id_signa','=','signa_m.signa_id')
                            ->select('header.id','header.id_resep','obatalkes_m.obatalkes_nama','detail_resep.nama_racikan',
                            'signa_m.signa_nama','detail_resep.quantity','detail_resep.jenis_obat')
                            ->get();

        Session::put('id_resep',$id_resep);

        return view('welcome')->with('data_resep',$data_resep)
        ->with('data_detail_resep',$data_detail_resep)
        ->with('data_signa',$data_signa)
        ->with('id_resep',$id_resep);
        }

    public function postRacik(Request $request)
    {
            $group = $request->group;
            $data_header = headerModels::where('id_resep',$request->id_resep)->first();

            DB::beginTransaction();
             $detail_resep = detailresepModels::create([
                 'id_header_resep' => $data_header->id,
                 'id_obat' => '2501',
                 'nama_racikan'=>$request->nama_racikan,
                 'id_signa'=> $request->signa,
                 'jenis_obat'=>'racikan',
                 'quantity' => $request->qty_racikan,
             ]);


            foreach($group as $data){

             $data_stok = obatModels::where('obatalkes_id',$data['obat'])->first();
             $total_stok = $data_stok->stok - $data['itemquantity'];
             $total_stok = number_format((float)$total_stok, 2, '.', '');

                if($data_stok->stok < $data['itemquantity']){
                    DB::rollback();
                    return back()->with('error','Stok Obat Melebihi Quantity / Stok Habis');
                }else{
                $detail_resep_racikan = detailresepracikanModels::create([
                'id_detail_resep' => $detail_resep->id,
                'id_obat' => $data['obat'],
                'quantity' => $data['itemquantity'],
                ]);

                $this->updateStok($data['obat'],$total_stok);

                }

             }
             DB::commit();
             return back()->with('success','Sukses Simpan Obat Racik');

    }

    public function postObat(Request $request)
    {

        $data_header = headerModels::where('id_resep',$request->id_resep)->first();

        $data_stok = obatModels::where('obatalkes_id',$request->obat)->first();
        $total_stok = $data_stok->stok - $request->itemquantity;
        $total_stok = number_format((float)$total_stok, 2, '.', '');

        if($data_stok->stok < $request->itemquantity){
            return back()->with('error','Stok Melebihi Quantity / Stok Habis');
        }else{
            $detail_resep = detailresepModels::create([
                'id_header_resep' => $data_header->id,
                'id_obat' => $request->obat,
                'nama_racikan'=>'NULL',
                'id_signa'=> $request->signa,
                'jenis_obat'=>'non-racikan',
                'quantity' => $request->itemquantity,
            ]);

            $this->updateStok($request->obat,$total_stok);
        }

        return back()->with('success','Sukses Simpan Obat Non Racik');

    }

    public function data(Request $request)
    {
        $data_obat = obatModels::all();
        return view('data')->with('data_obat',$data_obat);

    }

    public function backAdd(Request $request)
    {

    return redirect('/');

    }

    public function getDetail(Request $request,$obatNo)
    {

            $data_detail_resep = headerModels::leftjoin('detail_resep','header.id', '=' , 'detail_resep.id_header_resep')
                                ->leftjoin('obatalkes_m','detail_resep.id_obat', '=' ,'obatalkes_m.obatalkes_id')
                                ->leftjoin('signa_m','detail_resep.id_signa','=','signa_m.signa_id')
                                ->select('header.id','header.id_resep','obatalkes_m.obatalkes_nama','detail_resep.nama_racikan',
                                'signa_m.signa_nama','detail_resep.quantity','detail_resep.jenis_obat')
                                ->where('header.id_resep',$obatNo)
                                ->get();

            return view('detail_resep')->with('data_detail_resep',$data_detail_resep);
    }

    public function deleteResep(Request $request,$id){

    headerModels::find($id)->delete();
    return back()->with('success','Menghapus Data Resep Berhasil');

    }

    public function updateStok($id_obat,$total_stok){

             obatModels::where('obatalkes_id',$id_obat)->update([
             'stok' => $total_stok
             ]);

          }

    }
