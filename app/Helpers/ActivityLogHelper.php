<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;


class ActivityLogHelper
{
    public static function log(Request $request, $userId = null, string $action, string $module, $subject_id=null, $subject_type = null, ?array $oldValues = null, ?array $newValues = null): void
    {
        $user = User::where("id", $request->header('user_id'))->select('id')->first();
        $user_id = $user ? $user->id : $userId;
        ActivityLog::create([
            'user_id'      => $user_id,
            'action'       => $action,
            'module'       => $module,
            'subject_id'   => $subject_id,
            'subject_type' => $subject_type,
            'old_values'   => $oldValues,
            'new_values'   => $newValues,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);
    }
}
