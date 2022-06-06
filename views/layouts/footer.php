      <!-- Sidebar Section -->
      <aside class="pb-5 px-2 w-64 border-l h-screen flex flex-col">
        <!-- Logged in account -->
        <section class="border-b">
          <!-- Account profile -->
          <div class="px-4 py-2 my-2 relative flex items-center justify-end space-x-3 cursor-pointer transition rounded-xl duration-300 ease-out js--dropdown-toggle">
            <div class="w-8 aspect-square rounded-full bg-gray-600">
              <img src="" alt="" />
            </div>
            <h5><?= $_SESSION["user"]["username"] ?></h5>
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
        <div id="profileDetailContainer" class="flex-1 grid place-items-center">
            <div class="text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3w-32 w-32 mx-auto text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
              </svg>
              <h6>Pilih salah satu dari data untuk melihat detail</h6>
            </div>
        </div>
      </aside>
    </div>
    
    <!-- JS -->
    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>
    <script src="js/calendar.js"></script>
  </body>
</html>