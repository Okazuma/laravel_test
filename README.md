アプリケーション名
　　　　ログイン認証機能
　　 お問い合わせフォーム
 　　お問い合わせ管理機能

dockerビルド
　　　　git clone リンク　　https://github.com/Okazuma/laravel_test.git
　　　　docker-compose up -d --build
  ※ MysqlはOSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlを編集してください

Laravel環境構築
　　　　phpコンテナにログイン　　$　docker-compose exec php bash
  パッケージのインストール　　$ composer-install
　　　　env.exampleから.envを作成し、環境変数を変更
　　　　アプリケーションキーの生成　　　　＄　php artisan key:generate
  マイグレーション　　$ php artisan migrate
  シーディング　　$ php artisan db:seed 

使用技術
　　　　laravel 8.83
  php 7.4.9
  Mysql 8.0.26

開発環境
　　　　http://localhost/
  phpMyAdmin http://localhost:8080


