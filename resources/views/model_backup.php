//User

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    //softdelete用
    protected $table = 'users';
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','zip','tel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}

//Product
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'products.id';

    protected $fillable = [
        'product_name','product_describe','categories_id','trade_flag','product_image1',
        'product_image2','product_image3','product_image4','product_image5','users_id'
    ];


    public function categories(){
        return $this->belongsTo('App\Models\Product','categories_id');
    }


}

//Contact
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contacts';

    protected $fillable = [
        'name','comment','reply','email','subject'
    ];

    static $reply = [
        '必要','不要'
    ];
}

//Categories
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
protected $table = 'categories';

protected $fillable = [
'category_name',
];

public $primaryKey = 'categories.id';

public function product(){
return $this->hasMany('App\Models\Categories')->orderBy('id','DESC');
}

}
