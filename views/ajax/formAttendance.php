<div id="dialogBox" class="w-3/4 max-w-xl px-6 py-4 overflow-auto rounded-lg bg-gray-50">
    <h2 class="text-center mb-5">Tambah Data Kehadiran</h2>
    <form action="<?= APP_URL ?>/attendance/store" method="POST" class="space-y-6 text-sm" enctype="multipart/form-data">
        <div>
            <label class="block mb-1" for="date">Tanggal</label>
            <input class="custom-form-input js--date-picker" type="date" name="date" id="date" required />
        </div>
        <div>
            <label class="block mb-1" for="totalMahasiswa">Total Mahasiswa yang Hadir</label>
            <input class="custom-form-input" type="number" name="totalMahasiswa" id="totalMahasiswa" required />
        </div>
        <div>
            <label class="block mb-1" for="totalDosen">Total Dosen yang Hadir</label>
            <input class="custom-form-input" type="number" name="totalDosen" id="totalDosen" required />
        </div>
        
        <div class="col-span-full flex justify-end space-x-5">
            <button class="btn btn-ternary" type="button" onclick="closeDialog()">Batal</button>
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
</div>