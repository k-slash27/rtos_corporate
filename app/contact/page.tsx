import styles from './page.module.css';
import ContactForm from '@/app/_components/ContactForm';

export default function Page() {
  return (
    <div className={styles.container}>
      <div className={styles.subcontainer}>
        <h2 className={styles.sectionTitleEn}>企業情報</h2>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>社名</dt>
          <dd className={styles.infoDescription}>株式会社RtoS</dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>英語表記</dt>
          <dd className={styles.infoDescription}>RtoS Co., Ltd.</dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>設立</dt>
          <dd className={styles.infoDescription}>2023年7月</dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>本社</dt>
          <dd className={styles.infoDescription}>
            〒400-0206
            <br />
            山梨県南アルプス市六科１４１２番地２９
            <br />
            ハイツ八田Ｂ１０２
          </dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>代表者</dt>
          <dd className={styles.infoDescription}>代表取締役 川村剛</dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>資本金</dt>
          <dd className={styles.infoDescription}>300万円</dd>
        </dl>
        <dl className={styles.info}>
          <dt className={styles.infoTitle}>事業内容</dt>
          <dd className={styles.infoDescription}>
            <ul>
              <li>自動草刈りロボットを用いた草刈りサービス</li>
              <li>
                ArduPilotを活用した無人機（マルチコプター, 固定翼機, VTOL, 滑空機, ボート,
                サブマリン, ローバー）の開発・周辺システム開発支援
              </li>
              <li>ドローンソフトウェア開発スクール・セミナー・ワークショップ開催</li>
            </ul>
          </dd>
        </dl>
      </div>
      <div className={styles.subcontainer}>
        <h2 className={styles.sectionTitleEn}>お問い合わせフォーム</h2>
        <p className={styles.text}>
          ご質問、ご相談は下記フォームよりお問い合わせください。
          <br />
          内容確認後、担当者より通常3営業日以内にご連絡いたします。
        </p>
        <ContactForm />
      </div>
    </div>
  );
}
