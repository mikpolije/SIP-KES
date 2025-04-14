<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stok Opname</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <style>
    .tab-content {
      transition: opacity 0.3s ease-in-out;
    }
    .search-container input {
  padding: 7px;
  border-radius: 8px;
  border: 1px solid #ccc;
  text-align: right;
}

  </style>
</head>
<body class="bg-gray-200 font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-60 bg-white shadow-md p-6 space-y-6">
      <div class="text-center">
        <img src= "img/logosipkes.png" alt="Logo SIPKES" width="200"/>
        <p class="text-sm text-gray-500 mt-1">Sistem Informasi Pelayanan Kesehatan</p>
      </div>
      <nav class="space-y-2">
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Dashboard</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pendaftaran</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pemeriksaan</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Farmasi</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pembayaran</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Persuratan</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Rekam Medis</a>
        <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Laporan</a>
        <div>
          <p class="text-gray-600 text-xs mt-2">Master Data</p>
          <a href="#" class="block text-sm text-blue-600">Data Pengguna</a>
          <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Layanan</a>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <h1 class="text-3xl font-bold text-gray-900 mb-6">Stok Opname</h1>

      <!-- Card Container -->
      <div class="bg-white shadow-md rounded-2xl">
        <!-- Tabs -->

        <div class="flex">
          <button onclick="showTab('ringkasan', event)" class="tab-btn bg-white border-b-4 border-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Data Ringkasan Obat</button>
          <button onclick="showTab('rincian', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Data Rincian Obat</button>
          <button onclick="showTab('akanKadaluarsa', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Obat Akan Kadaluarsa</button>
          <button onclick="showTab('kadaluarsa', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Obat Kadaluarsa</button>
        </div>

        <div class="top-controls">
          <div class="entry-info">
            Tampilkan
            <select class="entry-select">
              <option>10</option>
              <option>25</option>
              <option>50</option>
              <option>100</option>
            </select>
            Entri
            <div class="search-container" style="text-align: right;">
              <input type="text" placeholder="🔍 Data Obat " style="text-align: left;"/>
            </div>
          </div>
        </div>
        

        <!-- Tab Contents -->
        <div id="ringkasan" class="tab-content block opacity-100 px-6 pb-4">
          <div class="my-2 space-x-2">
            <button onclick="copyTable('ringkasan')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
            <button onclick="exportCSV('ringkasan')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
            <button onclick="exportExcel('ringkasan')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
          </div>
        
          <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden mt-2" id="ringkasanTable">
            <thead class="bg-white border-y border-gray-300"> 
              <tr>
                <th class="px-4 py-2">Nama Obat</th>
                <th class="px-4 py-2">Stok Opname</th>
                <th class="px-4 py-2">Stok Gudang</th>
                <th class="px-4 py-2">Stok Order</th>
                <th class="px-4 py-2">Stok Bebas</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-2">Acyclovir</td>
                <td class="px-4 py-2">50</td>
                <td class="px-4 py-2">12</td>
                <td class="px-4 py-2">0</td>
                <td class="px-4 py-2">30</td>
              </tr>
              <tr class="bg-white border-b border-gray-200">
                <td class="px-4 py-2">Alkohol Swab</td>
                <td class="px-4 py-2">23</td>
                <td class="px-4 py-2">6</td>
                <td class="px-4 py-2">2</td>
                <td class="px-4 py-2">24</td>
              </tr>
              <!-- Baris jarak pemisah visual -->
              <tr><td colspan="5" class="py-1"></td></tr>
              <tr>
                <td colspan="5" class="px-4 py-2 text-sm text-gray-700">Menampilkan 2 sampai 2 dari 2 entri</td>
              </tr>
            </tbody>
          </table>
        </div>
        
      <!-- Tab Contents -->
      <div id="rincian" class="tab-content hidden opacity-0 px-6 pb-4">
        <div class="my-2 space-x-2">
          <button onclick="copyTable('rincian')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
          <button onclick="exportCSV('rincian')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
          <button onclick="exportExcel('rincian')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
        </div>
        <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden" id="rincianTable">
          <thead class="bg-white border-y border-gray-300"> 
            <tr>
              <th class="px-4 py-2 w-1/4"></th> <!-- Kolom kosong di atas tombol -->
              <th class="px-4 py-2">Nama Obat</th>
              <th class="px-4 py-2">Tanggal Kadaluarsa</th>
              <th class="px-4 py-2">No Fraktur</th>
              <th class="px-4 py-2">Tanggal Faktur</th>
              <th class="px-4 py-2">Stok Opname</th>
              <th class="px-4 py-2">Stok Gudang</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-t border-gray-200">
              <td class="px-4 py-2">
                <div class="flex flex-wrap gap-1">
                  <button class="bg-gray-400 text-white px-2 py-1 rounded">Koreksi</button>
                  <button class="bg-gray-400 text-white px-2 py-1 rounded">Mutasi</button>
                  <button class="bg-gray-400 text-white px-2 py-1 rounded">Retur</button>
                  <button class="bg-gray-400 text-white px-2 py-1 rounded">Konversi</button>
                </div>
              </td>
              <td class="px-4 py-2">Acyclovir</td>
              <td class="px-4 py-2">11/12/2029</td>
              <td class="px-4 py-2">213254567723</td>
              <td class="px-4 py-2">13/02/2025</td>
              <td class="px-4 py-2">34</td>
              <td class="px-4 py-2">30</td>
            </tr>
            <tr class="bg-white border-t border-gray-200">
              <td colspan="7" class="px-4 py-2">Total Acyclovir</td>
            </tr>
            <thead class="bg-white border-y border-gray-300">
            <tr class="bg-white border-t border-gray-200">
              <td colspan="7" class="px-4 py-2">Menampilkan 2 sampai 2 dari 2 entri</td>
            </tr>
          </thead>
          </tbody>
        </table>
      </div>
      
      
        <!-- Tab Contents -->
        <div id="akanKadaluarsa" class="tab-content hidden opacity-0 px-6 pb-4">
          <div class="my-2 space-x-2">
            <button onclick="copyTable('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
            <button onclick="exportCSV('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
            <button onclick="exportExcel('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
          </div>
          <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden" id="rincianTable">
            <thead class="bg-white border-y border-gray-300"> 
              <tr>
                <th class="px-4 py-2 w-1/4"></th> <!-- Kolom kosong -->
                <th class="px-4 py-2">Nama Obat</th>
                <th class="px-4 py-2">Tanggal Kadaluarsa</th>
                <th class="px-4 py-2">No Fraktur</th>
                <th class="px-4 py-2">Tanggal Faktur</th>
                <th class="px-4 py-2">Stok Opname</th>
                <th class="px-4 py-2">Stok Gudang</th>
              </tr>
            </thead>
            <tbody>
              <!-- Baris 2 - Pesan kosong -->
              <tr class="bg-blue-100 border-t border-gray-200">
                <td colspan="7" class="px-4 py-2 text-center text-gray-700">Tidak ada yang tersedia pada tabel ini</td>
              </tr>
            
              <!-- Baris 3 - Kosong putih -->
              <tr class="bg-white border-t border-gray-200">
                <td colspan="7" class="px-4 py-4"></td>
              </tr>
            
              <!-- Baris 4 - Info entri -->
              <thead class="bg-white border-y border-gray-300">
              <tr class="bg-white border-t border-gray-200">
                <td colspan="7" class="px-4 py-2 text-sm text-gray-600">Menampilkan 2 sampai 2 dari 2 entri</td>
              </tr>
              </thead>
            </tbody>
            
          </table>
        </div>
        <!-- Tab Contents -->
        <div id="kadaluarsa" class="tab-content hidden opacity-0 px-6 pb-4">
          <div class="my-2 space-x-2">
            <button onclick="copyTable('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
            <button onclick="exportCSV('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
            <button onclick="exportExcel('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
          </div>
          <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden" id="rincianTable">
            <thead class="bg-white border-y border-gray-300">  <!-- GANTI dari bg-gray-300 jadi bg-white -->
              <tr>
                <th class="px-4 py-2 w-1/4"></th> <!-- Kolom kosong -->
                <th class="px-4 py-2">Nama Obat</th>
                <th class="px-4 py-2">Tanggal Kadaluarsa</th>
                <th class="px-4 py-2">No Fraktur</th>
                <th class="px-4 py-2">Tanggal Faktur</th>
                <th class="px-4 py-2">Stok Opname</th>
                <th class="px-4 py-2">Stok Gudang</th>
              </tr>
            </thead>          
            <tbody>
              <!-- Baris 2 - Pesan kosong -->
              <tr class="bg-blue-100 border-t border-gray-200">
                <td colspan="7" class="px-4 py-2 text-center text-gray-700">Tidak ada yang tersedia pada tabel ini</td>
              </tr>
            
              <!-- Baris 3 - Kosong putih -->
              <tr class="bg-white border-t border-gray-200">
                <td colspan="7" class="px-4 py-4"></td>
              </tr>
            
              <!-- Baris 4 - Info entri -->
              <thead class="bg-white border-y border-gray-300">
              <tr class="bg-white border-t border-gray-200">
                <td colspan="7" class="px-4 py-2 text-sm text-gray-600">Menampilkan 2 sampai 2 dari 2 entri</td>
              </tr>
              </thead>
            </tbody>

          </table>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-end space-x-4 mt-6">
        <button class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Sebelumnya</button>
        <button class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Selanjutnya</button>
      </div>
    </main>
  </div>

  <script>
    function showTab(id, event) {
      const tabs = document.querySelectorAll('.tab-content');
      const buttons = document.querySelectorAll('.tab-btn');

      tabs.forEach(tab => {
        tab.classList.remove('block');
        tab.classList.add('hidden');
        tab.classList.remove('opacity-100');
        tab.classList.add('opacity-0');
      });

      const activeTab = document.getElementById(id);
      activeTab.classList.remove('hidden');
      setTimeout(() => {
        activeTab.classList.add('opacity-100');
      }, 10);

      buttons.forEach(btn => {
        btn.classList.remove('bg-white', 'border-b-4', 'border-blue-500', 'text-blue-900');
        btn.classList.add('bg-blue-200', 'text-blue-800');
      });

      const clickedButton = event.target;
      clickedButton.classList.remove('bg-blue-200', 'text-blue-800');
      clickedButton.classList.add('bg-white', 'border-b-4', 'border-blue-500', 'text-blue-900');
    }

    function exportExcel(id) {
      const table = document.querySelector(`#${id} table`);
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.table_to_sheet(table);
      XLSX.utils.book_append_sheet(wb, ws, id);
      XLSX.writeFile(wb, `${id}.xlsx`);
    }

    function exportCSV(id) {
      const table = document.querySelector(`#${id} table`);
      const ws = XLSX.utils.table_to_sheet(table);
      const csv = XLSX.utils.sheet_to_csv(ws);
      const blob = new Blob([csv], { type: 'text/csv' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `${id}.csv`;
      a.click();
    }

    function copyTable(id) {
      const table = document.querySelector(`#${id} table`);
      const range = document.createRange();
      range.selectNode(table);
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      document.execCommand('copy');
      selection.removeAllRanges();
      alert('Tabel disalin ke clipboard.');
    }
  </script>
</body>
</html>
