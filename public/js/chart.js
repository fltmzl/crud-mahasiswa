const mahasiswaCtx = document.getElementById("mahasiswaChart")?.getContext("2d");
const dosenCtx = document.getElementById("dosenChart")?.getContext("2d");
const overviewCtx = document.getElementById("overviewChart")?.getContext("2d");

const chartContainer = document.getElementById("chartContainer");
document.addEventListener("resize", () => {
  mahasiswaCtx.width = chartContainer.offsetWidth;
  dosenCtx.width = chartContainer.offsetWidth;
});

const fetchData = async (url) => {
  try {
    const res = await fetch(url);
    const data = await res.json();
    return data;
  } catch (error) {
    console.log(error);
  }
};

const mahasiswaGradient = mahasiswaCtx?.createLinearGradient(0, 0, 0, 400);
mahasiswaGradient?.addColorStop(0, "rgba(74, 222, 128, 0.6)");
mahasiswaGradient?.addColorStop(0.7, "rgba(74, 222, 128, 0)");

const dosenGradient = dosenCtx?.createLinearGradient(0, 0, 0, 400);
dosenGradient?.addColorStop(0, "rgba(250, 204, 21, 0.6)");
dosenGradient?.addColorStop(0.7, "rgba(250, 204, 21, 0)");

const overviewMahasiswaGradient = overviewCtx?.createLinearGradient(0, 0, 0, 400);
overviewMahasiswaGradient?.addColorStop(0, "rgba(74, 222, 128, 0.6)");
overviewMahasiswaGradient?.addColorStop(0.7, "rgba(74, 222, 128, 0)");

const overviewDosenGradient = overviewCtx?.createLinearGradient(0, 0, 0, 400);
overviewDosenGradient?.addColorStop(0, "rgba(250, 204, 21, 0.6)");
overviewDosenGradient?.addColorStop(0.7, "rgba(250, 204, 21, 0)");

window.addEventListener("load", async () => {
  const todayAttendance = await fetchData(`${APP_URL}/attendance/getOne`);
  const totalMahasiswa = await fetchData(`${APP_URL}/attendance/getTotalMahasiswa`);
  const totalDosen = await fetchData(`${APP_URL}/attendance/getTotalDosen`);

  const options = {
    responsive: true,
    scales: {
      x: {
        grid: {
          display: false,
        },
      },

      y: {
        beginAtZero: true,
        max: 200,
        grid: {
          display: true,
          color: "rgba(0, 0, 0, 0.1)",
        },
        ticks: {
          stepSize: 30,
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
    },
  };

  const mahasiswaConfig = {
    type: "line",
    data: {
      labels: [],
      datasets: [
        {
          label: "Mahasiswa",
          backgroundColor: mahasiswaGradient,
          borderColor: "rgb(74, 222, 128)",
          fill: true,
          data: [],
          tension: 0.6,
        },
      ],
    },
    options: {
      ...options,
      scales: {
        ...options.scales,

        y: {
          ...options.scales.y,
          max: Math.ceil((totalMahasiswa + 30) / 10) * 10,
        },
      },
    },
  };

  const dosenConfig = {
    type: "line",
    data: {
      labels: [],
      datasets: [
        {
          label: "Dosen",
          backgroundColor: dosenGradient,
          borderColor: "rgb(250, 204, 21)",
          fill: true,
          data: [],
          tension: 0.6,
        },
      ],
    },
    options: {
      ...options,
      scales: {
        ...options.scales,

        y: {
          ...options.scales.y,
          max: Math.ceil((totalDosen + 30) / 10) * 10,
        },
      },
    },
  };

  const overviewConfig = {
    type: "line",
    data: {
      labels: [],
      datasets: [
        {
          label: "Mahasiswa",
          backgroundColor: overviewMahasiswaGradient,
          borderColor: "rgb(74, 222, 128)",
          fill: true,
          data: [],
          tension: 0.6,
        },
        {
          label: "Dosen",
          backgroundColor: overviewDosenGradient,
          borderColor: "rgb(250, 204, 21)",
          fill: true,
          data: [],
          tension: 0.6,
        },
      ],
    },
    options: {
      ...options,
      plugins: {
        legend: {
          display: true,
        },
      },
    },
  };

  const attendances = await fetchData(`${APP_URL}/attendance/getAll`);

  attendances.forEach((attendance) => {
    const date = new Date(attendance.date).toLocaleDateString("id-ID", { month: "short", day: "numeric" });

    mahasiswaConfig.data.labels.push(date);
    mahasiswaConfig.data.datasets[0].data.push(attendance.total_hadir_mahasiswa);

    dosenConfig.data.labels.push(date);
    dosenConfig.data.datasets[0].data.push(attendance.total_hadir_dosen);

    overviewConfig.data.labels.push(date);
    overviewConfig.data.datasets[0].data.push(attendance.total_hadir_mahasiswa);
    overviewConfig.data.datasets[1].data.push(attendance.total_hadir_dosen);
  });

  if (mahasiswaCtx) {
    const mahasiswaChart = new Chart(mahasiswaCtx, mahasiswaConfig);
  }

  if (dosenCtx) {
    const dosenChart = new Chart(dosenCtx, dosenConfig);
  }

  if (overviewCtx) {
    const overviewChart = new Chart(overviewCtx, overviewConfig);
  }

  // Doughnut(circle) Chart Section Options
  const mahasiswaCircleChart = document.getElementById("mahasiswaCircleChart");
  const dosenCircleChart = document.getElementById("dosenCircleChart");

  const todayAttendanceMahasiswa = todayAttendance?.total_hadir_mahasiswa;
  const todayAttendanceDosen = todayAttendance?.total_hadir_dosen;

  document.querySelector(".js--mahasiswa-attendance").textContent = `${todayAttendanceMahasiswa} / ${totalMahasiswa}`;
  document.querySelector(".js--dosen-attendance").textContent = `${todayAttendanceDosen} / ${totalDosen}`;

  const mahasiswaCircleConfig = {
    type: "doughnut",
    data: {
      labels: ["Hadir", "Absen"],
      datasets: [
        {
          label: "Mahasiswa",
          data: [todayAttendanceMahasiswa, parseInt(totalMahasiswa) - parseInt(todayAttendanceMahasiswa)],
          backgroundColor: ["rgb(74, 222, 128)", "rgb(255, 255, 255)"],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  };

  const dosenCircleConfig = {
    type: "doughnut",
    data: {
      labels: ["Hadir", "Absen"],
      datasets: [
        {
          label: "Dosen",
          data: [todayAttendanceDosen, parseInt(totalDosen) - parseInt(todayAttendanceDosen)],
          backgroundColor: ["rgb(250, 204, 21)", "rgb(255, 255, 255)"],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  };

  const mahasiswaDoughnutChart = new Chart(mahasiswaCircleChart, mahasiswaCircleConfig);
  const dosenDoughnutChart = new Chart(dosenCircleChart, dosenCircleConfig);
});
