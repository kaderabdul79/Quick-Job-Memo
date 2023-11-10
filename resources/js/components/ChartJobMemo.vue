<template>
  <div class="jobmemo-statistics">{{ jobMemoOverview }}
    <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
  </div>
</template>

<script setup>
import { reactive, ref, onMounted } from 'vue';
import axios from 'axios';
axios.defaults.baseURL = "http://127.0.0.1:8000/api/";

const jobMemoOverview = ref({});
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const chartData = reactive({
  labels: ['Total Job Memos', 'Interviews Called', 'Interviews Attended'],
  datasets: [
    {
      label: 'Chart Data',
      data: [],
    },
  ],
});

const chartOptions = {
  responsive: true,
};

async function jobMemoOverviewApi() {
  try {
    const response = await axios.get('jobMemoOverview');
    console.log(response.data);
    jobMemoOverview.value = response.data?.data;
    updateChartData();
  } catch (error) {
    console.error("Error", error);
  }
}

// after getting reponse from api
function updateChartData() {
  if (jobMemoOverview.value) {
    chartData.datasets[0].data = [
      jobMemoOverview.value.totalJobMemos,
      jobMemoOverview.value.interviewCalled,
      jobMemoOverview.value.interviewAttended,
    ];
  } else {
    console.log("Data is not available yet.");
  }
}

onMounted(() => {
  jobMemoOverviewApi();
});
</script>
