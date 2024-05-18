<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidangDosenStoreRequest;
use App\Models\Bidang;
use App\Models\BidangDosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findorfail(auth()->user()->id);

        $data = DB::table('bidang_dosens as bd')
        ->leftJoin('bidangs as b', 'b.id', '=', 'bd.id_bidang')
        ->where('b.id_fakultas', '=', $user->id_fakultas)
        ->select('bd.*', 'b.nama')
        ->paginate(10);

        // return response()->json($data);

        return view('pages.bidangDosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::findorfail(auth()->user()->id);

        $bidang = Bidang::where('id_fakultas', $user->id_fakultas)->get();
        return view('pages.bidangDosen.create', compact('bidang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BidangDosenStoreRequest $request)
    {
        $data = $request->validated();
        $data['id_dosen'] = auth()->user()->id;
        
        if ($data) {
            BidangDosen::create([
                'id_dosen' => $data['id_dosen'],
                'id_bidang' => $data['id_bidang']
            ]);
    
            return redirect()->route('bidang-dosen');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangDosen $bidangDosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail(auth()->user()->id);

        $all = BidangDosen::where('id_dosen', auth()->user()->id)->get();
        $excludedBidangIds = $all->pluck('id_bidang')->toArray();
        $data = BidangDosen::findorfail($id);
        $bidang = Bidang::whereNotIn('id', $excludedBidangIds)
        ->where('id_fakultas', $user->id_fakultas)
        ->get();
        return view('pages.bidangDosen.edit', compact('data', 'bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy(string $id)
    {
        $angkatan = BidangDosen::findorfail($id);
        $angkatan->delete();

        return redirect()->route('bidang-dosen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update(BidangDosenStoreRequest $request, string $id)
    {
        $data = BidangDosen::where('id', $id)->first();

        $dt = $request->validated();

        if ($dt) {
            $data->update($dt);

            return redirect()->route('bidang-dosen');
        }
    }
}
