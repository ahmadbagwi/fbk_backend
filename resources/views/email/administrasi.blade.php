<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pengumuman Seleksi Substansi FBK 2021</title>

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="container w-full mx-auto m-4">
            <div class="w-full mx-auto p-4">
                <span class="text-lg md:text-2xl text-center mb-2 md:mb-8 font-bold">
                  Pengumuman Seleksi Substansi FBK 2021
                </span>
                <div class="w-full divide-x divide-gray-400 mt-0 md:mt-8 p-2">
                  @if ($data->status == 'lulus')
                    <span class="text-md text-center text-green-700 mx-auto flex">
                      Anda lulus seleksi substansi Fasilitasi Bidang Kebudayaan Tahun 2021
                      Selanjutnya, silakan lengkapi daftar isian (borang) administrasi sesuai petunjuk teknis.
                      Periode pengisian 21 Mei – 29 Mei 2021 pukul 23:59 WIB.
                      Jika melewati batas waktu yang ditentukan, maka dianggap mengundurkan diri.
                    </span>
                  @else
                    <span class="text-md text-center text-red-700 mx-auto flex">
                      Anda belum dapat mengikuti tahapan selanjutnya untuk seleksi Fasilitasi Bidang Kebudayaan Tahun 2021. Terima kasih.
                    </span>
                  @endif
                </div>
            </div>
        </div>
    </body>
</html>
