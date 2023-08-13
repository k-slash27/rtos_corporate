import Image from 'next/image';
import { getNewsList } from '@/app/_libs/microcms';
import { TOP_NEWS_LIMIT } from '@/app/_constants';
import NewsList from '@/app/_components/NewsList';
import styles from './page.module.css';
import ButtonLink from '@/app/_components/ButtonLink';

export const revalidate = 60;

export default async function Page() {
  const data = await getNewsList({
    limit: TOP_NEWS_LIMIT,
  });
  return (
    <>
      <section className={styles.top}>
        <div>
          <h1 className={styles.title}>Robot to Society</h1>
          <p className={styles.description}>Simple is more useful</p>
        </div>
        <Image
          className={styles.bgimg}
          src="/top-cover_org.png"
          alt=""
          width={3600}
          height={1200}
        />
      </section>
      <section className={styles.news}>
        <h2 className={styles.newsTitle}>News</h2>
        <NewsList articles={data.contents} />
        <div className={styles.newsLink}>
          <ButtonLink href="/news">もっとみる</ButtonLink>
        </div>
      </section>
      <section className={styles.section}>
        <div className={styles.horizontal}>
          <div>
            <h2 className={styles.sectionTitleEn}>About Us</h2>
            <p className={styles.sectionTitleJa}>&quot;ロボットと働く&quot;を当たり前に</p>
            <p className={styles.sectionDescription}>
              今や人口減少は年50万を超え、労働人口不足は喫緊の課題です。その課題に私たちはロボットサービスでチャレンジしていきます。
              <br />
              <br />
              ロボットは疲れないだけでなく、危険な作業や繰り返し作業、自動作業を得意としています。そんなロボットに働いてもらうことで限りある労働力を節約したり、効率よく分配できるようになります。ただ高価になりがちなロボットを所有し利用することは大きなリスクになり普及の障壁にもなり得ます。そこで私たちが代わりに所有し代わりにサービスをリーズナブルな値段で提供することで、たくさんのロボットが自分の身近で当たり前のように働いている世界を目指します。
              <br />
              <br />
              私たちはロボットは人間の仕事を奪う存在ではなく、人間とともに働いたり、助けてくれたり、仕事を与えてくれたりする存在だと信じています。
            </p>
            <ButtonLink href="/business">事業内容へ</ButtonLink>
          </div>
          <Image
            className={styles.businessImg}
            src="/business.png"
            alt=""
            width={1024}
            height={1024}
          />
        </div>
      </section>
      <div className={styles.aboutus}>
        <section className={styles.section}>
          <div className={styles.horizontal}>
            <Image
              className={styles.aboutusImg}
              src="/values.png"
              alt=""
              width={6000}
              height={4000}
            />
            <div>
              <h2 className={styles.sectionTitleEn}>What We Do</h2>
              <p className={styles.sectionTitleJa}>“当たり前”という 革命を。</p>
              <p className={styles.sectionDescription}>
                “当たり前”とはなにか。
                <br />
                誰にとってもごく普通な存在であること。
                <br />
                ロボットが普段の生活で困っていることを助けてくれて、
                <br />
                しかもそれが楽しくワクワクする存在になったら？
                <br />
                “革命”といっても過言ではないでしょう。 どんな革命も小さな一歩から。
                <br />
                だから私たちはArduPilotでロボットを開発し、
                <br />
                サービスを提供しながらフィードバックから学び、
                <br />
                それをさらに開発に活かしていくループで 前進していく。
              </p>
              <ButtonLink href="/business">事業内容へ</ButtonLink>
            </div>
          </div>
        </section>
      </div>
      <section className={styles.section}>
        <div className={styles.horizontal}>
          <div>
            <h2 className={styles.sectionTitleEn}>Contact Us</h2>
            <p className={styles.sectionTitleJa}>企業情報</p>
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
            <br />
            <ButtonLink href="/contact">会社概要へ</ButtonLink>
          </div>
          <Image
            className={styles.hiringImg}
            src="/eyecatch_poster.jpg"
            alt=""
            width={960}
            height={960}
          />
        </div>
      </section>
      <div className={styles.aboutus}>
        <section className={styles.section}>
          <h2 className={styles.sectionTitleEn}>Test Fields</h2>
          <p className={styles.sectionTitleJa}>テストフィールド</p>
          <p className={styles.sectionDescription}>
            異なる特徴のフィールドで、厳しい環境でもサービスが提供できるように日々テストを重ねています。テスト動画などYoutube等で公開しています。
          </p>
          <div className={styles.horizontalReverse}>
            <div>
              <p className={styles.fieldTitle}>第1フィールド</p>
              <iframe
                className={styles.gmap}
                src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d3242.197962388045!2d138.460876!3d35.647494!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzXCsDM4JzUwLjgiTiAxMzjCsDI3JzM5LjAiRQ!5e0!3m2!1sja!2sjp!4v1691933741316!5m2!1sja!2sjp"
                loading="lazy"
              ></iframe>
              <p>自動化が見込める農園フィールド。GPS信号を阻害する障害物が少ないのが特徴です。</p>
            </div>
            <div>
              <p className={styles.fieldTitle}>第2フィールド</p>
              <iframe
                className={styles.gmap}
                src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d811.1847131500067!2d138.448077!3d35.584837!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzXCsDM1JzA1LjQiTiAxMzjCsDI2JzUzLjAiRQ!5e0!3m2!1sja!2sjp!4v1691934060518!5m2!1sja!2sjp"
                loading="lazy"
              ></iframe>
              <p>
                狭い、勾配、柵なし土手、GPS信号を阻害する障害物など自動化に向かないフィールドです。
              </p>
            </div>
          </div>
        </section>
      </div>
    </>
  );
}
