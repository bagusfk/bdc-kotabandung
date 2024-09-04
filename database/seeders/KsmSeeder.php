<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelola_data_ksm;

class KsmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 8,
            'owner' => 'Heny Badriah',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '085722282088',
            'brand_name' => 'Mynada',
            'business_entity' => 'po',
            'business_description' => 'Mynada adalah sebuah brand fashion muslim yang berdiri pada tahun
            2020. Berawal dari niat membuat pakaian muslim untuk dikenakan sendiri dikarenakan harga fashion muslim diluaran cenderung relatif mahal,
            dengan penggunaan material kain yang kurang sesuai. Namun ternyata hasil produk yang dibuat cukup menarik perhatian,
            dan banyaknya permintaan untuk dibuatkan baju muslim serupa. Dan atas banyaknya saran dari customer, maka timbul ide
            untuk memadupadankan fashion muslim yang syari namun tetap fashionable.',
            'product_sales_address' => 'Jl. Jatisari II No.79 RT.004/001 Jatisari - Buah Batu - Bandung 40286',
            'address' => 'Jl. Jatisari II No.79 RT.004/001 Jatisari - Buah Batu - Bandung 40286',
            'nib' => '0220100181346'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 9,
            'owner' => 'Agus Santoso',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '085693930588',
            'brand_name' => 'Mini Me',
            'business_entity' => 'po',
            'business_description' => 'Produk kami adalah kaos yang kami bentuk hingga kecil, kaos ini cocok untuk souvenir.
            Selain di bentuk secara unik kami juga menawarkan kaos dengan sablon yang di bentuk demikian. Sangat cocok untuk souvenir
            wisata ataupun untuk godebag. Walaupun di pack hingga kecil tetapi kaos kami tetap dapat kembali seperti ukuran semula.',
            'product_sales_address' => 'Jl. Kebon jayanti Gg Rahayu 04 RT.003/008, Kebon jayanti, Kiaracondong, Bandung',
            'address' => 'Jl. Kebon jayanti Gg Rahayu 04 RT.003/008, Kebon jayanti, Kiaracondong, Bandung',
            'nib' => '0309230023482'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 10,
            'owner' => 'Arief Santoso',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '088808089909',
            'brand_name' => 'Batik Santoso',
            'business_entity' => 'po',
            'business_description' => 'Brand kemeja batik pria slimfit yang bisa di kustom sesuai selera konsumen. Memproduksi kemeja,
            aksesoris tradisional dan kain batik khas kota Bandung dan Jawa Barat',
            'product_sales_address' => 'Hanya Online',
            'address' => 'Mega Regency kav.69B',
            'nib' => '2106230038439'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 11,
            'owner' => 'Annisah Said',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081320230777',
            'brand_name' => 'MIHICHA APPREL',
            'business_entity' => 'po',
            'business_description' => 'Sebagai Pemain Golf yang menekuni Hobby dan menjadi Hobby sebagai bisnis, memenuhi kebutuhan Sport Wear
            untuk baju olahraga Golf dengan brand Mihicha Apparel-Golf Outfit.',
            'product_sales_address' => 'Sarijadi, Sarimanah Blok 14 no 146 RT.004/005 Sukasari Bandung 40151',
            'address' => 'Creative Local, terminal keberangkatan lt.2 Internatioanl Airport Husen Sastranegara Bandung',
            'nib' => '9120003883915'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 12,
            'owner' => 'Beny Ramdani Sofara',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08118582207',
            'brand_name' => 'BLANKENHEIM',
            'business_entity' => 'pt',
            'business_description' => 'Menemukan sepatu kulit yang berlabel made in Indonesia dan di branding merek luar di sebuah toko
            di alun-alun kota Deventer, Belanda, menjadi titik awal Blankenheim berdiri',
            'product_sales_address' => 'Jl. Leuwi Anyar V No.58 Bandung',
            'address' => 'Jl. Aria Jipang No.1 Bandung',
            'nib' => '0606220035473'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 13,
            'owner' => 'Nani Zakiah',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081221843944',
            'brand_name' => 'CAVARANI.ID',
            'business_entity' => 'po',
            'business_description' => 'Cavarani merupakan produk di bidang fashion dengan segment pasar kaum wanita
            dari kalangan usia 17-55 tahun, produk ini memiliki jenis fashion yang didominasi oleh baju daily, jadi bisa dipake
            kapan saja bahkan kalau mau dipake ke kantor bisa juga karena cenderung semi formal juga bisa condisional',
            'product_sales_address' => 'BALTOS',
            'address' => 'Jl taman merkuri timur VII No. 20',
            'nib' => '9120208840465'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 14,
            'owner' => 'Rustini',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '085795010906',
            'brand_name' => 'HOUSE OF ARA',
            'business_entity' => 'po',
            'business_description' => 'Usaha kami bergerak di bidang fesyen muslim yang mempunyai konsep elegant, style and classy
            comfort walopun tertutup tapi masih bisa fashionable',
            'product_sales_address' => 'Jl Mars utara VI No. 7, Desa Manjahlega, Kec. Rancasari, Kota Bandung, Jawa Barat',
            'address' => 'Jl. Mars utara III no.30 dan mall tsm Bandung Lt. Gf',
            'nib' => '2807220038224'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 15,
            'owner' => 'Dinni Nurhayati',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081324253499',
            'brand_name' => 'JELUJUR',
            'business_entity' => 'po',
            'business_description' => 'Jelujur merupakan brand slow modest wear etnik yang mengaplikasikan detail handmade tradisional,
            yaitu bordir manual. Berfokus pada memberdayakan wanita penjahit rumahan dan pengrajin bordir yang ada di sekitar lokasi usaha,
            serta kepuasan pelanggan',
            'product_sales_address' => 'Jl Sekar Gambir I no. 17 Kel. Turangga, Kec. Lengkong Kota Bandung 40264',
            'address' => 'Jl Sekar Gambir I no. 17 Kel. Turangga, Kec. Lengkong Kota Bandung 40264',
            'nib' => '3009220145194'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 16,
            'owner' => 'Lilis Suhaeti',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '087890299946',
            'brand_name' => 'NENGLIS STYLE',
            'business_entity' => 'po',
            'business_description' => 'Gyasi Bizurai collection menjual berbagai macam motif batik yang dikombinasikan dengan
            bordir manual dengan berbagai macam model atasan seperti outer, kebaya hingga blouse',
            'product_sales_address' => 'Jl Siti Munigar No.56 RT.003/002 Kelurahan Nyengseret Kecamatan Astana Anyar Kota Bandung',
            'address' => 'Jl Siti Munigar No.56 RT.003/002 Kelurahan Nyengseret Kecamatan Astana Anyar Kota Bandung',
            'nib' => '0220100151874'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 17,
            'owner' => 'Nurdin Ramdan',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081573115556',
            'brand_name' => 'Gyasi Bizurai',
            'business_entity' => 'po',
            'business_description' => 'Gyasi Bizurai collection menjual berbagai macam motif batik yang dikombinasikan dengan
            bordir manual dengan berbagai macam model atasan seperti outer, kebaya hingga blouse',
            'product_sales_address' => 'Jl. Terusan Babakan Jeruk 1 No. 3 RT.005/001 Kelurahan Sukagalih Kecamatan Sukajadi Bandung.',
            'address' => 'Jl. Terusan Babakan Jeruk 1 No. 3 RT.005/001 Kelurahan Sukagalih Kecamatan Sukajadi Bandung.',
            'nib' => '2601220015861'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 18,
            'owner' => 'Silmi Nurhayati',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081394668353',
            'brand_name' => 'Jilani',
            'business_entity' => 'po',
            'business_description' => 'Hijab Jilani menawarkan Hijab Eksklusif karena tidak di produksi banyak hanya tersedia dalam jumlah terbatas.
            Elegant dengan standar kualitas premium',
            'product_sales_address' => 'Jl. Batununggal Lestari No.1',
            'address' => 'Jl. Batununggal Lestari No.1',
            'nib' => '1810220227983'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 19,
            'owner' => 'Lelly Dewi Utami',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '0818880547',
            'brand_name' => 'PURIUTAMI',
            'business_entity' => 'po',
            'business_description' => 'PURIUTAMI merupakan brand lokal Kota Bandung yang memproduksi mukena lukis, mukena batik,
            mukena travel, tunik batik, gamis batik dengan memakai batik khas Jawa Barat.',
            'product_sales_address' => 'Jl. Sinom No. 15 RT.006/009 Kelurahan Turangga Kecamatan Lengkong Kota Bandung',
            'address' => 'Jl. Sinom No. 15 RT.006/009 Kelurahan Turangga Kecamatan Lengkong Kota Bandung',
            'nib' => '9120115051801'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 20,
            'owner' => 'Sarah Farida',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '087722244888',
            'brand_name' => 'XVH HIJAB',
            'business_entity' => 'cv',
            'business_description' => 'Design hijab kita berbeda dengan yang lain. Motif dan warna tidak pasaran dan bisa custom atau sesuai dengan permintaan customer bisa juga pesan custom per satuan',
            'product_sales_address' => 'Jl. Garputala No.12 kota Bandung',
            'address' => 'Jl. Garputala No.12 kota Bandung',
            'nib' => '1012210046359'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 21,
            'owner' => 'Elvira Miranda',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081323959543',
            'brand_name' => 'elfira ethnic',
            'business_entity' => 'po',
            'business_description' => 'elvira ethnic : Sebuah brand yang mengangkat keindahan aneka kain Wastra Nusantara yang maha kaya corak,
            warna dan aneka ciri khas masing-masing daerahnya untuk diminati oleh semua usia dan kalangan dengan desain yang sangat fleksibel,modis,ethnic,
            nyaman dipakai dalam segala kesempatan',
            'product_sales_address' => 'Kopo Permai II/B2 No.1 Bandung',
            'address' => 'Kopo Permai II/B2 No.1 Bandung',
            'nib' => '9120015122505'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 22,
            'owner' => 'Widya Garini',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081323959543',
            'brand_name' => 'Garianie Outfit',
            'business_entity' => 'po',
            'business_description' => 'Garianie Outfit merupakan produk fashion yg berdiri sejak tahun 2020.  Kami memproduksi produk-produk khusus wanita seperti: Blouse lengan panjang/pendek, Dress panjang/pendek, celana panjang, Hijab polos/motif, Mukena anak/dewasa dan mukena travel khusus dewasa.
            Adapun bahan yang kami gunakan merupakan perpaduan bahan polosan dan bahan batik berkualitas. Model yang kami usung adalah model-model kekinian atau modern, sehingga cocok digunakan oleh semua kalangan.
            Saat ini kami membuka gerai di beberapa public area seperti: Bandara dan beberapa hotel di Bandung.
            Kami juga melayani produk customize, sesuai ukuran yang pelanggan inginkan, untuk personal maupun non-personal, seperti Perusahaan, Komunitas dan lainnya.',
            'product_sales_address' => 'Jl. Babakan Cianjur no. 6 rt. 06 rw. 07 Kel. Campaka Kec. Andir Bandung 40184',
            'address' => 'Hotel Jayakarta Jl. Ir H Juanda No. 381A Bandung',
            'nib' => '0709220097963'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 23,
            'owner' => 'Gita Nurhati',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08112294905',
            'brand_name' => 'GORGEOUS INDONESIA',
            'business_entity' => 'cv',
            'business_description' => 'Gorgeous Indonesia memproduksi busana hijab dengan menggunakan teknik sublimasi printing yang memberikan ciri khas pada warna
            seperti pastel, monokrom dan full color. Produk yang kami jual berupa kerudung, pakaian, windbreaker, bucket hat, shopping bag, sejadah travel, pouch straw dan masker',
            'product_sales_address' => 'Jl. Sawah Kurung Raya 21A, Ciateul, Regol, Bandung',
            'address' => 'Jl. Sawah Kurung Raya 21A, Ciateul, Regol, Bandung',
            'nib' => '2502220022183'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 24,
            'owner' => 'Rita Indriany',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '082214116870',
            'brand_name' => 'ACUKSAE',
            'business_entity' => 'cv',
            'business_description' => 'Acuksae adalah brand fashion asal Kota Bandung, yang bergerak sebagai produsen pakaian jadi, craft serta homedecore,
            dengan material utama kain Batik Jawa Barat yang di padupadakan dengan kain katun kualitas premium',
            'product_sales_address' => 'Galery Dekranasda Prov Jabar JL. Ir. H. Juanda No. 19 Bandung',
            'address' => 'Jalan Parakan Astri No. SA Bandung',
            'nib' => '9120001921689'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 25,
            'owner' => 'Lisda Damayanti',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '081573115556',
            'brand_name' => 'KANNASYA',
            'business_entity' => 'cv',
            'business_description' => 'Kannasya didirikan pada tahun 2019 yang berasal dari Kota Bandung, Jawa Barat, untuk produk unggulan kannasya yaitu hijab printing (Scarves motif) dengan pilihan design yang limited dan pemilihan warna yang soft pastel dan pastinya menjadi ciri khas dari brand kannasya, selain itu kami juga memiliki jenis produk apparel seperti daily wear,working wear, accessories dan lain nya, prinsip kami yaitu selalu memberikan pelayanan terbaik dari mulai kualitas barang dan juga dalam melayani pelanggan. ',
            'product_sales_address' => 'Jl. A H Nasution no.958 Bandung',
            'address' => 'Jl. A H Nasution no.958 Bandung',
            'nib' => '0220102192826'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 1,
            'user_id' => 11,
            'owner' => 'Annisah Said',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08164212124',
            'brand_name' => 'MEHRUNISSA',
            'business_entity' => 'po',
            'business_description' => 'Brand adalah sebuah identitas yang memudahkan konsumen untuk mengenal produk usaha  yang kita tawarkan. Atau sebuah tanda yang dikenakan oleh pengusaha/pembisnis pada sebuah barang yang di hasklkan .
            Brand atau merek akan menjadi awal dari perjalanan bagi pembisnis itu sendiri . ',
            'product_sales_address' => 'Jln Raya Ujungberung 74/112 Bandung',
            'address' => 'Jln Raya Ujungberung 74/112 Bandung',
            'nib' => '18112110029856'
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => 3,
            'user_id' => 11,
            'owner' => 'Annisah Said',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08164212124',
            'brand_name' => 'MEHRUNISSA',
            'business_entity' => 'po',
            'business_description' => 'Brand adalah sebuah identitas yang memudahkan konsumen untuk mengenal produk usaha  yang kita tawarkan. Atau sebuah tanda yang dikenakan oleh pengusaha/pembisnis pada sebuah barang yang di hasklkan .
            Brand atau merek akan menjadi awal dari perjalanan bagi pembisnis itu sendiri . ',
            'product_sales_address' => 'Jln Raya Ujungberung 74/112 Bandung',
            'address' => 'Jln Raya Ujungberung 74/112 Bandung',
            'nib' => '18112110029856'
        ]);
    }
}
