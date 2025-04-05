<?php

namespace App\Http\Controllers;

use App\Models\Riksha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminRikshaApprovalController extends Controller
{
    public function showPendingRikshas()
    {
        $pendingRikshas = Riksha::with('owner') // <--- this is the change
        ->where('is_approved', null)
        ->get();
        return view('admin.approve-rikshas', compact('pendingRikshas'));
    }

    public function approve($id)
    {
        $riksha = Riksha::findOrFail($id);
        $riksha->is_approved = true;
         // Create unique URL for QR code to point to
        $url = route('riksha.public.view', $riksha->riksha_id);

        // // Generate filename
        $fileName = 'qr_' . Str::random(10) . '_' . $riksha->riksha_id . '.png';

        // // Save QR code to public/qrcodes
        // QrCode::format('png')->size(300)->generate($url, public_path('qrcodes/' . $fileName));

        // // Save the path in DB
        // $riksha->qr_code = 'qrcodes/' . $fileName;

    // Create the QR code instance
     // Generate QR code using the Builder
     $builder = Builder::create()
     ->writer(new PngWriter())
     ->writerOptions([]) // If you have specific writer options, add them here
     ->data($url)  // Set the data as the URL
     ->encoding(new Encoding('UTF-8')) // Set encoding
     ->errorCorrectionLevel(ErrorCorrectionLevel::High) // Set error correction level
     ->size(300)  // Set the size
     ->margin(10)  // Set the margin
     ->build();

    // Save the generated QR code image to the public/qrcodes directory
    $filePath = public_path('qrcodes/' . $fileName);
    $builder->saveToFile($filePath); // Save it to the file
    // Save the path in the database
    $riksha->qr_code = 'qrcodes/' . $fileName;
        
        $riksha->save();


        return redirect()->back()->with('success', 'Riksha approved successfully.');
    }

    public function disapprove($id)
    {
        $riksha = Riksha::findOrFail($id);
        $riksha->is_approved = 0;
        $riksha->save();

        return redirect()->back()->with('info', 'Riksha disapproved successfully.');
    }
}
