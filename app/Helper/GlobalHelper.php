<?php

namespace App\Helper;

use App\Jobs\SendEmailJob;
use App\Models\Attendance;
use App\Models\ClosedMonth;
use App\Models\DayCarePayment;
use App\Models\DaycareProvider;
use App\Models\Invoice;
use App\Models\Kid;
use App\Models\KidAccidentReport;
use App\Models\KidMeal;
use App\Models\NapTime;
use App\Models\Notification;
use App\Models\Parents;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Rmunate\Utilities\SpellNumber;

class GlobalHelper
{

    public static function uploadAndSaveFile($files, $destinationDirectory, $fileName = null)
    {
        $urls = [];

        foreach ($files as $key => $file) {

            if ($file instanceof UploadedFile) {

                $ext = strtolower($file->getClientOriginalExtension());

                // Generate a unique filename if not provided
                $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . $key . time() . '.' . $ext;

                $destinationPath  = public_path($destinationDirectory);

                if (!File::isDirectory($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                if (in_array($ext, ['jpeg', 'png', 'jpg', 'webp', 'gif'])) {
                    $url = $destinationDirectory . '/' . $fileName;
                    $image = Image::make($file->getRealPath());
                    $image->save($destinationPath . '/' . $fileName, config('custom.image_quality'));
                } elseif (in_array($ext, ['pdf', 'docx', 'xls', 'csv', 'xlsx', 'txt', 'text', 'docx'])) {
                    $url = $destinationDirectory . '/' . $fileName;
                    $file->move($destinationPath, $fileName);
                } else {
                    $url = '';
                }

                $urls[$key] = $url;
            }
        }
        return $urls;
    }

    public static function sendEmail($to, $subject, $view, $data = [])
    {
        try {
            // Mail::send($view, $data, function ($message) use ($to, $subject) {
            //     $message->to($to)->subject($subject);
            // });
            // Dispatch the email sending job to the queue
            SendEmailJob::dispatch($to, $subject, $view, $data);
            return true; // Email job dispatched successfully
        } catch (\Exception $e) {
            info($e);
            // Log or handle any exceptions here
            return false; // Email job dispatching failed
        }
    }



}
