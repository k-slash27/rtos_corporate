import Link from 'next/link';
import Image from 'next/image';
import styles from './index.module.css';

export default function Footer() {
  return (
    <footer className={styles.footer}>
      <nav className={styles.nav}>
        <ul className={styles.items}>
          <li className={styles.item}>
            <Link href="/">TOP</Link>
          </li>
          <li className={styles.item}>
            <Link href="/news">ニュース</Link>
          </li>
          <li className={styles.item}>
            <Link href="/business">事業内容</Link>
          </li>
          <li className={styles.item}>
            <Link href="/contact">会社概要</Link>
          </li>
          <li className={styles.item}>
            <Link href="https://www.youtube.com/@robot-to-society" target="_blank">
              YouTubeチャンネル
            </Link>
          </li>
        </ul>
      </nav>
      <div className={styles.sns}>
        <Link
          className={styles.snsBtn}
          href="https://www.instagram.com/robottosociety/"
          target="_blank"
        >
          <Image width={40} height={40} src="/icon_instagram.png" alt="" />
        </Link>
        <Link className={styles.snsBtn} href="https://twitter.com/RobotToSociety" target="_blank">
          <Image width={40} height={40} src="/icon_twitter.png" alt="" />
        </Link>
      </div>
      <p className={styles.cr}>© RtoS Co., Ltd. All Rights Reserved 2023</p>
    </footer>
  );
}
