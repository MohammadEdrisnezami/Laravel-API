<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // 1️⃣ اعتبارسنجی تصویر
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2️⃣ ذخیره تصویر در storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');
        $fullImagePath = storage_path('app/public/' . $imagePath); // مسیر کامل فایل

        // 3️⃣ کلید API سرویس remove.bg
        $apiKey = 'zJzpU39tukepTWKryHcjiQsj';

        try {
            $client = new Client();
            $response = $client->post('https://api.remove.bg/v1.0/removebg', [
                'multipart' => [
                    [
                        'name'     => 'image_file',
                        'contents' => fopen($fullImagePath, 'r'), // مسیر کامل را می‌دهیم
                    ],
                    [
                        'name'     => 'size',
                        'contents' => 'auto',
                    ]
                ],
                'headers' => [
                    'X-Api-Key' => $apiKey,
                ],
            ]);

            // 4️⃣ ذخیره تصویر پردازش‌شده
            $processedImagePath = 'processed-images/' . uniqid() . '.png';
            Storage::disk('public')->put($processedImagePath, $response->getBody());

            // 5️⃣ ارسال مسیر تصویر پردازش‌شده به فرانت‌اند
            return response()->json([
                'message' => 'تصویر با موفقیت پردازش شد',
                'processed_image_url' => asset('storage/' . $processedImagePath),
            ], 200);

        } catch (RequestException $e) {
            // بازگردانی خطای API در قالب JSON
            return response()->json([
                'message' => 'خطا در پردازش تصویر',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
