<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book_issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportsApiController extends Controller
{
    public function generateDateWiseReport(Request $request)
    {
        $request->validate(['date' => 'required|date']);

        $books = book_issue::where('issue_date', $request->date)->latest()->get();

        return Response::json(['books' => $books]);
    }

    public function generateMonthWiseReport(Request $request)
    {
        $request->validate(['month' => 'required|date']);

        $books = book_issue::where('issue_date', 'LIKE', '%' . $request->month . '%')->latest()->get();

        return Response::json(['books' => $books]);
    }

    public function notReturned()
    {
        $books = book_issue::latest()->get();

        return Response::json(['books' => $books]);
    }
}
