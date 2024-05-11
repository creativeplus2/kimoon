<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBank extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['bank_id', 'account_number', 'account_name'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['account_number' => 'string', 'account_name' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function bank()
	{
		return $this->belongsTo(\App\Models\Bank::class);
	}
}
