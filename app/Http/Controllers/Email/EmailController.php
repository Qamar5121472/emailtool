<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class EmailController extends Controller
{
    public function index(Request $request){
        // $request->validate([
        //     'excel_file' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        // ]);
        $this->validate($request, [
            'excel_file' => 'required|file|mimes:xls,xlsx'
        ]);
        $subject = $request->subject;
        $the_file = $request->file('excel_file');
        try{
            // dd($the_file);
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'F', $column_limit );
            $startcount = 2;
            // dd($row_range);
            //$email = array();
            foreach ( $row_range as $row ) {
                // dd($row);
                $email = ['email' =>$sheet->getCell( 'A' . $row )->getValue()];
                $name = ['name' => $sheet->getCell('B' . $row)->getValue()];
                $startcount++;

                // $to_name = 'RECEIVER_NAME';
                $to_email = $email['email'];
                $name = $name['name'];
                // dd($to_email);
                // email code
                $data = [
                    'data'=>$name,
                ];

                //dd($);

                // $user['to'] = 'qamardigixvalley@gmail.com';
                Mail::send('emails', $data, function($message) use ($to_email,$subject){
                    $message->to($to_email);
                    $message->subject($subject);
                    $message->from('syed.abbas96045@gmail.com');
                });

            }







// email code ended
            // DB::table('tbl_customer')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
}
