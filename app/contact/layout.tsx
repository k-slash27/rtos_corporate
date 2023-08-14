import Hero from '@/app/_components/Hero';
import Sheet from '@/app/_components/Sheet';

export const metadata = {
  title: 'Contact｜株式会社RtoSコーポレートサイト',
};

type Props = {
  children: React.ReactNode;
};

export default function RootLayout({ children }: Props) {
  return (
    <>
      <Hero title="Contact" sub="会社概要" />
      <Sheet>{children}</Sheet>
    </>
  );
}
