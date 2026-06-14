<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;


class ActivityLogHelper
{
    public static function log(Request $request,  string $action, string $module, $subject = null, ?array $oldValues = null, ?array $newValues = null): void
    {
        $user = User::where("id", $request->header('user_id'))->select('id')->first();
        $user_id = $user ? $user->id : 0;
        ActivityLog::create([
            'user_id'      => auth()->id(),

            'action'       => $action,
            'module'       => $module,

            'subject_id'   => $user?->id,
            'subject_type' => $subject ? get_class($subject) : null,

            'old_values'   => $oldValues,
            'new_values'   => $newValues,

            'ip_address'   => request()->ip(),
            'user_agent'   => request()->userAgent(),
            'url'          => request()->fullUrl(),
        ]);
    }
}
