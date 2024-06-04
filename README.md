環境構築　　
=====
##アプリケーション名  
=====
    1 ログイン認証機能  
    2 お問い合わせフォーム  
    3 お問い合わせ管理機能  
    
dockerビルド  
=====
    1 git clone リンク　　https://github.com/Okazuma/laravel_test.git  
    2 docker-compose up -d --build  
    *MysqlはOSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlを編集してください

Laravel環境構築  
=====
    1 phpコンテナにログイン       $docker-compose exec php bash  
    2 パッケージのインストール     $composer-install  
    3 env.exampleから.envを作成し、環境変数を変更  
    4 アプリケーションキーの生成    $php artisan key:generate  
    5 マイグレーション            $php artisan migrate  
    6 シーディング               $php artisan db:seed  

使用技術  
=====
    Laravel8.83  
    php 7.4.9  
    Mysql 8.0.26  

ER図  
=====
    ![laravel-test](https://github.com/Okazuma/laravel_test/assets/160417297/0601e39a-fcd4-42ac-a63a-37a6885b512d) 

開発環境 http://localhost/  
-----

phpMyAdmin http://localhost:8080  
-----


