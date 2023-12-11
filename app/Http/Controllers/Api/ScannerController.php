<?php

namespace App\Http\Controllers\Api;

use App\Models\Scanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScannerController extends Controller
{
    /**
     * Get the mode of the specified scanner.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Scanner $scanner
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScannerMode(Request $request, Scanner $scanner)
    {
        // Assuming the 'mode' is a property/column in the 'Scanner' model
        $mode = $scanner->mode;

        return response()->json(['mode' => $mode], 200);
    }

    
}