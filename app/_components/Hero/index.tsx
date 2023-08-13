import Image from 'next/image';
import styles from './index.module.css';

type Props = {
  title: string;
  sub: string;
};

export default function Hero({ title, sub }: Props) {
  let src = '/img-mv.jpg';
  switch (title) {
    case 'Business':
      src = '/eyecatch_poster.jpg';
      break;
    case 'Contact':
      src = '/img-aboutus.jpg';
      break;
    default:
      break;
  }
  return (
    <section className={styles.container}>
      <div>
        <h1 className={styles.title}>{title}</h1>
        <p className={styles.sub}>{sub}</p>
      </div>
      <Image className={styles.bgimg} src={src} alt="" width={4000} height={1200} />
    </section>
  );
}
