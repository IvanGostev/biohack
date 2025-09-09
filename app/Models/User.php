<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
    protected $guarded = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function refCount() {
        return User::where('ref', $this->id)->count();
    }

    public function refIncome() {
        $sum = 0;
        $items = BalanceMessage::where('user_id', $this->id)->where('type', 'ref')->get();
        foreach ($items as $item) {
            $sum += $item->sum;
        }

        return $sum;
    }

    public function countOrders() {
        return Order::where('user_id', $this->id)->count();
    }

    public function newMessageCheck() {
        $m = Message::where('user_id', $this->id)->where('whom', 'user')->latest()->first();
        if ($m and $m->status != 'read') {
            return true;
        }
        return false;
    }

    public function countReviews($id) {
        return ProductReview::where('product_id', $id)->where('user_id', $this->id)->count();
    }
}
