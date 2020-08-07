# the社史APIプロジェクト
## PURPOSE
### To Business Person
 - 経営の歴史的教訓を次世代に伝え、経営上の機会損失を最小化する
### To Institutional investor
 - 長期視点の普及を通じて投資精度の向上に貢献し、年金等の公的資産を最大化する
<img src="https://the-shashi.com/img-top/opg.png">

## ABOUT
- 社史コンテンツをAPI化し、Openな社史コンテンツを生成する
   - 紙・製本が主流だった時代の社史はClosedな環境にあった
      - 図書館の書庫や、国会図書館のみで閲覧可
   - ネット上にも社史や沿革はあるが、統一されていない
      - 各企業が自由に社史や沿革をwebに記載
      - 統一フォーマットがない故に、比較可能性が担保されない
   - 組み込み可能性の向上により、様々なコンテンツに社史情報を組み入れる
      - 投資・株価に関するコンテンツ
      - 企業分析に関するコンテンツ
      - 転職サイトにおけるコンテンツ

## HOW TO BUILD
- 社史コンテンツの流用可能性を高めるために、社史コンテンツを供与するためのAPIを立てる
   - バックエンドはLaravelを活用
      - 設計はUseCase層とレポジトリを分離
   - フロントエンドは任意だが、暫定でNuxt.jsを活用
      - SPAを構築し、APIの表示テストを実施
   - Dockerを活用し、環境構築の簡素化を図る
      - 現状はローカル環境で構築
         -  laravel(php7.4) //APIに特化
         -  Nuxt.js //API連携によってコンテンツの表示テストを行う
         -  mysql5.7
      - 正式デプロイと同時にDockerへ移行
         - Nuxt(Client)はデプロイせず

   - deploy先は「the-shahsi.com」ではなく「新しいドメイン」にて実施
       - the-shahsi.comは運用中のため、あまり触りたくない
       - the-shashi.comは引き続き静的サイトとして運営

    - AWS（tokyo-region）を活用
       - 「ECR・ESC」で構築

## OTHER IDEAS
- The社史は一人ではなく、できるだけ周囲を巻き込んだProjectにしたい
   - GitHubを活用して開発をOpne化
   - 作成する対象企業の選定を、需要に合わせる（Twitterなどで限定的に募集）
   - APIを活用先を開拓
