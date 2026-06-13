<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppSettingResource;
use App\Models\AppSetting;
use Illuminate\Support\Facades\Hash;

class AppSettingController extends Controller
{
    public function index()
    {
        $settings = AppSetting::active()->get();
        
        // Transform to key-value format
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->key] = $setting->value;
        }
        
        return response()->json($data);
    }
}
