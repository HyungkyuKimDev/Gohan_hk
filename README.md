## 実行手順

1. このリポジトリをローカルにクローンします。

```bash
git clone https://github.com/emptyTakahashi/Gohan.git
```

2. 初期環境のセットアップ

```bash
# プロジェクトディレクトリに移動
cd (省略)/Gohan/test-project/

# Composerパッケージのインストール
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

# .envファイルの作成
## .env.exampleをコピー
cp .env.example ./.env

## .envの修正(22行目から)
##### 修正前
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

##### 修正後
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

# sailを起動
sail up -d

# APP_KEYの生成
sail php artisan key:generate

# テーブルの作成
sail php artisan migrate

# NPMコマンドでパッケージのインストール
sail npm install

# 開発時なのでdevを指定して初期環境のセットアップを完了します
sail npm run dev
```

3. URLにアクセス

```
http://localhost/
```