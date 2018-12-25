<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    $(function(){
        axios.get('{{ route('transaction.statistic', ['transaction_category' => 1]) }}')
            .then((result) => {
                let labels = [];
                let data = [];
                result.data.forEach((res)=>{
                    labels.push(res.day);
                    data.push(res.total_transaction);
                });
                let ctx = document.getElementById('selling-chart').getContext('2d');
                let chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        //labels: ["January", "February", "March", "April", "May", "June", "July"],
                        labels:labels,
                        datasets: [{
                            label: "Selling",
                            backgroundColor: 'rgba(0,0,0,0)',
                            borderColor: '#1976D2',
                            pointBackgroundColor: '#1A237E',
                            // data: [0, 10, 5, 2, 20, 30, 45],
                            data: data
                        }]
                    },

                    // Configuration options go here
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
            })
            .catch((error) => {
                console.log(error);
            });

        axios.get('{{ route('transaction.statistic', ['transaction_category' => 2]) }}')
            .then((result) => {
                let labels = [];
                let data = [];
                result.data.forEach((res)=>{
                    labels.push(res.day);
                    data.push(res.total_transaction);
                });
                let ctx = document.getElementById('buying-chart').getContext('2d');
                let chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        //labels: ["January", "February", "March", "April", "May", "June", "July"],
                        labels:labels,
                        datasets: [{
                            label: "Buying",
                            backgroundColor: 'rgba(0,0,0,0)',
                            borderColor: '#1976D2',
                            pointBackgroundColor: '#1A237E',
                            // data: [0, 10, 5, 2, 20, 30, 45],
                            data: data
                        }]
                    },

                    // Configuration options go here
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
            })
            .catch((error) => {
                console.log(error);
            });

    });
</script>