<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantDocument extends Model
{
    protected $fillable = ['tenant_id', 'filename', 'path'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
