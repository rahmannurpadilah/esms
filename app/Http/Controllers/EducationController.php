<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EducationController extends Controller
{
    public function showEducation()
    {
        $data['education'] = Education::where('user_id', auth()->user()->id)->paginate(5);
        return view('employee.education', $data);
    }

    public function saveEducation(Request $request){
        $request->validate([
            'educational_level' => 'required',
            'school_name' => 'required',
            'entry_year' => 'required|numeric',
            'graduation_year' => 'required|numeric|gte:entry_year',
            'choice' => 'required|boolean',
            'id' => 'nullable|exists:education,id',
        ]);

        Education::updateOrCreate([
            'id' => $request->id,
            'user_id' => auth()->user()->id
        ],[
            'educational_level' => $request->educational_level,
            'school_name' => $request->school_name,
            'entry_year' => $request->entry_year,
            'graduation_year' => $request->graduation_year,
            'choice' => $request->choice
        ]);

        return redirect()->back()->with('success', 'Education data has been successfully saved');
    }

    public function deleteEducation(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'Education data failed to delete');
        }

        Education::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Education data successfully deleted.');
    }

    public function downloadCSV(){
        $filename = 'MyEducation.csv';
        $education = Education::where('user_id', auth()->user()->id)->get();

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use($education) {
            $file = fopen('php://output', 'w');

            // Header csv
            fputcsv($file, ['No', 'Educational Level', 'School Name', 'Entry Year', 'Graduation Year', 'Choice']);

            foreach($education as $index => $item){
                fputcsv($file, [
                    $index + 1,
                    $item->educational_level,
                    $item->school_name,
                    $item->entry_year,
                    $item->graduation_year,
                    $item->choice
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadPdf(){
        $education = Education::where('user_id', auth()->user()->id)->get();

        $pdf = Pdf::loadView('education.pdf', compact('education'))->setPaper('a4', 'potrait');

        return $pdf->download('education.pdf');
    }
}
