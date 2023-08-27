<?php

namespace App\Http\Controllers;

use App\Mail\ReportEmail;
use App\Models\ErrorReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ErrorReportController extends Controller
{
    public function store(Request $request)
    {
        //save error in database
        $saveError = new ErrorReport();
        $saveError->text_error =  $request->input('text_error');
        $saveError->save();

        // Send an email
        $error = $saveError->text_error;
        Mail::to('test@test.test')->send(new ReportEmail($error));
    }
}
