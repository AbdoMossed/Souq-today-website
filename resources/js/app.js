require('bootstrap');
import jQuery from 'jquery';
window.$ = jQuery;

import { Chart } from 'chart.js/auto';
import 'chartjs-adapter-date-fns';
// Optionally, you can export the Chart object to make it accessible in other scripts
window.Chart = Chart;