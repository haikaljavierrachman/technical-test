<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportController extends Controller
{
    public function index($id)
    {
        return view('export.index', [
            'staff' => Staff::find($id)
        ]);
    }

    public function exportWord($id)
    {
        $staff = Staff::find($id);
        $path = storage_path('app/public');

        if ($staff->foto) {
            $source = $staff->foto;
        } else {
            $source = 'images/default.jpg';
        }



        $templateProcessor = new TemplateProcessor('word-template/user.docx');
        $templateProcessor->setValue('nama', $staff->nama);
        $templateProcessor->setValue('gender', $staff->gender);
        $templateProcessor->setValue('nohp', $staff->nohp);
        $templateProcessor->setValue('email', $staff->email);
        $templateProcessor->setValue('salary', $staff->salary);
        $templateProcessor->setImageValue('foto', array('path' => $path . '/' . $source, 'width' => 120, 'height' => 100, 'ratio' => false));



        $fileName = $staff->nama;
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
