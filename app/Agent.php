<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'users_id',
        'agent_name',
        'ticket_id',
        'credit_balance',
        'merchants_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * Agent belongs to a merchant
     */
    public function merchant(){
        return $this->hasOne(User::class, 'id', 'merchants_id');
    }
}