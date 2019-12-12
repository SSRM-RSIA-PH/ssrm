<?php

namespace App\Http\Controllers;

use \App\Rekmed;
use \App\Arsip;
use Illuminate\Http\Request;
use ZipArchive;
use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;
use \Illuminate\Support\Facades\Gate;

class Archive extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('supervisor')) return $next($request);
            if (Gate::allows('admin')) return $next($request);
            if (Gate::allows('dokter')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function download($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $rootPath = realpath(storage_path("app/public/Rekmed/$rekmed->rek_id"));
        $filename = "$rekmed->rek_id-$rekmed->rek_name.zip";

        $zip = new ZipArchive();
        $zip->open(storage_path("app/public/$filename"), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY);

        foreach ($files as $name => $file) {

            if (!$file->isDir()) {

                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        return response()->download(storage_path("app/public/$filename"))->deleteFileAfterSend(true);
    }

    public function download_arsip_tahunan($id_arsip)
    {
        $file = Arsip::findOrFail($id_arsip);
        $file = $file->arsip_file;
        return response()->download(storage_path("app/public/$file"));
    }

    

}
