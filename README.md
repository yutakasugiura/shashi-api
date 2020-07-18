# the社史APIプロジェクト

## about
- 社史コンテンツの流用可能性を高めるために、APIにより社史コンテンツを供与するためのAPIサーバーを立てる
   - バックエンドはLaravelを活用
      - DDD（ドメイン駆動設計）を採用し、保守性の向上を図る
   - フロントエンドは任意だが、暫定でNuxt.jsを活用
      - SPAを構築し、APIの表示テストを行う
   - Dockerを活用し、環境構築の簡素化を図る
      - 現状はローカル環境で構築
         -  laravel(php7.4) //APIに特化
         -  Nuxt.js //API連携によってコンテンツの表示テストを行う
         -  mysql5.7
      - 8月頃を目処にDockerへの移行を実施する
         - 筆者のDocker構築の学習スピードによって前後
         - 7月はローカル環境構築に慣れるという意味もあり、Dockerは先送り

   - deploy先は「the-shahsi.com」ではなく「yutaka-sugiura.com」にて実施
       - the-shahsi.comは運用中のため、あまり触りたくない
       - apiの発行はyutaka-sugiura.comにて実施

    - AWS（tokyo-region）を活用
       - 初回テスト時はDockerを活用せずに、RDS+EC2による通常の構成
       - 初回テスト成功後、Dockerを活用してECR・ESCで構築
         - AWSへのDockerによるdeployにより、筆者のweb技術の向上を図る
