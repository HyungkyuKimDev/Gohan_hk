# everythings

## DB model の作り方

### Admin という DB を作るとき

```
// ターミナルで
sail php artisan make:model Admin -a
```

<br>

### DB ファイルの修正

```
// database/migrations/「生成されたファイル」
// columnを定義
public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->string('admin_password');
            $table->string('level')->default('lv1');
            $table->timestamps();
        });
    }
```

### DB の適用

```
// ターミナルでmigrate
sail php artisan migrate
```

## 管理者のページの生成

### Route で管理者のページの経路の指定

```
// routes/web.php

// AdminのController利用のためにクラスの追加を上に書く
// Controllers 使用のお知らせ
use App\Http\Controllers\AdminController;

// route/auth.phpの認証技術を利用する（ログインされているのか確認）
// もうある認証技術を利用する方法
Route::middleware('auth')->group(function () {
    // 管理者のページの生成
    // /admin_pageに飛ばすとAdminControllerというクラスのcreate関数が実行されます。
    Route::get('/admin_page',[AdminController::class, 'create']);
});
```

###　その Route に合わせてユーザーに見せてあげるビューの作成

```
// resources/views/[admin_page.blade.php]
// ユーザーに見せる画面のファイル
```

### 操作の担当の Controller の確認

```
// app/Htto/Controllers/AdminController.php
// create()の部分の修正
public function showUsers()
    {
        $users = DB::select("select * from users");
        return view('admin.users', compact('users'));
    }
```
