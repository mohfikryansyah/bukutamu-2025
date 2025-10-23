<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ExportDashboard;
use Maatwebsite\Excel\Facades\Excel;

class downloadTujuanController extends Controller
{
    public function index()
    {
        $tujuan = Tujuan::with('pengunjung');

        // $pengunjung = Pengunjung::latest()->paginate(5);


        return view('downloadPdf.viewTujuan', compact('tujuan'));
    }


    // public function downloadDataPelayanan()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $tujuan = Tujuan::with('pengunjung');
    //     $mpdf->WriteHTML(view('downloadPdf.viewTujuan', compact('tujuan')));
    //     $mpdf->Output();
    // }


    public function getDetailDataPelayanan($id)
    {
        $tujuan = Tujuan::with('pengunjung')->find($id);
        return view('downloadPdf.viewDetailDataPelayanan', compact('tujuan'));
    }

    public function downloadDetailDataPelayanan($id)
    {

        $tujuan = Tujuan::with('pengunjung')->find($id);
        $pdf = Pdf::loadView('downloadPdf.viewDetailDataPelayanan', ['tujuan' => $tujuan]);
        return $pdf->download('DetailPelayanan.pdf');
    }

    // PDF DATA PENGUNJUNG
    public function getPengunjung()
    {
        $tujuan = Pengunjung::all();
        return view('downloadPdf.viewPengunjung', ['tujuan' => $tujuan]);
    }
    public function downloadPengunjung()
    {

        $tujuan = Pengunjung::with('tujuans')->latest()->get();
        $pdf = PDF::loadView('downloadPdf.viewPengunjung', ['tujuan' => $tujuan]);
        return $pdf->download('Pengunjung.pdf');
    }

    // PDF DATA PELAYANAN
    public function getPelayanan()
    {
        $pelayanan = Tujuan::with('pengunjung')->latest()->get();
        return view('downloadPdf.viewDataPelayanan', ['pelayanan' => $pelayanan]);
    }
    public function downloadPelayanan()
    {
        if (auth()->user()->id_divisi == '') {
            $pelayanan = Tujuan::with('pengunjung')->latest()->get();
            $pdf = PDF::loadView('downloadPdf.viewDataPelayanan', ['pelayanan' => $pelayanan]);
            return $pdf->download('DataPelayanan.pdf');
        } else {
            $pelayanan = Tujuan::with('pengunjung')->where('id_divisi', auth()->user()->id_divisi)->latest()->get();
            $pdf = PDF::loadView('downloadPdf.viewDataPelayanan', ['pelayanan' => $pelayanan]);
            return $pdf->download('DataPelayanan.pdf');
        }
    }

    public function exportDataPengunjung(Request $request)
    {
        $start = $request->start ? $request->start . ' 00:00:00' : null;
        $end   = $request->end ? $request->end . ' 23:59:59' : null;

        if ($start && $end) {
            $pengunjung = Pengunjung::whereBetween('created_at', [$start, $end]);
        } elseif ($start) {
            $pengunjung = Pengunjung::where('created_at', '>=', $start);
        } elseif ($end) {
            $pengunjung = Pengunjung::where('created_at', '<=', $end);
        } else {
            $pengunjung = Pengunjung::query();
        }

        $pengunjung = $pengunjung
            ->orderBy('created_at', 'asc')
            ->select('nama', 'email', 'instansi', 'alamat', 'hp', 'created_at')
            ->get();


        if (!$pengunjung->isEmpty()) {
            $data = new ExportDashboard($pengunjung);
            return Excel::download($data, "DataPengunjung.xlsx");
        } else {
            return redirect('dataPengunjung')->with('error', 'Tidak ada data pengunjung dalam rentang tanggal yang diminta.');
        }
    }

    public function exportDataPelayanan(Request $request)
    {
        $start = $request->start ? $request->start . ' 00:00:00' : null;
        $end   = $request->end ? $request->end . ' 23:59:59' : null;

        if ($start && $end) {
            $tujuan = Tujuan::with('pengunjung')->whereBetween('created_at', [$start, $end]);
        } elseif ($start) {
            $tujuan = Tujuan::with('pengunjung')->where('created_at', '>=', $start);
        } elseif ($end) {
            $tujuan = Tujuan::with('pengunjung')->where('created_at', '<=', $end);
        } else {
            $tujuan = Tujuan::query();
        }
        $tujuan = $tujuan
            ->with('pengunjung')
            ->orderBy('created_at', 'asc')
            ->get();

        if (!$tujuan->isEmpty()) {
            $data = new ExportDashboard($tujuan);
            return Excel::download($data, "DataPelayanan.xlsx");
        } else {
            return redirect('dataPengunjung')->with('error', 'Tidak ada data pelayanan dalam rentang tanggal yang diminta.');
        }
    }
}
