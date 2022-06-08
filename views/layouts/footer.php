      <?php 
        $username = $_SESSION["user"]["username"];
        $photo = $_SESSION["user"]["photo"] ?? "pp.jpg";

        $attendanceTab = $data["attendanceTab"] ?? false;
      ?>

      <!-- Sidebar Section -->
      <aside class="pb-5 px-2 w-64 border-l h-screen hidden md:flex flex-col ">
        <!-- Logged in account -->
        <section class="border-b">
          <!-- Account profile -->
          <div class="px-4 py-2 my-2 relative flex items-center justify-end space-x-3 cursor-pointer transition rounded-xl duration-300 ease-out js--dropdown-toggle">
            <div class="w-8 aspect-square rounded-full bg-gray-600">
              <img src="img/<?= $photo ?>" alt="profile-photo" class="rounded-full" />
            </div>
            <h5><?= $username ?></h5>
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </span>

            <div class="absolute -bottom-12 shadow-lg rounded-lg bg-white z-10 invisible js--dropdown-item">
              <div class="flex items-center">
                <a href="<?= APP_URL ?>/logout" class="py-3 px-5">Logout</a>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                </span>
              </div>
            </div>
          </div>
        </section>

        <!-- Profile -->
        <?php if(!$attendanceTab) : ?>
        <div id="profileDetailContainer" class="flex-1 grid place-items-center">
            <div class="text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3w-32 w-32 mx-auto text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
              </svg>
              <h6>Pilih salah satu dari data untuk melihat detail</h6>
            </div>
        </div>

        <?php else : ?>
        <div id="profileDetailContainer" class="flex-1 px-3 py-5">
          <div class="mb-10">
            <h4>Today's Attendance</h4>
            <h6><?= date("d M Y") ?></h6>
          </div>
          <div class="space-y-10">
            <!-- Mahasiswa doughnut chart -->
            <div class="w-full flex items-center space-x-5">
              <div class="w-[150px] basis-16">
                <canvas id="mahasiswaCircleChart" width="80" height="80"></canvas>
              </div>
              <div class="space-y-1">
                <h6>Mahasiswa</h6>
                <h2 class="text-primary font-semibold js--mahasiswa-attendance">__ / __</h2>
              </div>
            </div>

            <!-- Dosen doughnut chart -->
            <div class="w-full flex items-center space-x-5">
              <div class="w-[150px] basis-16">
                <canvas id="dosenCircleChart" width="80" height="80"></canvas>
              </div>
              <div class="space-y-1">
                <h6>Dosen</h6>
                <h2 class="text-yellow-400 font-semibold js--dosen-attendance">__ / __</h2>
              </div>
            </div>
          </div>
        </div>
        <?php endif ?>

      </aside>
    </div>
    
    <!-- JS -->
    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>
    <script src="js/calendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/chart.js"></script>
  </body>
</html>