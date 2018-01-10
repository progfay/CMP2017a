# PosTime: 時間と場所に縛られない宅配サービス



## Prepare

### Google Login Button

- [JavaScript/Google-login-form-template - wakaru.esa.io](https://esa-pages.io/p/sharing/7825/posts/24/ee407099bc9c4a2742fa.html) を参考にすること
- [src/index.html](src/index.html) と [src/JS/login.js](src/JS/login.js) がそれに対応している
- localhost か https である必要がある
  - 今回は [xip.io](http://xip.io) を使用して名前解決を行った



### Webmo

- STAモードにてSSIDとパスワードを指定し、WebmoをWi-Fiに接続
- WebmoのIPアドレスを取得する





## Setup

- Google Projectの `Authorized JavaScript origins` に `http://${YOUR_IP_ADDRESS}.xip.io:3000` を設定する
- [src/JS/login.js](src/JS/login.js) 内の `deliver_id`　に宅配人の Google アカウントのIDを登録
- PosTime BOX に付いているNFCタグには以下のURLを設定すること
  - `http://${YOUR_IP_ADDRESS}.xip.io:3000/index.html:hostName=${WEBMO_IP}&receiver_id=${POSTIME_ID}`



- 上記全てが完了後に `php -S ${YOUR_LOCAL_IP}:3000` を叩けば接続可能になる