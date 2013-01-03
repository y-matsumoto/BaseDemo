README
======================
FuelPHPのデモアプリケーション

ログイン（オリジナルドライバ）、サインアップ、アカウント管理機能を実装

※SNS認証についてはアップ段階では未実装。

•機能詳細
------
#### 1.認証ログイン ####

独自driverを実装

#### 2.サインアップ ####

画面：

一般ユーザ権限で作成可能。管理ユーザは画面上作成不可　

※コンソールから作成

権限：

Admin/Userのみ　※権限により処理（画面など）をswitchしてる

管理画面[controller/admin]・一般ユーザ画面[controller/user]を継承


#### 3.アカウント管理（プレビュー）####

新規・編集

※スキャフォールド作成を編集してるため、あまり使えるものではない

•導入手順
------
#### 1.clone作成 ####
$ git clone git://github.com/basedemo.git

#### 2.db関連 ####
database.sqlを実行

#### 3.ファイルバーミッション設定　※やらなくてもいい ####
 $ oil refine install //or [oil r install]

#### 4.apatch設定 ####
basedemo/public/をhtdocsへ置く // or シンボリックリンク

####5.account作成(admin権限) ※signupで作成する場合は一般ユーザ権限のみ ####
•[oil console]コマンドでコンソール上からcreatメソッドをコール

$ oil console　// start

＞＞＞Auth::create_user('admin', 'password', 'test@test.co.jp', 100); // create user execute

1 // complete

＞＞＞exit; // end
