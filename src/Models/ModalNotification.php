<?php

namespace W3z315\ModalNotifications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ModalNotification extends Model
{
    protected $table = 'modal_notifications';
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'modal_notification_user')
            ->withPivot(['dismissed_at'])
            ->withTimestamps();
    }

    public function dismissedCount(): int
    {
        return $this->users()->wherePivotNotNull('dismissed_at')->count();
    }
}
