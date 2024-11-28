@props(['chartData'])
<div class="w-1/2 py-10 px-10 my-10 bg-white mx-10 drop-shadow-xl rounded-xl" id="first">
    <section x-data="apex_app">
        <div class="py-20 px-20" x-ref="chart"></div>
    </section>
</div>

@once
<script src="https://cdn.jsdelivr.net/npm/apexcharts" defer></script>
<script>
    document.addEventListener('livewire:navigated', handler, false);
    document.addEventListener('alpine:init', handler, false);

    function handler() {
        Alpine.data("apex_app", () => ({
            values: @js($chartData["values"]),
            labels: @js($chartData["labels"]),
            init() {
                let chart = new ApexCharts(this.$refs.chart, this.options);
                chart.render();
                /* this.$watch("values", () => {
                    chart.updateOptions(this.options);
                });*/
            },
            formatCurrency: (x) => {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "";
            },
            get options() {
                return {
                    series: [
                        {
                            name: "Series name",
                            data: this.values
                        }
                    ],
                    chart: {
                        toolbar: {
                            show: false
                        },
                        defaultLocale: "en",
                        height: 350,
                        type: "line",
                        zoom: {
                            enabled: true
                        },
                        dropShadow: {
                            enabled: true,
                            color: "#000",
                            top: 18,
                            left: 7,
                            blur: 15,
                            opacity: 0.3
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        textAnchor: "start",
                        formatter: (val) => {
                            return this.formatCurrency(val);
                        },
                        style: {
                            colors: ["#4d78kl"]
                        }
                    },
                    stroke: {
                        show: true,
                        curve: "smooth",
                        lineCap: "butt",
                        colors: "#222",
                        width: 2,
                        dashArray: 0
                    },
                    grid: {
                        borderColor: "#DCDFE1",
                        row: {
                            opacity: 0.5
                        }
                    },
                    yaxis: {
                        title: {
                            text: "Yaxis ($)"
                        },
                        labels: {
                            formatter: (value) => {
                                return this.formatCurrency(value);
                            }
                        }
                    },
                    xaxis: {
                        title: {
                            text: "Xaxis"
                        },
                        categories: this.labels
                    },
                    tooltip: {
                        x: {
                            show: true
                        },
                        y: {
                            formatter: (val) => {
                                return this.formatCurrency(val);
                            }
                        }
                    },
                    markers: {
                        size: 7,
                        colors: "pink",
                        strokeColors: "#fff",
                        strokeWidth: 2,
                        strokeOpacity: 0.9,
                        strokeDashArray: 0,
                        fillOpacity: 1,
                        discrete: [],
                        shape: "circle",
                        radius: 2,
                        offsetX: 0,
                        offsetY: 0,
                        onClick: undefined,
                        onDblClick: undefined,
                        showNullDataPoints: true,
                        hover: {
                            size: undefined,
                            sizeOffset: 3
                        }
                    },
                    colors: ["pink"],
                    dataLabels: {
                        enabled: true,
                        enabledOnSeries: undefined,
                        formatter: (val) => {
                            return this.formatCurrency(val);
                        },
                        textAnchor: "middle",
                        offsetX: 10,
                        offsetY: -10,
                        style: {
                            fontSize: "14px",
                            fontFamily: "Helvetica, sans-serif",
                            fontWeight: "500",
                            colors: ["#222"]
                        },
                        background: {
                            enabled: false
                        },
                        dropShadow: {
                            enabled: true,
                            top: 1,
                            left: 1,
                            blur: 1,
                            color: "pink",
                            opacity: 0.8
                        }
                    },
                    legend: {
                        position: "bottom",
                        horizontalAlign: "left",
                        floating: true,
                        offsetY: -5,
                        offsetX: -5,
                        show: true,
                        showForSingleSeries: true,
                        customLegendItems: ["Actual"],
                        markers: {
                            fillColors: ["pink"]
                        }
                    }
                };
            }
        }));
    }
</script>
@endonce
